<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Candidate;
use App\Models\CandidateVote;
use Inertia\Inertia;


class ChartController extends Controller
{
    private $path_render;
    private $route_chart;

	public function __construct()
	{
		$this->path_render = "Home/Chart/";
		$this->route_chart = "web.api.chart";
	}

    public function __invoke(Vote $vote)
    {
        $vote->load(['candidates', 'voters', 'voters_active', 'voters_inactive']);
        $data_label = [
            'candidates' => $vote->candidates()->count() ?? 0,
            'voters' => $vote->voters()->count() ?? 0,
            'voters_inactive' => $vote->voters_inactive()->count() ?? 0,
        ];

        return Inertia::render($this->path_render . 'Index', [
            'attributes' => [
                'route_chart' => route($this->route_chart, ['vote' => $vote->id]),
                'vote' => $vote,
                'datalabel' => $data_label,
                'charts' => $this->charts($vote->id)
            ]
        ]);
    }

    private function charts($vote) {
        $labels = [];
        $votes = [];
        Candidate::where('vote_id', $vote)
            ->orderBy('number_of_votes', 'DESC')
            ->chunk(100, function($rows) use(&$labels, &$votes) {
            foreach($rows as $value) {
                $sum = CandidateVote::where('vote_id', $value->vote_id)->where('candidate_id', $value->id)->sum('point');
                $value->number_of_votes = $sum;
                $value->save();
                $value->fresh();
                $rand = generalRandomRGBA(0.8);
                $labels[] = $value->name;
                $votes['data'][] = $value->number_of_votes;
                $votes['backgroundColor'][] = "{$rand}";
                $votes['borderColor'][] = "rgba(255, 0, 0, 1)";
            }
        });

        $result = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Votes',
                    'data' => $votes['data'] ?? [] ,
                    'backgroundColor' => $votes['backgroundColor'] ?? [],
                    'borderColor' => $votes['borderColor'] ?? [],
                    'borderWidth' => 2
                ]
            ]
        ];
        
        return $result;
    }
}

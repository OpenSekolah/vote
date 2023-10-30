<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;
use App\Models\Candidate;

class ChartController extends Controller
{
    private $path_render;
	private $title_index;
	private $breadcrumb_index;
    private $route_vote_name;

    public $user;

	public function __construct()
	{
		$this->path_render = "Admin/Chart/";
		$this->title_index = "Chart";
        $this->route_vote_name = "admin.votes.";
	}

	/**
     * Retrieve details of an expense receipt from storage.
     *
     * @param   \Crater\Models\Expense $expense
     * @return  \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, Vote $vote)
    {
        $this->breadcrumb_index = [
            [
				'title' => "{$vote->name}",
				'url' => route($this->route_vote_name . 'index'),
				'active' => true
			],
			[
				'title' => $this->title_index,
				'url' => null,
				'active' => true
            ]
		];

        $vote->load(['candidates', 'voters', 'voters_active', 'voters_inactive']);
        $data_label = [
            'candidates' => $vote->candidates()->count() ?? 0,
            'voters' => $vote->voters()->count() ?? 0,
            'voters_inactive' => $vote->voters_inactive()->count() ?? 0,
        ];
        return Inertia::render($this->path_render . 'Index',[
            'attributes' => [
                'title' => $this->title_index,
                'breadcrumb' => $this->breadcrumb_index,
                'vote' => $vote,
                'datalabel' => $data_label,
                'charts' => $this->charts($vote->id),
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

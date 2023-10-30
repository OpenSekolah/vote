<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;
use App\Models\CandidateVote;

class ChartController extends Controller
{
    public function __invoke(Vote $vote)
    {
        $vote->load(['candidates', 'voters', 'voters_active', 'voters_inactive']);
        //Vote::with(['candidates', 'voters', 'voters_active', 'voters_inactive'])->where('slug', $slug)->where('is_active', true)->first()
        $data_label = [
            'candidates' => $vote->candidates()->count() ?? 0,
            'voters' => $vote->voters()->count() ?? 0,
            'voters_inactive' => $vote->voters_inactive()->count() ?? 0,
        ];

        $data = [
            'charts' => $this->charts($vote->id),
            'datalabel' => $data_label,
        ];

        return response()->json($data, 200);
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

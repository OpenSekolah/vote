<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Home\VoterRequest;
use App\Models\Vote;
use App\Models\Voter;
use App\Models\Candidate;
use App\Models\CandidateVote;
use App\Models\VoterLog;
use Inertia\Inertia;


class VoteController extends Controller
{
    private $path_render;
    private $route_name;

    public function __construct()
	{
        $this->middleware('vote:submit,formprocess')->only(['create', 'store']);
        $this->middleware(['vote:page,submit'])->only(['index', 'login']);

		$this->path_render = "Home/Vote/";
		$this->route_name = "home.voting.";
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vote $vote)
    {
        return Inertia::render($this->path_render . 'Index', [
            'attributes' => [
                'vote' => $vote,
                'route_login' => route("{$this->route_name}login", $vote->id)
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(VoterRequest $request, Vote $vote)
    {
        if($vote->is_active) {
            $data = $request->validated();
            if($voter = Voter::where('vote_id', $vote->id)->where('token', $data['token'])->first()) {
                if($voter->is_active) {
                    $request->session()->forget(['token_login', 'wrong_count', 'vote_session']);
                    $request->session()->put('token_login', [
                        'id' => $voter->vote_id,
                        'token' => $voter->token,
                    ]);

                    VoterLog::create([
                        'voter_id' => $voter->id,
                        'user_agent' => Str::limit($request->header('User-Agent'), 255),
                        'ip_address' => $request->getClientIp(true),
                    ]);

                    return redirect()->route("home.welcome")->with('success', 'Successfully entered the voting page');
                }
                
                return redirect()->back()->withErrors(['token' => ["Token Already Used"]]);
            } else {
                $request->session()->forget(['token_login']);
                $error = (int) $request->session()->get('wrong_count');
                $request->session()->put('wrong_count', $error + 1);
                $wrong_counts = (int) $request->session()->get('wrong_count');
                return redirect()->back()->withErrors(['token' => ["You Get Wrong Opportunity 5x, Your token has been incorrect {$wrong_counts}x"]]);
            }
        } else {
            $request->session()->forget(['token_login', 'wrong_count']);
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Vote $vote)
    {
        //$request->session()->forget(['vote_session']);
        if($vote->is_active) {
            $vote_session = $request->session()->get('vote_session') ?? [];
            $models = Candidate::whereVote($vote->id)
                ->orderBy('candidates.name', 'ASC')
                ->get();
            
            foreach($models as $key => $item) {
                $models[$key]['bg'] = "bg-white";
                $models[$key]['h1'] = "text-gray-900";
                $models[$key]['h2'] = "text-gray-700";
                $models[$key]['selected'] = false;
                if(isset($vote_session[$item->id])) {
                    $models[$key]['bg'] = "bg-red-700";
                    $models[$key]['h1'] = "text-white";
                    $models[$key]['h2'] = "text-white";
                    $models[$key]['selected'] = true;
                } 
            }

            return Inertia::render($this->path_render . 'Create', [
                'models' => $models,
                'attributes' => [
                    'vote' => $vote,
                    'store_url' => route("{$this->route_name}store", $vote->id),
                    'vote_session' => $vote_session,
                    'vote_session_count' => count($vote_session),
                ]
            ]);
        } else {
            $request->session()->forget(['token_login', 'wrong_count']);
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vote $vote)
    {
        $token_login = $request->session()->get('token_login');
        if($vote->is_active) {
            if($request->input('type') == 'many') {
                $session_data = $request->session()->get('vote_session') ?? [];
                if(count($session_data) == $vote->number_of_choices) {
                    $voter = Voter::where('token', $token_login['token'])->where('vote_id', $vote->id)->where('is_active', true)->first();
                    if($voter) {
                        foreach($session_data as $key => $item) {
                            $data = [
                                'vote_id' => $item['vote_id'],
                                'voter_id' => $voter->id,
                                'candidate_id' => $item['candidate_id'],
                            ];
                            $candidate = Candidate::where('id', $item['candidate_id'])->where('vote_id', $vote->id)->first();
                            if($candidatevote = CandidateVote::updateOrCreate($data, $data)) {
                                $total_point = CandidateVote::where('vote_id', $candidatevote->vote_id)->where('candidate_id', $candidatevote->candidate_id)->sum('point');
                                $candidate->number_of_votes = $total_point;
                                $candidate->save();
                            }
                        }
    
                        $voter->is_active = false;
                        $voter->save();
                    }

                    return redirect()->route("home.voting.logout", $vote->id)->with('success', 'Terima kasih atas partisipasinya');
                } else {
                    return redirect()->back()->with('warnings', "Anda harus memilih setidak nya {$vote->number_of_choices} orang kandidat ");
                }
                //return redirect()->route("home.voting.logout", $vote->id)->with('success', 'Terima kasih atas partisipasinya');
            } else {
                $candidate_id = $request->input('id');
                $voter = Voter::where('token', $token_login['token'])->where('vote_id', $vote->id)->where('is_active', true)->first();
                $candidate = Candidate::where('id', $candidate_id)->where('vote_id', $vote->id)->first();

                if($voter && $candidate) {
                    /** if many selec */
                    if($vote->number_of_choices > 1) {
                        // $request->session()->forget(['vote_session']);
                        $session_data = $request->session()->get('vote_session') ?? [];
                        if(is_array($session_data)) {
                            if(count($session_data) >= $vote->number_of_choices) {
                                return redirect()->back()->with('warnings', "Maksimal Pilihan Anda Hanya {$vote->number_of_choices} orang kandidat ");
                            } else {
                                $session_data[$candidate->id] = [
                                    'vote_id' => $vote->id,
                                    'voter_id' => $voter->id,
                                    'name' => $candidate->id,
                                    'candidate_id' => $candidate->id,
                                    'candidate_name' => $candidate->name,
                                    'photo' => $candidate->formattedPhotoAt,
                                ];
                                $request->session()->put('vote_session', $session_data);
                                return redirect()->back()->with('success', 'Kandidat Berhasil Di tambahkan Ke daftar Pilih');
                            }
                        }
                    } else {                
                        $data = [
                            'vote_id' => $vote->id,
                            'voter_id' => $voter->id,
                            'candidate_id' => $candidate->id,
                        ];
                        
                        if($candidatevote = CandidateVote::updateOrCreate($data, $data)) {
                            $total_point = CandidateVote::where('vote_id', $candidatevote->vote_id)->where('candidate_id', $candidatevote->candidate_id)->sum('point');
                            $candidate->number_of_votes = $total_point;
                            if($candidate->save()) {
                                $voter->is_active = false;
                                $voter->save();
                                return redirect()->route("home.voting.logout", $vote->id)->with('success', 'Terima kasih atas partisipasinya');
                            }
                        }
                    }
                } else {
                    $request->session()->forget(['token_login', 'wrong_count']);
                    abort(404);
                }
            }
        } else {
            $request->session()->forget(['token_login', 'wrong_count']);
            abort(404);
        }
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request, Vote $vote)
    {
        $request->session()->forget(['token_login', 'wrong_count', 'vote_session']);
        return Inertia::render($this->path_render . 'Logout', [
            'attributes' => [
                'vote' => $vote
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deletechoice(Request $request, $id)
    {
        $datas = $request->session()->get('vote_session');
        if(isset($datas[$id])) {
            unset($datas[$id]);
            $request->session()->forget(['vote_session']);
            $request->session()->put('vote_session', $datas);
            return redirect()->back()->with('success', 'Berhasil menghapus daftar pilihan');
        }
    }
}

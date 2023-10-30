<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;
use App\Http\Requests\Admin\CandidateRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Inertia\Inertia;

class CandidateController extends Controller
{
    private $path_render;
	private $route_name;
	private $route_vote_name;
	private $title_index;
	private $title_create;
	private $title_edit;
	private $breadcrumb_index;
	private $breadcrumb_create;
	private $breadcrumb_edit;
	private $success_add;
	private $success_edit;
	private $success_delete;

	public function __construct()
	{
		$this->path_render = "Admin/Candidate/";
		$this->route_name = "admin.candidates.";
        $this->route_vote_name = "admin.votes.";
		$this->title_index = "Kandidat";
		$this->title_create = "Tambah {$this->title_index}";
		$this->title_edit = "Ubah {$this->title_index}";
		$this->success_add = Lang::get('messages.success_add', ['attribute' => $this->title_index]);
		$this->success_edit = Lang::get('messages.success_update', ['attribute' => $this->title_index]);
		$this->success_delete = Lang::get('messages.message_delete', ['attribute' => $this->title_index]);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Vote $vote)
    {
        $limit = abs((int) $request->query('per_page', 50));
        $page = abs((int) $request->query('page', 1));
        $key = $request->query('key', 'religion');
        $queries = ['search', 'page'];
		
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

        $models = Candidate::whereVote($vote->id)
                ->applyFilters($request->only($queries))
                ->orderBy('candidates.number_of_votes', 'DESC')
                ->orderBy('candidates.name', 'ASC')
                ->paginateData($limit)
                ->appends(request()->query());
        
        return Inertia::render($this->path_render . 'Index', [
            'models' => $models,
            'attributes' => [
                'add_link' => route($this->route_name . 'create', ['vote' => $vote->id]),
                'show_link' => route($this->route_name . 'show', ['vote' => $vote->id]),
                'route_name' => $this->route_name,
                'title' => $this->title_index,
                'search' => $request->query('search', null),
                'breadcrumb' => $this->breadcrumb_index,
                'filters' => $request->all($queries),
                'start' => $limit * ($page - 1),
                'key_search' => $key,
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vote $vote)
    {
		
        $this->breadcrumb_create = [
            [
				'title' => "{$vote->name}",
				'url' => route($this->route_vote_name . 'index'),
				'active' => true
			],
			[
				'title' => $this->title_index,
				'url' => route($this->route_name . 'index', ['vote'=> $vote->id]),
				'active' => true
			],
			[
				'title' => $this->title_create,
				'url' => null,
				'active' => true
			]
		];

        return Inertia::render($this->path_render . 'Create', [
            'attributes' => [
                'form_type' => 'POST',
                'route_url' => route($this->route_name . 'store', ['vote' => $vote->id]),
                'title' => $this->title_create,
                'breadcrumb' => $this->breadcrumb_create,
                'statuses' => generalStatus(),
            ]
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Vote $vote, CandidateRequest $request)
    {
        $request->merge([
            'vote_id' => $vote->id
        ]);

        $data = Candidate::createWebApp($request);

        return redirect()->route($this->route_name . 'index', ['vote' => $vote->id])->with('success', $this->success_add);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        ini_set('max_execution_time', 3000);

        $models = [];
        Candidate::whereVote($vote->id)
                ->orderBy('candidates.number_of_votes', 'DESC')
                ->orderBy('candidates.name', 'ASC')
            ->chunk(10, function($rows) use (&$models) {
                foreach($rows as $key => $item) {
                    $models[] = $item;
                }
                
            });

        $date = Carbon::now()->format('Y-m-d');
        return Inertia::render($this->path_render . 'Show', [
            'models' => $models,
            'attributes' => [
                'title' => Str::slug("result {$vote->name} {$date}", '-'),
                'vote' => $vote,
            ]
		]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote, Candidate $candidate)
    {
        $this->breadcrumb_edit = [
            [
				'title' => "{$vote->name}",
				'url' => route($this->route_vote_name . 'index'),
				'active' => true
			],
			[
				'title' => $this->title_index,
				'url' => route($this->route_name . 'index', ['vote'=> $vote->id]),
				'active' => false
			],
			[
				'title' => $this->title_edit,
				'url' => null,
				'active' => true
			]
		];

        return Inertia::render($this->path_render . 'Create', [
            'model' => $candidate,
            'attributes' => [
                'form_type' => 'PUT',
                'route_url' => route($this->route_name . 'update', ['candidate' => $candidate->id, 'vote' => $vote->id]),
                'title' => $this->title_edit,
                'breadcrumb' => $this->breadcrumb_edit,
                'statuses' => generalStatus(),
            ]
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, Vote $vote, Candidate $candidate)
    {
        $candidate->updateWebApp($request);
        return redirect()->route($this->route_name . 'index', ['vote' => $vote])->with('success', $this->success_edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote, Candidate $candidate)
    {
        if($candidate->destroyWebapp()) {
            redirect()->route($this->route_name . 'index', ['vote' => $vote])->with('success', $this->success_delete);
        }
    }
}

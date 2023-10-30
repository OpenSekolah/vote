<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Http\Requests\Admin\VoteRequest;
use Inertia\Inertia;

class VoteController extends Controller
{
    private $path_render;
	private $route_name;
	private $route_candidate_name;
	private $route_voter_name;
	private $route_chart_name;
	private $route_live_chart_name;
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
		$this->path_render = "Admin/Vote/";
		$this->route_name = "admin.votes.";
		$this->route_candidate_name = "admin.candidates.";
		$this->route_voter_name = "admin.voters.";
		$this->route_chart_name = "admin.charts";
		$this->route_live_chart_name = "home.voting.chart";
		$this->title_index = "Pemungutan Suara";
		$this->title_create = "Tambah {$this->title_index}";
		$this->title_edit = "Ubah {$this->title_index}";
		$this->success_add = Lang::get('messages.success_add', ['attribute' => $this->title_index]);
		$this->success_edit = Lang::get('messages.success_update', ['attribute' => $this->title_index]);
		$this->success_delete = Lang::get('messages.message_delete', ['attribute' => $this->title_index]);

		$this->breadcrumb_index = [
			[
				'title' => $this->title_index,
				'url' => null,
				'active' => true
			]
		];

		$this->breadcrumb_create = [
			[
				'title' => $this->title_index,
				'url' => route($this->route_name . 'index'),
				'active' => true
			],
			[
				'title' => $this->title_create,
				'url' => null,
				'active' => true
			]
		];
		
		$this->breadcrumb_edit = [
			[
				'title' => $this->title_index,
				'url' => route($this->route_name . 'index'),
				'active' => false
			],
			[
				'title' => $this->title_edit,
				'url' => null,
				'active' => true
			]
		];
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = abs((int) $request->query('per_page', 10));
        $page = abs((int) $request->query('page', 1));
        $key = $request->query('key', 'religion');
        $queries = ['search', 'page'];
		
        $models = Vote::with(['candidates', 'voters'])
                ->applyFilters($request->only($queries))
                ->paginateData($limit)
                ->appends(request()->query());

        foreach($models as $key => $item) {
            $models[$key]['candidate_count'] = $item->candidates()->count() ?? 0;
            $models[$key]['voter_count'] = $item->voters()->count() ?? 0;
        }

        return Inertia::render($this->path_render . 'Index', [
            'models' => $models,
            'attributes' => [
                'add_link' => route($this->route_name . 'create'),
                'route_name' => $this->route_name,
                'route_candidate_name' => $this->route_candidate_name,
                'route_voter_name' => $this->route_voter_name,
                'route_chart_name' => $this->route_chart_name,
                'route_live_chart_name' => $this->route_live_chart_name,
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
    public function create()
    {
		
        return Inertia::render($this->path_render . 'Create', [
            'attributes' => [
                'form_type' => 'POST',
                'route_url' => route($this->route_name . 'store'),
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
    public function store(VoteRequest $request)
    {
        $data = Vote::createWebApp($request->validated());

        return redirect()->route($this->route_name . 'index')->with('success', $this->success_add);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        return Inertia::render($this->path_render . 'Create', [
            'model' => $vote,
            'attributes' => [
                'form_type' => 'PUT',
                'route_url' => route($this->route_name . 'update', $vote->id),
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
    public function update(VoteRequest $request, Vote $vote)
    {
        $vote->updateWebApp($request->validated());
        return redirect()->route($this->route_name . 'index')->with('success', $this->success_edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        if($vote->delete()) {
            return redirect()->route($this->route_name . 'index')->with('success', $this->success_delete);
        }
    }
}

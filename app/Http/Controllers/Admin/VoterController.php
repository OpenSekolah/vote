<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use App\Models\Voter;
use App\Models\Vote;
use App\Http\Requests\Admin\VoterRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Inertia\Inertia;

class VoterController extends Controller
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
		$this->path_render = "Admin/Voter/";
		$this->route_name = "admin.voters.";
        $this->route_vote_name = "admin.votes.";
		$this->title_index = "Pemilih";
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
        $limit = abs((int) $request->query('per_page', 10));
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

        
        $models = Voter::with(['voter_logs'])->applyFilters($request->only($queries))
            ->where('vote_id', $vote->id)
            ->orderBy('sequence', 'ASC')
            ->orderBy('token', 'ASC')
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
    public function store(Vote $vote, VoterRequest $request)
    {
        $data = $request->validated();
        $data['vote_id'] = $vote->id;
        Voter::createWebApp($data);

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
        Voter::where('vote_id', $vote->id)
            ->where('is_active', true)
            ->orderBy('sequence', 'ASC')
            ->orderBy('token', 'ASC')
            ->chunk(3, function($rows) use (&$models, $vote) {
                $items = [];
                foreach($rows as $key => $item) {
                    $items[] = [
                        'name' => $vote->name,
                        'token' => $item->token,
                        'sequence' => $item->sequence,
                    ];
                }
                $models[] = $items;
            });
            
            // 'printBackground' => true,
            // 'preferCSSPageSize' => true,
            // 'marginTop' => 0.2,
            // 'marginBottom' => 0.2,
            // 'marginLeft' => 0.2,
            // 'marginRight' => 0.2,

        $slug = Str::slug("token {$vote->name}", '-');
        $date = Carbon::now()->format('Y-m-d');
        $pdf = Pdf::setOption([
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
            ])
            ->setPaper('A4', 'portrait')
            ->setWarnings(false)
            ->loadView('pdf.token', ['models' => $models]);

        return $pdf->stream("{$slug}-{$date}.pdf");

        /** VIEW */
        // $models = Voter::where('vote_id', $vote->id)
        //     ->orderBy('sequence', 'ASC')
        //     ->orderBy('token', 'ASC')
        //     ->get();

        // return Inertia::render($this->path_render . 'Show', [
        //     'models' => $models,
        //     'attributes' => [
        //         'vote' => $vote,
        //     ]
		// ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote, Voter $voter)
    {
        if($voter->is_active) {
            if($voter->destroyWebapp()) {
                redirect()->route($this->route_name . 'index', ['vote' => $vote])->with('success', $this->success_delete);
            }
        }

        redirect()->route($this->route_name . 'index', ['vote' => $vote])->with('warnings', "Item are not deleted");
    }
}

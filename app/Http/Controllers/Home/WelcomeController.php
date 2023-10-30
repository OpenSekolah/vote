<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    
    private $path_render;
    private $route_vote_name;

	public function __construct()
	{
		$this->path_render = "Home/Welcome/";
		$this->route_vote_name = "home.voting.";
	}

    public function __invoke(Request $request)
    {
        $limit = abs((int) $request->query('per_page', 9));
        $page = abs((int) $request->query('page', 1));
        $key = $request->query('key', 'religion');
        $queries = ['search', 'page'];

        $models = Vote::with(['candidates', 'voters'])
            ->applyFilters($request->only($queries))
            ->where('is_active', true)
            ->paginateData($limit)
            ->appends(request()->query());

        return Inertia::render($this->path_render . 'Index', [
            'models' => $models,
            'attributes' => [
                'route_vote_name' => $this->route_vote_name
            ]
        ]);
    }
}

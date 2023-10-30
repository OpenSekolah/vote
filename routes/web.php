<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\{
    Admin\VoteController,
    Admin\CandidateController,
    Admin\VoterController,
    Admin\ChartController,
    Home\WelcomeController,
    Home\VoteController as HomeVoteController,
    Home\ChartController as HomeChartController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', function () {
            return Inertia::location(route('admin.votes.index'));
        })->name('dashboard');
    
        Route::resource('votes', VoteController::class, [
            'as' => 'admin',
            'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
        ]);

        Route::resource('{vote}/candidates', CandidateController::class, [
            'as' => 'admin',
            'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
        ]);
        Route::get('{vote}/candidates/show', [CandidateController::class, 'show'])->name('admin.candidates.show');

        Route::resource('{vote}/voters', VoterController::class, [
            'as' => 'admin',
            'only' => ['index', 'create', 'store', 'destroy']
        ]);
        Route::get('{vote}/voters/show', [VoterController::class, 'show'])->name('admin.voters.show');

        Route::get('{vote}/charts', ChartController::class)->name('admin.charts');
    });
});

Route::get('/', WelcomeController::class)->name('home.welcome')->middleware('vote:page');

Route::resource('{vote}/voting', HomeVoteController::class, [
    'as' => 'home',
    'only' => ['index', 'create', 'store']
]);
Route::post('{vote}/voting/login', [HomeVoteController::class, 'login'])->name('home.voting.login')->middleware('vote:page');
Route::get('{vote}/voting/logout', [HomeVoteController::class, 'logout'])->name('home.voting.logout');
Route::get('voting/deletechoice/{id}', [HomeVoteController::class, 'deletechoice'])->name('home.voting.deletechoice');
Route::get('chart/{vote}', HomeChartController::class)->name('home.voting.chart');

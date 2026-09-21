<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PointsTableController;
use App\Http\Controllers\AdminController;


// Home
Route::get('/', function () {

    $teams = \App\Models\Team::all();

    return view('home', compact('teams'));

})->name('home');


// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// Public tournament/points pages
Route::resource('tournaments', TournamentController::class)
    ->only(['index', 'show']);

Route::get('/points-table', [PointsTableController::class, 'index'])
    ->name('points.index');


// Login required pages
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('tournaments', TournamentController::class)
        ->except(['index', 'show']);

    Route::resource('teams', TeamController::class);

    Route::resource('players', PlayerController::class);

    Route::resource('matches', MatchController::class);

    Route::resource('scores', ScoreController::class);
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

});
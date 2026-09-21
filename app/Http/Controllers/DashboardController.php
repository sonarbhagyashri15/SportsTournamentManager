<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use App\Models\Player;
use App\Models\TournamentMatch;
use App\Models\Score;

class DashboardController extends Controller
{
    public function index()
    {
        $teamCount = Team::count();
        $playerCount = Player::count();
        $matchCount = TournamentMatch::count();
        $scoreCount = Score::count();

        return view('dashboard', compact(
            'teamCount',
            'playerCount',
            'matchCount',
            'scoreCount'
        ));
    }
}
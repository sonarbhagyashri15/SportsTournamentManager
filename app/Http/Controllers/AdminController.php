<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use App\Models\Player;
use App\Models\TournamentMatch;
use App\Models\Score;

class AdminController extends Controller
{
    public function index()
    {
        $tournamentCount = Tournament::count();
        $teamCount = Team::count();
        $playerCount = Player::count();
        $matchCount = TournamentMatch::count();
        $scoreCount = Score::count();

        return view('admin.dashboard', compact(
            'tournamentCount',
            'teamCount',
            'playerCount',
            'matchCount',
            'scoreCount'
        ));
    }
}
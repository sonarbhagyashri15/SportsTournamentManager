<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('tournament')->get();

        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $tournaments = Tournament::all();

        return view('teams.create', compact('tournaments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team_name' => 'required',
            'captain' => 'required',
            'coach' => 'required'
        ]);

        Team::create([
            'tournament_id' => $request->tournament_id,
            'team_name' => $request->team_name,
            'captain' => $request->captain,
            'coach' => $request->coach
        ]);

        return redirect()->route('teams.index');
    }

    public function edit(Team $team)
    {
        $tournaments = Tournament::all();

        return view('teams.edit', compact('team', 'tournaments'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team_name' => 'required',
            'captain' => 'required',
            'coach' => 'required'
        ]);

        $team->update([
            'tournament_id' => $request->tournament_id,
            'team_name' => $request->team_name,
            'captain' => $request->captain,
            'coach' => $request->coach
        ]);

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\TournamentMatch;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = TournamentMatch::with([
            'tournament',
            'teamA',
            'teamB'
        ])->get();

        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        $teams = Team::all();

        return view('matches.create', compact(
            'tournaments',
            'teams'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team_a_id' => 'required',
            'team_b_id' => 'required|different:team_a_id',
            'match_date' => 'required|date',
            'match_time' => 'nullable',
            'venue' => 'required',
            'status' => 'required'
        ]);

        TournamentMatch::create([
            'tournament_id' => $request->tournament_id,
            'team_a_id' => $request->team_a_id,
            'team_b_id' => $request->team_b_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'venue' => $request->venue,
            'status' => $request->status
        ]);

        return redirect()->route('matches.index');
    }

    public function edit(TournamentMatch $match)
    {
        $tournaments = Tournament::all();
        $teams = Team::all();

        return view('matches.edit', compact(
            'match',
            'tournaments',
            'teams'
        ));
    }

    public function update(Request $request, TournamentMatch $match)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team_a_id' => 'required',
            'team_b_id' => 'required|different:team_a_id',
            'match_date' => 'required|date',
            'match_time' => 'nullable',
            'venue' => 'required',
            'status' => 'required'
        ]);

        $match->update([
            'tournament_id' => $request->tournament_id,
            'team_a_id' => $request->team_a_id,
            'team_b_id' => $request->team_b_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'venue' => $request->venue,
            'status' => $request->status
        ]);

        return redirect()->route('matches.index');
    }

    public function destroy(TournamentMatch $match)
    {
        $match->delete();

        return redirect()->route('matches.index');
    }
}
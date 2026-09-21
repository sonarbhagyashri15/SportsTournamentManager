<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();

        return view('tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sport' => 'required',
            'start_date' => 'required|date',
            'location' => 'required'
        ]);

        Tournament::create([
            'name' => $request->name,
            'sport' => $request->sport,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'status' => $request->status
        ]);

        return redirect()->route('tournaments.index');
    }

    public function edit(Tournament $tournament)
    {
        return view('tournaments.edit', compact('tournament'));
    }

    public function update(Request $request, Tournament $tournament)
    {
        $request->validate([
            'name' => 'required',
            'sport' => 'required',
            'start_date' => 'required|date',
            'location' => 'required'
        ]);

        $tournament->update([
            'name' => $request->name,
            'sport' => $request->sport,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'status' => $request->status
        ]);

        return redirect()->route('tournaments.index');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournaments.index');
    }
}
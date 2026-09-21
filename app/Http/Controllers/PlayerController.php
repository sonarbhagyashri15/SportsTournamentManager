<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->get();

        return view('players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::all();

        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required',
            'player_name' => 'required',
            'jersey_number' => 'nullable|integer',
            'position' => 'required',
            'phone' => 'nullable'
        ]);

        Player::create([
            'team_id' => $request->team_id,
            'player_name' => $request->player_name,
            'jersey_number' => $request->jersey_number,
            'position' => $request->position,
            'phone' => $request->phone
        ]);

        return redirect()->route('players.index');
    }

    public function edit(Player $player)
    {
        $teams = Team::all();

        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'team_id' => 'required',
            'player_name' => 'required',
            'jersey_number' => 'nullable|integer',
            'position' => 'required',
            'phone' => 'nullable'
        ]);

        $player->update([
            'team_id' => $request->team_id,
            'player_name' => $request->player_name,
            'jersey_number' => $request->jersey_number,
            'position' => $request->position,
            'phone' => $request->phone
        ]);

        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index');
    }
}
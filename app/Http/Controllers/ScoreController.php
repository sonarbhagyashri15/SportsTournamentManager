<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\TournamentMatch;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::with([
            'match.tournament',
            'match.teamA',
            'match.teamB',
            'winner'
        ])->get();

        return view('scores.index', compact('scores'));
    }

    public function create()
    {
        $matches = TournamentMatch::with([
            'tournament',
            'teamA',
            'teamB'
        ])
        ->whereDoesntHave('score')
        ->get();

        return view('scores.create', compact('matches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournament_match_id' => 'required|exists:tournament_matches,id',
            'team_a_score' => 'required|integer|min:0',
            'team_b_score' => 'required|integer|min:0'
        ]);

        $match = TournamentMatch::findOrFail(
            $request->tournament_match_id
        );

        $winnerTeamId = null;

        if ($request->team_a_score > $request->team_b_score) {

            $winnerTeamId = $match->team_a_id;

        } elseif ($request->team_b_score > $request->team_a_score) {

            $winnerTeamId = $match->team_b_id;
        }

        Score::create([
            'tournament_match_id' => $request->tournament_match_id,
            'team_a_score' => $request->team_a_score,
            'team_b_score' => $request->team_b_score,
            'winner_team_id' => $winnerTeamId
        ]);

        $match->update([
            'status' => 'completed'
        ]);

        return redirect()->route('scores.index');
    }

    public function edit(Score $score)
    {
        $matches = TournamentMatch::with([
            'tournament',
            'teamA',
            'teamB'
        ])->get();

        return view('scores.edit', compact(
            'score',
            'matches'
        ));
    }

    public function update(Request $request, Score $score)
    {
        $request->validate([
            'tournament_match_id' => 'required|exists:tournament_matches,id',
            'team_a_score' => 'required|integer|min:0',
            'team_b_score' => 'required|integer|min:0'
        ]);

        $match = TournamentMatch::findOrFail(
            $request->tournament_match_id
        );

        $winnerTeamId = null;

        if ($request->team_a_score > $request->team_b_score) {

            $winnerTeamId = $match->team_a_id;

        } elseif ($request->team_b_score > $request->team_a_score) {

            $winnerTeamId = $match->team_b_id;
        }

        $score->update([
            'tournament_match_id' => $request->tournament_match_id,
            'team_a_score' => $request->team_a_score,
            'team_b_score' => $request->team_b_score,
            'winner_team_id' => $winnerTeamId
        ]);

        $match->update([
            'status' => 'completed'
        ]);

        return redirect()->route('scores.index');
    }

    public function destroy(Score $score)
    {
        $match = $score->match;

        $score->delete();

        if ($match) {
            $match->update([
                'status' => 'scheduled'
            ]);
        }

        return redirect()->route('scores.index');
    }
}
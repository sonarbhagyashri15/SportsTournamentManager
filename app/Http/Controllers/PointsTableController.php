<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\TournamentMatch;

class PointsTableController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();

        $selectedTournament = request('tournament_id');

        if ($selectedTournament) {
            $tournament = Tournament::findOrFail($selectedTournament);
        } else {
            $tournament = $tournaments->first();
        }

        $pointsTable = collect();

        if ($tournament) {

            $teams = $tournament->teams;

            $matches = TournamentMatch::with([
                'score',
                'teamA',
                'teamB'
            ])
            ->where('tournament_id', $tournament->id)
            ->where('status', 'completed')
            ->get();

            foreach ($teams as $team) {

                $played = 0;
                $won = 0;
                $drawn = 0;
                $lost = 0;
                $points = 0;

                foreach ($matches as $match) {

                    if (!$match->score) {
                        continue;
                    }

                    $isTeamA = $match->team_a_id == $team->id;
                    $isTeamB = $match->team_b_id == $team->id;

                    if (!$isTeamA && !$isTeamB) {
                        continue;
                    }

                    $played++;

                    $teamAScore = $match->score->team_a_score;
                    $teamBScore = $match->score->team_b_score;

                    if ($teamAScore == $teamBScore) {

                        $drawn++;
                        $points += 1;

                    } elseif (
                        ($isTeamA && $teamAScore > $teamBScore) ||
                        ($isTeamB && $teamBScore > $teamAScore)
                    ) {

                        $won++;
                        $points += 3;

                    } else {

                        $lost++;
                    }
                }

                $pointsTable->push([
                    'team' => $team,
                    'played' => $played,
                    'won' => $won,
                    'drawn' => $drawn,
                    'lost' => $lost,
                    'points' => $points
                ]);
            }

            $pointsTable = $pointsTable
                ->sortByDesc('points')
                ->values();
        }

        return view('points-table.index', compact(
            'tournaments',
            'tournament',
            'pointsTable'
        ));
    }
}
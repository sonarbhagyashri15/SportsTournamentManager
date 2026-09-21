<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'tournament_match_id',
        'team_a_score',
        'team_b_score',
        'winner_team_id'
    ];

    public function match()
    {
        return $this->belongsTo(
            TournamentMatch::class,
            'tournament_match_id'
        );
    }

    public function winner()
    {
        return $this->belongsTo(
            Team::class,
            'winner_team_id'
        );
    }
}
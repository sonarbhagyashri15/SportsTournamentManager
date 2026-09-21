<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    protected $fillable = [
        'tournament_id',
        'team_a_id',
        'team_b_id',
        'match_date',
        'match_time',
        'venue',
        'status'
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id');
    }

    public function score()
    {
        return $this->hasOne(
            Score::class,
            'tournament_match_id'
        );
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'team_id',
        'player_name',
        'jersey_number',
        'position',
        'phone'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
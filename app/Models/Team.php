<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'tournament_id',
        'team_name',
        'captain',
        'coach'
    ];
        public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function players()
{
    return $this->hasMany(Player::class);
}

}
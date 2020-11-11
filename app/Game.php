<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function team1()
    {
        return $this->belongsTo('App\Team');
    }

    public function team2()
    {
        return $this->belongsTo('App\Team');
    }

    public function players() 
    {
        return $this->belongsToMany('App\Player');
    }
}

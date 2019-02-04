<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    public function days(){
        return $this->belongsToMany('App\Day')->withPivot('numberOfAvailableSeats', 'aircraft_id', 'is_visible');
    }
}

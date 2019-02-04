<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function intervals(){
        return $this->belongsToMany('App\Interval')->withPivot('numberOfAvailableSeats', 'aircraft_id', 'is_visible');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    public function status(){
        return $this->belongsTo('App\Status');
    }
    public function address(){
        return $this->belongsTo('App\Address');
    }
    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function userOwner(){
        return $this->hasOne('App\User', 'id', 'user_owner_id');
    }
    public function userActivator(){
        return $this->hasOne('App\User', 'id', 'user_activator_id');
    }

}

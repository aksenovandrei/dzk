<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['code', 'expirationDate', 'order_id'];

    public function status(){
        return $this->belongsTo('App\Status');
    }
    public function address(){
        return $this->belongsTo('App\Address');
    }
    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function customerOwner(){
        return $this->belongsTo('App\Customer', 'customer_owner_id', 'id');
    }
    public function customerActivator(){
        return $this->hasOne('App\Customer', 'id', 'customer_activator_id');
    }

}

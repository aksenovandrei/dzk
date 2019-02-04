<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'product_id', 'order_id', 'certificate_id'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function certificate()
    {
        return $this->belongsTo('App\Certificate');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id', 'status', 'sum', 'currency', 'product_id', 'paymentDate'];
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function certificate()
    {
        return $this->hasOne('App\Certificate', 'id', 'certificate_id');
    }
    public function customer()
    {
        return $this->hasOne('App\Customer');
    }

}

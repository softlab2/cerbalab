<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function items()
    {
        return $this->hasMany('App\OrderItem', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment', 'payment_id');
    }
}

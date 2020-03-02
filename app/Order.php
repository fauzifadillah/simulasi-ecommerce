<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['CustomerID','OrderNumber','PaymentType','OrderDate','Status'];

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'CustomerID');
    }

    public function payment()
    {
    	return $this->belongsTo('App\Payment','PaymentType');
    }
}

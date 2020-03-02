<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['PaymentType'];

    public function order()
    {
    	return $this->belongsTo('App\Order','PaymentType');
    }
}

	
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
    	'ProductID',
    	'OrderNumber',
    	'Price',
    	'Size',
    	'Color',
    	'Total'
    ]

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}


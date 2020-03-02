<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['id_cart','id_buy','qty','size','color','price'];

    public function product() 
    {
    	return $this->belongsTo('App\Product'); 
    }
}

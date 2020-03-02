<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['CategoryID','SKU','ProductName','ProductDescription','QTY','Price','AvailSize','AvailColor','Color','Size','photo'];

   public function category()
   {
   	return $this->belongsTo('App\Category', 'CategoryID');
   }

   public function orderDetail()
   {
   	return $this->hasMany('App\OrderDetail');
   }

   public function cart() 
    {
    	return $this->hasMany('App\Cart'); 
    }
}

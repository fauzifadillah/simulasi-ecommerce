<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['CategoryName','Description','Picture'];

    public function product() 
    {
    	return $this->hasMany('App\Product'); 
    }
}

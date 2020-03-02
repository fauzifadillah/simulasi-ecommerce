<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = ['Nama','Alamat','Kota','kode_pos','email','no_hp'];

    public function order()
    {
    	return $this->hasMany('App\Order','CustomerID');
    }
}

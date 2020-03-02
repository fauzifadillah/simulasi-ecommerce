<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fixorder extends Model
{
    protected $fillable = ['email','name','alamat','provinsi','kota','kodepos','no_hp','metode','harga','items'];

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\Rajaongkir;

class RajaOngkir extends Controller
{
   	public function Ongkir(){
    $rajaongkir = new Rajaongkir('f214df40871ea3e93f87058943919b31', Rajaongkir::ACCOUNT_STARTER);

    $config['api_key'] = 'f214df40871ea3e93f87058943919b31';
 	$config['account_type'] = 'starter';
 
 	$rajaongkir = new Rajaongkir($config);

 	$provinces = $rajaongkir->getProvinces();
 	return $provinces;
 								}
}

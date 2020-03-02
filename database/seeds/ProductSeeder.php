<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$SKU 			= array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    	$QTY 			= array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    	$ProductName 	= array ('Nike','Adidas','Converse','Kappa','Supreme','Gucci','LV','CDG','Vans','Docmmart','Herschel','SAMSUNG','Honda','Toyo','Yokohama');
    	$Price 			= array (150000,200000,255000,300000,350000,400000,355000,225000,175000,199000);
    	$CategoryID  	= array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    	$Size 			= array ('XS','S','M','L','XL','XXL','Unisize');
    	$Color 			= array ('Biru','Merah','Coklat','Hitam','Putih','Ungu','Orange');
    	$photo 			= array ('/upload/photo/1548667261.png','/upload/photo/1548648167.png','/upload/photo/1548667311.png');
    	$ProductDescription = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ';
    	for ($i=0; $i<=20000; $i++)
    	{ 
    		$prod = new Product;
    		$prod->CategoryID 			= $CategoryID[rand(0,6)];
    		$prod->SKU 					= $SKU[rand(0,14)];
    		$prod->ProductName 			= $ProductName[rand(0,14)];
    		$prod->ProductDescription 	= $ProductDescription;
    		$prod->QTY 					= $QTY[rand(0,14)];
    		$prod->Price 				= $Price[rand(0,9)];
    		$prod->AvailSize 			= $Size[rand(0,6)];
    		$prod->AvailColor 			= $Color[rand(0,6)];
    		$prod->Size 				= $Size[rand(0,6)];
    		$prod->Color 				= $Color[rand(0,6)];
    		$prod->photo 				= $photo[rand(0,2)];
    		$prod->save();
  //       DB::table('products')->truncate();
 
		// Product::create(array(
		// 	'CategoryID'=>'1',
		// 	'ProductName'=>'Converse',
		// 	'ProductDescription'=> Str::random(40),
		// 	'QTY' => '',
		// 	'Price' =>'',
		// 	'Size' => '',
		// 	'Color' => '',
		// 	'photo' => ''
		// ));
 
		// Product::create(array(
		// 	'CategoryID'=>'2',
		// 	'ProductName'=>'Nike'
		// ));
 
		// Product::create(array(
		// 	'CategoryID'=>'3',
		// 	'ProductName'=>'Adidas'
		// ));

		}
    }
}

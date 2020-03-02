<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});
// ---------------------CATEGORY---------------------------- //

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/table','CategoryController@table')->name('category.table');
Route::post('/category/add','CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');

Route::patch('/category/edit/{id}', 'CategoryController@update')->name('category.ubah');
// Route::match(['put', 'post'], '/category/ubah/{id}','CategoryController@update');

// Route::post('/category/update','CategoryController@update')->name('category.update');
Route::delete('/category/delete/{id}','CategoryController@destroy')->name('category.destroy');


// ---------------------CUSTOMER---------------------------- //


Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('/customer/table','CustomerController@table')->name('customer.table');
Route::post('/customer/add','CustomerController@store')->name('customer.store');

Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');

Route::patch('/customer/edit/{id}', 'CustomerController@update')->name('customer.ubah');
// Route::match(['put', 'post'], '/customer/ubah/{id}','CustomerController@update');

// Route::post('/customer/update','CustomerController@update')->name('customer.update');
Route::delete('/customer/delete/{id}','CustomerController@destroy')->name('customer.destroy');

// ------------ORDER----------------------- //

Route::get('/order', 'OrderController@index')->name('order');
Route::get('/order/table','OrderController@table')->name('order.table');
Route::post('/order/add','OrderController@store')->name('order.store');
Route::get('/order/create','OrderController@create')->name('order.create');
Route::get('/order/create_payment','OrderController@create_payment')->name('order.create_payment');
Route::get('/order/edit/{id}', 'OrderController@edit')->name('order.edit');

Route::patch('/order/edit/{id}', 'OrderController@update')->name('order.ubah');
// Route::match(['put', 'post'], '/order/ubah/{id}','OrderController@update');

// Route::post('/order/update','OrderController@update')->name('order.update');
Route::delete('/order/delete/{id}','OrderController@destroy')->name('order.destroy');

// ------------PRODUCT----------------------- //

Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/table','ProductController@table')->name('product.table');
Route::post('/product/add','ProductController@store')->name('product.store');
Route::get('/product/create','ProductController@create')->name('product.create');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');

Route::patch('/product/edit/{id}', 'ProductController@update')->name('product.ubah');
// Route::match(['put', 'post'], '/product/ubah/{id}','productController@update');

// Route::post('/product/update','productController@update')->name('product.update');
Route::delete('/product/delete/{id}','ProductController@destroy')->name('product.destroy');

// ------------PAYMENT----------------------- //

Route::get('/payment', 'PaymentController@index')->name('payment');
Route::get('/payment/table','PaymentController@table')->name('payment.table');
Route::post('/payment/add','PaymentController@store')->name('payment.store');
Route::get('/payment/create','PaymentController@create')->name('payment.create');
Route::get('/payment/edit/{id}', 'PaymentController@edit')->name('payment.edit');

Route::patch('/payment/edit/{id}', 'PaymentController@update')->name('payment.ubah');
// Route::match(['put', 'post'], '/payment/ubah/{id}','PaymentController@update');

// Route::post('/payment/update','PaymentController@update')->name('payment.update');
Route::delete('/payment/delete/{id}','PaymentController@destroy')->name('payment.destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// -------------- FRONT-END --------------------- //


// HOMEPAGE
Route::get('/welcome','PageController@home')->name('home');

// Contact
Route::get('/contact-us','PageController@contact')->name('contact-us');


// 1. Category
Route::get('/category-front','PageController@index')->name('category-front');	
Route::get('/category-front/productcategory','CategoryController@create')->name('category-front-product'); // Category List
Route::get('/category-front/productlist','CategoryController@productlist')->name('category-front-product-list'); // Product List 
Route::get('/produklist', 'PageController@indexlist')->name('produk-list');


Route::get('/category-cek','PageController@cek')->name('category-cek');	
Route::get('/category-cek/productcategory','CategoryController@create')->name('category-cek-product'); // Category List
Route::get('/category-cek/productlist','CategoryController@productlist')->name('category-cek-product-list'); // Product List 

// 2. Product
Route::get('/product-front','ProductController@frontend')->name('product-index');
Route::get('/product-front/{id}','ProductController@show');

// 3. Cart
Route::get('/cart','cartcontroller@index')->name('cart-index');
Route::get('/carts','cartcontroller@list_cart')->name('cart-list');
Route::post('/cart-data','cartcontroller@store')->name('cart-button-post-data');
Route::get('/cart-data','cartcontroller@create')->name('cart-button-get-data');
Route::get('/testcart', 'cartcontroller@test')->name('cart-test');
Route::get('/checkout-delete/{id}','cartcontroller@deletebutton')->name('checkout-delete');
Route::get('/checkout','cartcontroller@checkout')->name('checkout');
Route::post('/checkout/complete','cartcontroller@complete')->name('complete');



Route::post('/checkout/completes','cartcontroller@opi')->name('complete-banget');


Route::post('/checkout/data','cartcontroller@data')->name('complete-data');

Route::get('/thankyou','PageController@thankyou')->name('thankyou');

// Raja Ongkir //
Route::get('/api','PageController@postreq')->name('api');
Route::get('/api/kota','PageController@postreq_kota')->name('api_kota');

// Socialite //
Route::get('auth/{driver}', ['as' => 'socialAuth', 'uses' => 'Auth\SocialController@redirectToProvider']);
Route::get('auth/{driver}/callback', ['as' => 'socialAuthCallback', 'uses' => 'Auth\SocialController@handleProviderCallback']);

// Hadoop HDFS //

Route::get('/hadoop','PageController@hadoop')->name('hadoop');
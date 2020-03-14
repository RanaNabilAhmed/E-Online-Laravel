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
Route::get('/index','cartcontroller@index');
Route::get('/admin','usercontroller@index');
Route::group(['prefix'=>'/'],function(){
    Route::get('/cart/{id}','cartcontroller@addtocart');
    Route::get('/cart','cartcontroller@showcart');
    Route::get('/update-cartqty','cartcontroller@updatecartitem');
    Route::get('/remove_cart','cartcontroller@removecartitem');
    Route::get('/checkout','cartcontroller@checkout');
    Route::get('/category','cartcontroller@shopcategory');
    Route::get('/confirmation','cartcontroller@orderconfirmation');
    Route::get('/signup','cartcontroller@login');
    Route::get('/registration','cartcontroller@create');
    Route::post('/registration','cartcontroller@store')->name('addimage');
    Route::get('/single_product/{id}','cartcontroller@showsingleproduct');
    Route::get('/order','cartcontroller@placeOrder');
    Route::get('/myorder','cartcontroller@myOrder');




});

Route::post('/loginas','usercontroller@authenticate');
Route::get('/logout','usercontroller@logout');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::group(['prefix'=>'user'],function(){
    Route::get('/alluser','usercontroller@alluser');
    Route::get('/create','usercontroller@create');
    Route::post('/create','usercontroller@store')->name('addimage');
    Route::get('/delete/{id}','usercontroller@destroy');
    Route::get('/block','usercontroller@blockview');
    Route::get('/block/{id}','usercontroller@blockuser');
    Route::get('/active/{id}','usercontroller@activeuser');
    Route::get('/edit/{id}','usercontroller@edit');
    Route::post('/update','usercontroller@update');
});

Route::group(['prefix'=>'product'],function(){
    Route::get('/index','productcontroller@index');
    Route::get('/create','productcontroller@create');
    Route::post('/create','productcontroller@store');
    Route::get('/delete/{id}','productcontroller@destroy');
    Route::get('/block','productcontroller@blockview');
    Route::get('/block/{id}','productcontroller@blockproduct');
    Route::get('/active/{id}','productcontroller@activeproduct');
    Route::get('/edit/{id}','productcontroller@edit');
    Route::post('/update','productcontroller@update');

});

Route::group(['prefix'=>'category'],function(){
    Route::get('/index','categorycontroller@index');
    Route::get('/create','categorycontroller@create');
    Route::post('/create/main','categorycontroller@mainstore');
    Route::post('/create/sub','categorycontroller@substore');
    Route::get('/delete/{id}','categorycontroller@destroy');
    Route::get('/edit/{id}','categorycontroller@edit');

});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/role','RoleController@add_role');
    Route::post('/role','RoleController@store_role');
    Route::get('/list','RoleController@role_list');
    

});

Route::get('/cartindex ','cartcontroller@index');
Route::get('index/come','cartcontroller@showcart');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/confirm','PaymentController@payWithpaypal');
Route::get('/execute','PaymentController@getPaymentStatus')->name('/execute');


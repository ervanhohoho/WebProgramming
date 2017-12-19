<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'userController@index');

Route::post('/register', 'userController@register');
Route::post('/login','userController@login');
Route::get('/registerView','userController@registerView');
Route::get('/loginView',function(){return view('login');});
Route::get('/logout','userController@logout');
Route::get('/insertUser','userController@insertUser')->middleware('admin');
Route::get('/updateUser','userController@updateUser')->middleware('admin');
Route::get('/updateUserDetail/{id}','userController@updateUserDetail')->middleware('admin');
Route::get('/deleteUser/{id}','userController@deleteUser')->middleware('admin');
Route::post('/doUpdateUser','userController@doUpdateUser');
Route::get('/profile','userController@profile');

Route::get('/adminPage', 'userController@adminPage')->name('admin')->middleware('admin');
Route::get('/userPage', 'userController@userPage')->name('user');

Route::get('/insertShoe','shoeController@index')->middleware('admin');
Route::post('/doInsertShoe','shoeController@insertShoe')->middleware('admin');
Route::get('/viewData', 'shoeController@viewData');
Route::get('/updateShoe','shoeController@updateShoeView')->middleware('admin');
Route::get('/updateShoeEdit/{id}','shoeController@updateShoeEditView')->middleware('admin');
Route::post('/doUpdateShoe','shoeController@updateShoe')->middleware('admin');
Route::get('/shoeDetail/{id}','shoeController@detailShoe');

Route::get('/insertBrand','brandController@index')->middleware('admin');
Route::get('/doInsertBrand','brandController@insertBrand')->middleware('admin');
Route::get('/updateBrand','brandController@updateBrand')->middleware('admin');
Route::get('/updateBrandDetail/{id}','brandController@updateBrandDetail')->middleware('admin');
Route::post('/doUpdateBrand','brandController@doUpdateBrand')->middleware('admin');

Route::get('/addToCart','transactionController@addToCart');
Route::get('/cart','transactionController@showCart');

Route::post('/pay','transactionController@pay');
Route::get('/deleteCart/{id}','transactionController@deleteCart');
Route::get('/transactionHistory','transactionController@transactionHistory');
Route::get('/detailTransaction/{id}','transactionController@detailTransaction');
Route::get('/deleteTransaction/{id}','transactionController@deleteTransaction');
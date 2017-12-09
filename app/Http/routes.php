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
Route::get('/insertUser','userController@insertUser');
Route::get('/updateUser','userController@updateUser');
Route::get('/updateUserDetail/{id}','userController@updateUserDetail');
Route::get('/deleteUser/{id}','userController@deleteUser');


Route::get('/adminPage', 'userController@adminPage')->name('admin')->middleware('admin');
Route::get('/userPage', 'userController@userPage')->name('user');

Route::get('/insertShoe','shoeController@index');
Route::post('/doInsertShoe','shoeController@insertShoe');
Route::get('/viewData', 'shoeController@viewData');
Route::get('/updateShoe','shoeController@updateShoeView');
Route::get('/updateShoeEdit/{id}','shoeController@updateShoeEditView');
Route::post('/doUpdateShoe','shoeController@updateShoe');

Route::get('/insertBrand','brandController@index');
Route::get('/doInsertBrand','brandController@insertBrand');
Route::get('/updateBrand','brandController@updateBrand');
Route::get('/updateBrandDetail/{id}','brandController@updateBrandDetail');
Route::post('/doUpdateBrand','brandController@doUpdateBrand');
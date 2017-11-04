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
Route::get('/viewData', 'shoeController@viewData');
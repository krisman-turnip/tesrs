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
Auth::routes();

/* Login Admin*/
Route::get('/', function () {
    return view('loginadmin/login');
});
Route::post('/prosesloginadmin','loginadminController@login');
Route::get('/proseslogoutadmin','loginadminController@logout');

/* User */
Route::get('/user','userController@index');
Route::get('/user/tambah','userController@usertambah');
Route::post('/user/prosestambah','userController@store');
Route::get('/user/edit/{id}','userController@edit');
Route::post('/user/update','userController@update');

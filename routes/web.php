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

/* Karyawan */
Route::get('/karyawan','karyawanController@index');
Route::get('/karyawan/tambah','karyawanController@karyawantambah');
Route::post('/karyawan/prosestambah','karyawanController@store');
Route::get('/karyawan/edit/{id}','karyawanController@edit');
Route::post('/karyawan/update','karyawanController@update');

/* Satuan */
Route::get('/satuan','satuanController@index');
Route::get('/satuan/tambah','satuanController@satuantambah');
Route::post('/satuan/prosestambah','satuanController@store');
Route::get('/satuan/edit/{id}','satuanController@edit');
Route::post('/satuan/update','satuanController@update');

/* barang mentah */
Route::get('/barang_mentah','bahan_mentahController@index');
Route::get('/barang_mentah/tambah','bahan_mentahController@tambah');

/* barang jadi */
Route::get('/barang_jadi','barang_jadiController@index');
Route::get('/barang_jadi/tambah','barang_jadiController@tambah');

/* Customer */
Route::get('/customer','customerController@index');
Route::get('/customer/tambah','customerController@tambah');
Route::post('/customer/prosestambah','customerController@store');
Route::get('/customer/edit/{id}','customerController@edit');
Route::post('/customer/update','customerController@update');

/* Supplier */
Route::get('/supplier','supplierController@index');
Route::get('/supplier/tambah','supplierController@tambah');
Route::post('/supplier/prosestambah','supplierController@store');
Route::get('/supplier/edit/{id}','supplierController@edit');
Route::post('/supplier/update','supplierController@update');

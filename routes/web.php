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
Route::post('/barang_mentah/prosestambah','bahan_mentahController@store');
Route::get('/barang_mentah/edit/{id}','bahan_mentahController@edit');
Route::post('/barang_mentah/update','bahan_mentahController@update');

/* barang jadi */
Route::get('/barang_jadi','barang_jadiController@index');
Route::get('/barang_jadi/tambah','barang_jadiController@tambah');
Route::post('/barang_jadi/prosestambah','barang_jadiController@store');
Route::get('/barang_jadi/edit/{id}','barang_jadiController@edit');
Route::post('/barang_jadi/update','barang_jadiController@update');

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

/* pemesanan barang */
Route::get('/pembelian','pembelianController@index');
Route::get('/pembelian/tambah','pembelianController@tambah');
Route::get('/pembelian/formApproval','pembelianController@formapproval');
Route::get('/pembelian/penerimaanBarang','pembelianController@penerimaanbarang');
Route::get('/pembelian/planningPembayaran','pembelianController@planningpembayaran');
Route::get('/pembelian/pembayaranKeSupplier','pembelianController@pembayarankesupplier');
Route::get('/pembelian/formPembayaran','pembelianController@formpembayaran');

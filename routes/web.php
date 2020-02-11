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

                /* route anggota->admin */
Route::get('/home','anggotaController@index');
Route::get('/anggota/tambah','anggotaController@tambah');
Route::post('/anggota/store','anggotaController@store');
Route::get('/anggota/hapus/{id}', 'anggotaController@delete');
Route::get('/anggota/edit/{id}', 'anggotaController@edit');
Route::put('/update/{id}', 'anggotaController@update');
Route::get('/cari', 'anggotaController@loadData')->name("search");
Route::get('/anggota/profile/{id}', 'anggotaController@profile');

                /* route produk->admin */
Route::get('/produk','produkController@index');
Route::get('/produk/tambah','produkController@tambah');
Route::post('/produk/store','produkController@store');
Route::get('/produk/hapus/{id}', 'produkController@delete');
Route::get('/produk/edit/{id}', 'produkController@edit');
Route::put('/produk/update/{id}', 'produkController@update');
Route::get('/report','produkController@transaksiProduk');

                /* route materi->admin */
Route::get('/materi','materiController@index');
Route::get('/materi/upload','materiController@upload');
Route::post('/materi/prosesupload','materiController@proses_upload');
Route::get('/materi/download/{id}','materiController@download');
Route::get('/materi/hapus/{id}', 'materiController@delete');

                /* route jabatan->admin */
Route::get('/jabatan','jabatanController@index');
Route::get('/jabatan/tambah','jabatanController@tambah');
Route::post('/jabatan/store','jabatanController@store');
Route::get('/jabatan/hapus/{id}', 'jabatanController@delete');
Route::get('/jabatan/edit/{id}', 'jabatanController@edit');
Route::put('/jabatan/update/{id}', 'jabatanController@update');

                /* route email->admin */
Route::get('/email','emailController@index');
Route::post('/email/kirim','emailController@emailKirim');
Route::get('/emailtampil','emailController@emailtampil');

                /* route admin->admin */
Route::get('/admin','adminController@index');
Route::get('/admin/tambah','adminController@tambah');
Route::post('/admin/store','adminController@store');
Route::get('/admin/hapus/{id}', 'adminController@delete');
Route::get('/admin/edit/{id}', 'adminController@edit');
Route::put('/admin/update/{id}', 'adminController@update');

                /* route transaksi->admin */
Route::get('/produk/produk_pengajuan','produkController@tampil');
Route::get('/produk/tolak/{id}/{a}/{b}','produkController@tolak');
Route::get('/produk/terima/{id}/{a}/{b}/{c}','produkController@terima');

                /* Login Admin*/
Route::get('/', function () {
    return view('loginadmin/login');
});
Route::post('/prosesloginadmin','loginadminController@login');
Route::get('/proseslogoutadmin','loginadminController@logout');

                /* login anggota  */
Route::get('/loginanggota', function () {
    return view('loginanggota/login');
});
Route::post('/prosesloginanggota','loginanggotaController@login');
Route::get('/proseslogoutanggota','loginanggotaController@logout');

                /*route anggota->member */
Route::get('/beranda','anggotamemberController@index');
Route::get('/beranda/{id}','anggotamemberController@tab');

               /* route produk->member */
Route::get('/produkanggota','produkanggotaController@index');

                /* route transaksi->member */
Route::post('/produkanggota/tambah/{id}','transaksiController@store');
Route::get('/produkanggota/pengajuan','transaksiController@pengajuan');
Route::get('/produkanggota/batal/{id}','transaksiController@delete');
Route::get('/produkanggota/diterima','transaksiController@diterima');
Route::get('/produkanggota/ditolak','transaksiController@ditolak');

                /* route materi->member */
Route::get('/materianggota','materianggotaController@index');

                /* route komisi->admin */
 Route::get('/komisi','komisiController@index');
 Route::get('/pembayaran/{id}','komisiController@pembayaran');
 Route::put('/bayar/{id}','komisiController@bayar');
 Route::get('/transaksiKomisi','komisiController@transaksiKomisi');
 Route::get('/komisi/download/{id}','komisiController@download');

                /* route komisi->admin */
Route::get('/pembayaran','pembayarankomisiController@index');
Route::get('/pembayaran/download/{id}','pembayarankomisiController@download');

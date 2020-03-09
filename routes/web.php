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
Route::get('/anggotaCari','anggotaController@cari');
Route::get('/anggota/tambah','anggotaController@tambah');
Route::post('/anggota/store','anggotaController@store');
Route::get('/anggota/hapus/{id}', 'anggotaController@delete');
Route::get('/anggota/edit/{id}', 'anggotaController@edit');
Route::get('/anggota/reset/{id}', 'anggotaController@reset');
Route::put('/update/{id}', 'anggotaController@update');
Route::get('/cari', 'anggotaController@loadData')->name("search");
Route::get('/anggota/profile/{id}', 'anggotaController@profile');

                /* route produk->admin */
Route::get('/produk','produkController@index');
Route::get('/produkCari','produkController@cari');
Route::get('/produkDetail/{id}','produkController@detail');
Route::get('/produk/tambah','produkController@tambah');
Route::post('/produk/store','produkController@store');
Route::get('/produk/hapus/{id}', 'produkController@delete');
Route::get('/produk/edit/{id}', 'produkController@edit');
Route::put('/produk/update/{id}', 'produkController@update');
Route::get('/report','produkController@transaksiProduk');

                /* route materi->admin */
Route::get('/materi','materiController@index');
Route::get('/materiCari','materiController@materiCari');
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
Route::get('/pengajuanCari','produkController@tampilCari');
Route::get('/produk/tolak/{id}/{a}/{b}/{c}','produkController@tolak');
Route::get('/produk/terima/{id}/{a}/{b}/{d}','produkController@terima');

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
Route::get('/reset','loginanggotaController@reset');
Route::post('/loginanggota/reset','loginanggotaController@loginreset');
Route::get('/set_password','loginanggotaController@set');

                /*route anggota->member */
Route::get('/beranda','anggotamemberController@index');
Route::get('/beranda/{id}','anggotamemberController@tab');

               /* route produk->member */
Route::get('/produkanggota','produkanggotaController@index');
Route::get('/produkanggotainput/{id}','produkanggotaController@input');

                /* route transaksi->member */
Route::post('/produkanggota/tambah/{id}','transaksiController@store');
Route::get('/produkanggota/pengajuan','transaksiController@pengajuan');
Route::get('/produkanggota/pengajuanCari','transaksiController@pengajuanCari');
Route::get('/produkanggota/batal/{id}','transaksiController@delete');
Route::get('/produkanggota/diterima','transaksiController@diterima');
Route::get('/produkanggota/diterimaCari','transaksiController@diterimaCari');
Route::get('/produkanggota/ditolak','transaksiController@ditolak');
Route::get('/produkanggota/ditolakCari','transaksiController@ditolakCari');

                /* route materi->member */
Route::get('/materianggota','materianggotaController@index');

                /* route komisi->anggota */
 Route::get('/komisi','komisiController@index');
 Route::get('/komisiPending','komisiController@pending');
 Route::get('/komisiBatal','komisiController@batal');
 Route::get('/komisiSukses','komisiController@sukses');
 Route::get('/komisiPending/batal/{id}','komisiController@pendingBatal');
 Route::get('/pendingCari','komisiController@pendingCari');
 Route::get('/batalCari','komisiController@batalCari');
 Route::get('/suksesCari','komisiController@suksesCari');
 Route::get('/komisiCari','komisiController@komisiCari');
 Route::get('/komisianggota','komisiController@komisianggota');
 Route::get('/requestkomisi','komisiController@requestkomisi');
 Route::post('/trrequestkomisi','komisiController@trrequestkomisi');
 Route::get('/lihatrequestkomisi','komisiController@lihatrequestkomisi');
 Route::get('/komisi/editrequest/{id}','komisiController@editrequestkomisi');
 Route::post('/updaterequestkomisi/{id}','komisiController@updaterequestkomisi');
 Route::get('/pembayaran/{id}','komisiController@pembayaran');
 Route::put('/bayar/{id}','komisiController@bayar');
 Route::get('/transaksiKomisi','komisiController@transaksiKomisi');
 Route::get('/komisi/download/{id}','komisiController@download');

                /* route komisi->admin */
Route::get('/pembayaran','pembayarankomisiController@index');
Route::get('/pembayaran/download/{id}','pembayarankomisiController@download');

                /* route komisi template->admin */
Route::get('/komisiTemplate','komisi_templateController@index');
Route::get('/komisiTemplate/tambah','komisi_templateController@input');
Route::post('/komisiTemplate/store','komisi_templateController@store');
Route::get('/komisiTemplate/edit/{id}','komisi_templateController@edit');
Route::post('/komisiTemplate/update/{id}','komisi_templateController@update');
Route::get('/komisiTemplate/delete/{id}','komisi_templateController@delete');
Route::get('/komisiTemplate/skema','komisi_templateController@skema');
Route::post('/komisiTemplate/skemainput','komisi_templateController@storeskema');
Route::get('/tampilSkema','komisi_templateController@tampilSkema');
Route::get('/komisiTemplate/skemadelete/{id}','komisi_templateController@deleteskema');
Route::get('/komisiTemplate/skemaedit/{id}','komisi_templateController@editskema');
Route::post('/komisiTemplate/skemaupdate/{id}','komisi_templateController@updateSkema');
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['id_transaksi','id_sub_produk','id_produk', 'id_anggota','status','komisi','jumlah','nama_customer','tanggal_berangkat'];
}

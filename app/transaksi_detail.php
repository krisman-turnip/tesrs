<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    protected $table = 'transaksi_detail';

    protected $fillable = ['id_produk','id_anggota','id_transaksi','id_sub_produk','nama_customer','ktp_customer','tanggal_berangkat'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['id_transaksi','id_produk', 'id_anggota','status','komisi','jumlah'];
}

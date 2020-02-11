<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_komisi extends Model
{
    protected $table = 'transaksi_komisi';

    protected $fillable = ['id_produk','id_anggota', 'jumlah','created_at'];
}

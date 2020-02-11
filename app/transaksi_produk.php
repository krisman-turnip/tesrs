<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_produk extends Model
{
    protected $table = 'transaksi_produk';

    protected $fillable = ['id_produk','id_anggota', 'jumlah','created_at','admin','komisi'];
}

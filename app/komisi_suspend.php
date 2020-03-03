<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komisi_suspend extends Model
{
    protected $table = "komisi_suspend";
    protected $fillable = ['id_komisi_transaksi','id_anggota','id_produk','id_transaksi','jumlah','nominal','approve','status'];
}

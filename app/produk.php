<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';

    protected $fillable = ['id_produk','id_sub_produk','nama_produk', 'jumlah','sisa','terjual','harga','file_banner','keterangan','status'];
}

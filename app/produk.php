<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';

    protected $fillable = ['id_produk','nama_produk', 'jumlah','sisa','terjual','harga'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanggal_produk extends Model
{
    protected $table = 'tanggal_produk';

    protected $fillable = ['id_sub_produk','id_produk','tanggal_berangkat','tanggal_expired','status'];
}

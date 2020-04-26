<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 'master';

    protected $fillable = ['produk_id','nama_produk','harga_pokok', 'harga_jual','karyawan_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_jadiModel extends Model
{
    protected $table = 'tbl_m_barang_jadi';

    protected $fillable = ['nama_barang','keterangan','satuan_terkecil', 'status','harga_jual','created_at','updated_at'];
}

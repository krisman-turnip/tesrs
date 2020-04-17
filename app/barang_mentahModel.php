<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_mentahModel extends Model
{
    protected $table = 'tbl_m_barang_mentah';

    protected $fillable = ['nama_barang','keterangan','supplier_id','satuan_terkecil','harga', 'status','hpp_acc_id','persediaan_acc_id','created_at','updated_at'];
}

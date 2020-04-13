<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satuanModel extends Model
{
    protected $table = 'tbl_m_satuan';

    protected $fillable = ['satuab_id','nama_satuan','status', 'created_at','updated_at'];
}

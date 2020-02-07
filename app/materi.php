<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    protected $table = "materi";
 
    protected $fillable = ['id_materi','id_produk','nama_materi','keterangan'];
}

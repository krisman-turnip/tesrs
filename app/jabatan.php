<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = "jabatan";
    protected $fillable = ['id_jabatan','nama_jabatan','komisi','keterangan'];
    
}

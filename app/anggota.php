<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class anggota extends Model
{
    //
    protected $table = 'anggota';

    protected $fillable = ['id','id_anggota','id_parent','id_parent_2', 'id_jabatan','parent_all','nama','alamat','email','no_handphone','poin','password','saldo','status','no_ktp','no_npwp','file_ktp',];

}

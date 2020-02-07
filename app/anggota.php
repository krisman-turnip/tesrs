<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class anggota extends Model
{
    //
    protected $table = 'anggota';

    protected $fillable = ['id','id_anggota','id_parent', 'id_jabatan','parent_all','nama','alamat','email','no_handphone','password','saldo','status'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komisi extends Model
{
    protected $table = "komisi";
    protected $fillable = ['id_komisi','id_anggota','komisi','bukti_transfer',];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_komisi extends Model
{
    protected $table = 'request_komisi';

    protected $fillable = ['id_requestkomisi','id_anggota','jumlah_request', 'status','created_at'];
}

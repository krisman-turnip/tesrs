<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class highlight extends Model
{
    protected $table = "highlight";
    protected $fillable = ['id_highlight','deskripsi','keterangan','status','judul','file'];
}

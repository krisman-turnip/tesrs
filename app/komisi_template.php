<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komisi_template extends Model
{
    protected $table = "komisi_template";
    protected $fillable = ['id_template_komisi','nama_template','komisi_1','komisi_2','komisi_3','poin_1','poin_2','poin_3','status'];
}

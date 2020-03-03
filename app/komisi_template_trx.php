<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komisi_template_trx extends Model
{
    protected $table = "komisi_template_trx";
    protected $fillable = ['id_komisi_template_trx','id_jabatan','id_produk','id_template_komisi','keterangan'];
}

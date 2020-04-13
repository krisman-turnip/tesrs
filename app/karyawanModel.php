<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawanModel extends Model
{
    protected $table = 'tbl_m_karyawan';

    protected $fillable = ['karyawan_id','fullname','no_hp', 'no_ktp','alamat','bagian','status','join_date','created_at','update_at','updated_by'];
}

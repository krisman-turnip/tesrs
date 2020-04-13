<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 'tbl_m_user';

    protected $fillable = ['user_id','username','password', 'fullname','menu','date_login','karyawan_id'];
}

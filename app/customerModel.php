<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    protected $table = 'tbl_m_customer';

    protected $fillable = ['customer_id','nama_customer','telepon', 'alamat','fax','email','npwp','contact_person','created_at','update_at'];
}

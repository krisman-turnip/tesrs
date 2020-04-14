<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplierModel extends Model
{
    protected $table = 'tbl_m_supplier';

    protected $fillable = ['supplier_id','supplier_name','contact_person', 'address','telp','fax','email','cabang','top','bank','bank_name','bank_no','supplier_tax','utang_acc_id','ppn_acc_id','diskon_acc_id','dp_acc_id','created_at','update_at'];
}

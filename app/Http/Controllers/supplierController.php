<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\supplierModel;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index()
    {
        
            $supplier = DB::table('tbl_m_supplier')->get();
            return view('supplier/supplier', ['supplier' => $supplier]); 
        
    }

    public function tambah()
    {
            return view('supplier/supplier_tambah');

    }

    public function store(Request $request)
    {
        $createCustomer = customerModel::create([
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'npwp' => $request->npwp,
            'fax' => $request->fax,
            'contact_person' => $request->contact_person,
    	]);
 
        return redirect('customer/tambah');
    }
}

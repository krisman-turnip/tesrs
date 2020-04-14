<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\customerModel;
use Illuminate\Http\Request;

class customerController extends Controller
{
    
    public function index()
    {
        
            $customer = DB::table('tbl_m_customer')->get();
            return view('customer/customer', ['customer' => $customer]);
            return redirect('customer');
        
    }

    public function tambah()
    {
            return view('customer/customer_tambah');

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

    public function edit(Request $request,$id)
    {
        if (Session::get('login'))
        {
            $id=$request->id;
            //$anggota = anggota::find($id);
            $customer = DB::table('tbl_m_customer')->where('customer_id',$id)->first();
            return view('customer/customer_edit', ['customer' => $customer]);
        }
        else
        {
            return redirect('customer');
        }    
    }

    public function update(Request $request)
    {
        $id = $request->customer_id;
        print_r($id);
        DB::table('tbl_m_customer')-> where('customer_id', $id)-> update([
        //$anggota = anggota::find($id);
        'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'npwp' => $request->npwp,
            'fax' => $request->fax,
            'contact_person' => $request->contact_person,
        ]);
         return redirect('customer');
    }
}

<?php

namespace App\Http\Controllers;
use App\satuanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class satuanController extends Controller
{
    public function index()
    {
        
            $satuan = DB::table('tbl_m_satuan')->get();
            return view('satuan/satuan', ['satuan' => $satuan]);
      
      
            return redirect('satuan');
        
    }

    public function satuantambah()
    {
            return view('satuan/satuan_tambah');

    }

    public function store(Request $request)
    {
        $createAdmin = satuanModel::create([
            'nama_satuan' => $request->nama_satuan,
            'status' => '1'
    	]);
 
        return redirect('satuan/tambah');
    }

    public function edit(Request $request,$id)
    {
        if (Session::get('login'))
        {
            $id=$request->id;
            //$anggota = anggota::find($id);
            $satuan = DB::table('tbl_m_satuan')->where('satuan_id',$id)->first();
            return view('satuan/satuan_edit', ['satuan' => $satuan]);
        }
        else
        {
            return redirect('/');
        }    
    }

    public function update( Request $request)
    {
        $id = $request->satuan_id;
        DB::table('tbl_m_satuan')-> where('satuan_id', $id)-> update([
        //$anggota = anggota::find($id);
        'nama_satuan' => $request->nama_satuan,

        ]);
        return redirect('satuan');
    }
}

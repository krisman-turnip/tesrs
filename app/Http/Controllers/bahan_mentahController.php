<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\barang_mentahModel;
use Illuminate\Http\Request;

class bahan_mentahController extends Controller
{
    public function index()
    {
        
             $bm = DB::table('tbl_m_barang_mentah')->get();
            return view('barang_mentah/barang_mentah',['bm' => $bm]);
        
    }
    public function tambah()
    {
        
            // $user = DB::table('tbl_m_user')->get();
            return view('barang_mentah/barang_mentah_tambah');
        
    }

    public function store(Request $request)
    {
        $createCustomer = barang_mentahModel::create([
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'supplier_id' => $request->supplier_id,
            'status' => 1,
            'satuan_terkecil' => $request->satuan_terkecil,
            'harga' => $request->harga,
            'hpp_acc_id'=>1,
            'persediaan_acc_id'=>1,
    	]);
 
        return redirect('barang_mentah/barang_mentah');
    }

    public function edit(Request $request,$id)
    {
        if (Session::get('login'))
        {
            $id=$request->id;
            //$anggota = anggota::find($id);
            $bm = DB::table('tbl_m_barang_mentah')->where('raw_id',$id)->first();
            return view('barang_mentah/barang_mentah_edit', ['bm' => $bm]);
        }
        else
        {
            return redirect('barang_mentah');
        }    
    }

    public function update(Request $request)
    {
        $id = $request->raw_id;
        print_r($id);
        DB::table('tbl_m_barang_mentah')-> where('raw_id', $id)-> update([
        //$anggota = anggota::find($id);
                'nama_barang' => $request->nama_barang,
                'keterangan' => $request->keterangan,
                'supplier_id' => $request->supplier_id,
                'status' => 1,
                'satuan_terkecil' => $request->satuan_terkecil,
                'harga' => $request->harga,
                'hpp_acc_id'=>1,
                'persediaan_acc_id'=>1,
        ]);
         return redirect('barang_mentah');
    }
}

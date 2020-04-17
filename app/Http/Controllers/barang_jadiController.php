<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\barang_jadiModel;
use Illuminate\Http\Request;

class barang_jadiController extends Controller
{
    public function index()
    {
        
            $bj = DB::table('tbl_m_barang_jadi')->get();
            return view('barang_jadi/barang_jadi',['bj' => $bj]);
        
    }
    public function tambah()
    {
        
            // $user = DB::table('tbl_m_user')->get();
            return view('barang_jadi/barang_jadi_tambah');
        
    }

    public function store(Request $request)
    {
        $createCustomer = barang_jadiModel::create([
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'status' => 'aktif',
            'satuan_terkecil' => $request->satuan_terkecil,
            'harga_jual' => $request->harga_jual,
    	]);
 
        return redirect('barang_jadi/barang_jadi_tambah');
    }

    public function edit(Request $request,$id)
    {
        if (Session::get('login'))
        {
            $id=$request->id;
            //$anggota = anggota::find($id);
            $bj = DB::table('tbl_m_barang_jadi')->where('jadi_id',$id)->first();
            return view('barang_jadi/barang_jadi_edit', ['bj' => $bj]);
        }
        else
        {
            return redirect('customer');
        }    
    }

    public function update(Request $request)
    {
        $id = $request->jadi_id;
        print_r($id);
        DB::table('tbl_m_barang_jadi')-> where('jadi_id', $id)-> update([
        //$anggota = anggota::find($id);
                'nama_barang' => $request->nama_barang,
                'keterangan' => $request->keterangan,
                'status' => 'aktif',
                'satuan_terkecil' => $request->satuan_terkecil,
                'harga_jual' => $request->harga_jual,
        ]);
         return redirect('barang_jadi');
    }
}

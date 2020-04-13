<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\karyawanModel;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    public function index()
    {
        
            $karyawan = DB::table('tbl_m_karyawan')->get();
            return view('karyawan/karyawan', ['karyawan' => $karyawan]);
            return redirect('karyawan');
        
    }

    public function karyawantambah()
    {
            return view('karyawan/karyawan_tambah');

    }

    public function store(Request $request)
    {
        $createAdmin = karyawanModel::create([
            'fullname' => $request->fullname,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'alamat' => $request->alamat,
            'bagian' => $request->bagian,
            'status' => '1',
            'join_date' => '2010-04-01',
    	]);
 
        return redirect('karyawan/tambah');
    }

    public function edit(Request $request,$id)
    {
        if (Session::get('login'))
        {
            $id=$request->id;
            //$anggota = anggota::find($id);
            $karyawan = DB::table('tbl_m_karyawan')->where('karyawan_id',$id)->first();
            return view('karyawan/karyawan_edit', ['karyawan' => $karyawan]);
        }
        else
        {
            return redirect('karyawan');
        }    
    }

    public function update(Request $request)
    {
        $id = $request->karyawan_id;
        print_r($id);
        DB::table('tbl_m_karyawan')-> where('karyawan_id', $id)-> update([
        //$anggota = anggota::find($id);
        'fullname' => $request->fullname,
        'no_hp' => $request->no_hp,
        'no_ktp' => $request->no_ktp,
        'alamat' => $request->alamat,
        'bagian' => $request->bagian,
        'status' => '1',
        'join_date' => '2010-04-01',
        ]);
         return redirect('karyawan');
    }
}

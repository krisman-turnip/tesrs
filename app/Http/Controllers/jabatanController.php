<?php

namespace App\Http\Controllers;
use App\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class jabatanController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        { 
            $jabatan = DB::table('jabatan')->paginate(10);
            return view('jabatan/jabatan', ['jabatan' => $jabatan]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function tambah()
    {
        if (Session::get('login'))
        {
            return view('jabatan/tambah_jabatan');
        }
        else
        {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
    	// $this->validate($request,[
        //     'id_jabatan' => 'required',
        //     'nama_jabatan' => 'required',
        //     'keterangan' => 'required'
    	// ]);
 
        jabatan::create([
            // 'id_jabatan' => $request->id_jabatan,
            'nama_jabatan' => $request->nama_jabatan,
            'komisi' => '0',
            'keterangan' => $request->keterangan
    	]);
 
        return redirect('jabatan');
    }

    public function delete($id)
    {
        jabatan::where('id_jabatan', $id)->delete();
        return redirect('jabatan');
    }

    public function edit($id)
    {
        if (Session::get('login'))
        {
        //$anggota = anggota::find($id);
            $jabatan = DB::table('jabatan')->where('id_jabatan',$id)->first();
            return view('jabatan/jabatan_edit', ['jabatan' => $jabatan]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function update($id, Request $request)
    {
        // $this->validate($request,[
        // 'id_parent' => 'required',
        // 'id_jabatan' => 'required',
        // 'nama' => 'required',
        // 'email' => 'required',
        // 'alamat' => 'required',
        // 'handphone' => 'required',
        // 'password' => 'required'
        // ]);
        DB::table('jabatan')-> where('id_jabatan', $request-> id)-> update([
        //$anggota = anggota::find($id);
        'nama_jabatan' => $request->nama_jabatan,
        'komisi' => '0',
        'keterangan' => $request->keterangan
        ]);
        return redirect('jabatan');
    }
}
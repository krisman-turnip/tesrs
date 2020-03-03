<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\komisi_template;
use App\komisi_template_trx;

class komisi_templateController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        { 
            $komisi = DB::table('komisi_template')->where('status','aktif')->paginate(10);
            return view('komisi_template/komisiTemplate', ['komisi' => $komisi]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function input()
    {
        if (Session::get('login'))
        {
            return view('komisi_template/komisiTemplate_tambah');
        }
        else
        {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        komisi_template::create([
            'nama_template' => $request->nama,
            'komisi_1' => $request->komisi1,
            'komisi_2' => $request->komisi2,
            'komisi_3' => $request->komisi3,
            'poin_1' => $request->poin1,
            'poin_2' => $request->poin2,
            'poin_3' => $request->poin3,
            'status' => '',
    	]);
 
        return redirect('komisiTemplate');
    }

    public function edit($id)
    {
        if (Session::get('login'))
        {
        //$anggota = anggota::find($id);
            $komisi = DB::table('komisi_template')->where('id_template_komisi',$id)->first();
            return view('komisi_template/komisiTemplate_edit', ['komisi' => $komisi]);
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
        DB::table('komisi_template')-> where('id_template_komisi', $id)-> update([
        //$anggota = anggota::find($id);
        'nama_template' => $request->nama,
        'komisi_1' => $request->komisi1,
        'komisi_2' => $request->komisi2,
        'komisi_3' => $request->komisi3,
        'poin_1' => $request->poin1,
        'poin_2' => $request->poin2,
        'poin_3' => $request->poin3,
        'status' => 'aktif',
        ]);
        return redirect('komisiTemplate');
    }

    public function delete($id)
    {
        DB::table('komisi_template')-> where('id_template_komisi', $id)-> update([
            'status' => 'tidak aktif',
            ]);
        return redirect('komisiTemplate');
    }

    public function skema()
    {
        if (Session::get('login'))
        {
            $jabatan = DB::table('jabatan')->get();
            $produk = DB::table('produk')->get();
            $skema = DB::table('komisi_template')->get();
            return view('komisi_template/komisiSkema', ['jabatan' => $jabatan ,'produk'=>$produk, 'skema'=>$skema]);
        }
        else
        {
            return redirect('/');
        }
       
    }

    public function storeskema(request $request)
    {
        if (Session::get('login'))
        {
            komisi_template_trx::create([
                //$anggota = anggota::find($id);
                'id_jabatan' => $request->jabatan,
                'id_produk' => $request->produk,
                'id_template_komisi' => $request->template,
                'keterangan' => $request->keterangan,
                'status' => 'aktif',
                ]);
                return redirect('tampilSkema');
        }
        else
        {
            return redirect('/');
        }
    }

    public function tampilSkema(request $request)
    {
        if (Session::get('login'))
        {
            $komisi = DB::table('komisi_template_trx as a')
                    ->select('a.id_komisi_template_trx','a.id_jabatan','a.id_produk','a.id_template_komisi','b.nama_jabatan as namaJabatan','c.nama_produk as namaProduk','d.nama_template as namaTemplate','a.keterangan')
                    ->join('jabatan as b','b.id_jabatan','=','a.id_jabatan')
                    ->join('produk as c','c.id_produk','=','a.id_produk')
                    ->join('komisi_template as d','d.id_template_komisi','=','a.id_template_komisi')
                    ->where('a.status','aktif')
                    ->paginate(10);
            return view('komisi_template/skema', ['komisi' => $komisi]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function deleteSkema($id)
    {
        DB::table('komisi_template_trx')-> where('id_komisi_template_trx', $id)-> update([
            'status' => 'tidak aktif',
            ]);
        return redirect('tampilSkema');
    }

    public function editskema($id)
    {
        if (Session::get('login'))
        {
        //$anggota = anggota::find($id);
        $jabatan = DB::table('jabatan')->get();
        $produk = DB::table('produk')->get();
        $skema = DB::table('komisi_template')->get();
        $komisi = DB::table('komisi_template_trx as a')
        ->select('a.id_komisi_template_trx','a.id_jabatan','a.id_produk','a.id_template_komisi','b.nama_jabatan as namaJabatan','c.nama_produk as namaProduk','d.nama_template as namaTemplate','a.keterangan')
        ->join('jabatan as b','b.id_jabatan','=','a.id_jabatan')
        ->join('produk as c','c.id_produk','=','a.id_produk')
        ->join('komisi_template as d','d.id_template_komisi','=','a.id_template_komisi')
        ->where('a.id_komisi_template_trx',$id)
        ->first();
            return view('komisi_template/skemaedit', ['komisi' => $komisi,'jabatan' => $jabatan ,'produk'=>$produk, 'skema'=>$skema]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function updateSkema($id, Request $request)
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
        DB::table('komisi_template_trx')-> where('id_komisi_template_trx', $id)-> update([
        //$anggota = anggota::find($id);
        'id_jabatan' => $request->jabatan,
        'id_produk' => $request->produk,
        'id_template_komisi' => $request->template,
        'keterangan' => $request->keterangan,
        'status' => 'aktif',
        ]);
        return redirect('tampilSkema');
    }
}

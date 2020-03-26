<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class materianggotaController extends Controller
{
    public function index(request $request)
    {
        if (Session::get('login'))
        {
            $id=$request->session()->get('login');
            $materi = DB::table('materi as a')
            ->select ('a.id_materi','a.nama_materi','a.keterangan','b.nama_produk')
            ->join('produk as b', 'b.id_produk', '=', 'a.id_produk')
            ->join('transaksi as c','c.id_produk','=', 'b.id_produk')
            ->where([['c.status','Diterima'],['c.id_anggota',$id],])
            ->distinct()
            ->paginate(20);
            $hl = DB::table('highlight as a')
            ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
            ->where('a.status','aktif')
            ->get();
            return view('member/materi/materi', ['materi' => $materi],['hl'=>$hl]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class produkanggotaController extends Controller
{
    public function index(Request $request)
    {
        if (Session::get('login'))
        {
            $produk = DB::table('produk as a')
                    ->select('a.id_produk','a.nama_produk','a.sisa','a.file_banner','c.tanggal_berangkat','c.tanggal_expired')
                    ->join('tanggal_produk as c','c.id_produk','=','a.id_produk')
                    ->where([['a.sisa','>','0'],['a.status','aktif'],])
                    ->paginate(100);
            $subproduk = DB::table('produk as a')
                    ->select('a.id_produk','a.nama_produk','a.sisa','a.file_banner','c.id_sub_produk','c.nama_produk as namaSubProduk','c.harga as HargaSub')
                    ->join('sub_produk as c','c.id_produk','=','a.id_produk')
                    ->where('a.sisa','>','0')
                    ->paginate(100);
            //echo $request->session()->get('login');
            return view('member/produk/produk', ['produk' => $produk],['subproduk'=>$subproduk],);
        } 
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function input(Request $request, $id)
    {
        if (Session::get('login'))
        {
            $produk = DB::table('produk as a')
            ->select('a.id_produk','a.nama_produk','a.sisa','a.file_banner','c.tanggal_berangkat','c.tanggal_expired')
            ->join('tanggal_produk as c','c.id_produk','=','a.id_produk')
            ->where('a.sisa','>','0')
            ->where('a.id_produk',$id)
            ->paginate(100);
            $subproduk = DB::table('produk as a')
            ->select('a.id_produk','a.nama_produk','a.sisa','a.file_banner','c.id_sub_produk','c.nama_produk as namaSubProduk','c.harga as HargaSub')
            ->join('sub_produk as c','c.id_produk','=','a.id_produk')
            ->where('a.sisa','>','0')
            ->where('a.id_produk',$id)
            ->paginate(100);
            $tanggal= DB::table('tanggal_produk as a')
            ->select('a.id_produk','a.tanggal_berangkat')
            ->where('a.id_produk',$id)
            ->get();
            //echo $request->session()->get('login');
            return view('member/produk/produkinput', ['produk' => $produk,'subproduk'=>$subproduk,'tanggal'=>$tanggal],);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }
    
}

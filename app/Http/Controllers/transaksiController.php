<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'jumlah' => 'required|numeric',
            
        ]);
        $id=$id;
      
        $jumlah=$request->jumlah;
        echo $jumlah;
        if (Session::get('login'))
        {
        transaksi::create([
            'id_produk' => $id,
            'id_anggota' => $request->session()->get('login'),
            'status' => 'Pengajuan',
            'komisi' => '0',
            'jumlah' => $jumlah,
    	]);
 
        return redirect('produkanggota/pengajuan');
        }
    }

    public function pengajuan(Request $request)
    {
        if (Session::get('login'))
        {
            $idproduk=$request->session()->get('login');
            $produk = DB::table('transaksi as a')
                    ->select('b.nama_produk','a.id_transaksi','a.jumlah','b.sisa','a.created_at')
                    ->join('produk as b','b.id_produk','=','a.id_produk')
                    ->where([['a.id_anggota',$idproduk],['a.status','Pengajuan'],])->paginate(10);
            return view('member/produk/pengajuan_produk', ['produk' => $produk]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function diterima(Request $request)
    {
        if (Session::get('login'))
        {
            $idproduk=$request->session()->get('login');
            $produk = DB::table('transaksi as a')
                    ->select('b.nama_produk','a.id_transaksi','a.komisi','b.sisa','a.created_at')
                    ->join('produk as b','b.id_produk','=','a.id_produk')
                    ->where([['a.id_anggota',$idproduk],['a.status','diterima'],])->paginate(10);
            return view('member/produk/produk_diterima', ['produk' => $produk]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function ditolak(Request $request)
    {
        if (Session::get('login'))
        {
            $idproduk=$request->session()->get('login');
            $produk = DB::table('transaksi as a')
                    ->select('b.nama_produk','a.id_transaksi','a.komisi','b.sisa')
                    ->join('produk as b','b.id_produk','=','a.id_produk')
                    ->where([['a.id_anggota',$idproduk],['a.status','ditolak'],])->paginate(10);
            return view('member/produk/produktolak', ['produk' => $produk]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function delete($id)
    {
        if (Session::get('login'))
        {
            DB::table('transaksi')->where('id_transaksi', $id)-> update([
                'status' => 'Batal'
            ]);
            return redirect('produkanggota/pengajuan');
            // DB::table('transaksi')-> where([['id_produk', $produk],['id_anggota',$anggota],])-> update([
            //     //$anggota = anggota::find($id);
            //     //'id_produk' => $request->id_produk,
            //     'status' => 'Ditolak'
            //     ]);
        }
    }
}

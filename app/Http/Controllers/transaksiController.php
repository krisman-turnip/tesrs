<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\transaksi;
use App\transaksi_detail;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function store(Request $request, $id)
    {
        try{
       
            $id=$id;
            $jmlh='1';
            // $jumlah=$request->jumlah_customer;
            $sum = 0;
    // foreach ($jumlah as $item => $a) {
    //     $sum += $jumlah[$item];
    // }
    // print_r($sum);
            $id_sub_produk=$request->id_sub;
            $nama_cus = $request->nama_customer;
            // $jumlah_customer = $request->jumlah_customer;
            $ktp_customer = $request->ktp_customer;
            $tanggal_berangkat = $request->tanggal;
            print_r($id_sub_produk);
            if (Session::get('login'))
            {
                
            $a = transaksi::create([
                'id_produk' => $id,
                'id_anggota' => $request->session()->get('login'),
                'status' => 'Pengajuan',
                'komisi' => '0',
                'jumlah' => $sum,
                'tanggal_berangkat' => $tanggal_berangkat
            ]);
            // 
            
            
            $lastId = $a->id;
            $index = 0;
            foreach($nama_cus as $nama_s => $c)
                {
                    print_r($id_sub_produk[$nama_s]);
                    print_r($nama_cus[$nama_s]);
            transaksi_detail::create([
                'id_produk' => $id,
                'id_sub_produk' => $id_sub_produk[$nama_s],
                'id_anggota' => $request->session()->get('login'),
                'nama_customer' => $nama_cus[$nama_s],
                'ktp_customer' => $ktp_customer[$nama_s],
                'id_transaksi' => $lastId,
                'tanggal_berangkat' => $tanggal_berangkat,
                'status' => 'pengajuan',
                'jumlah' =>$jmlh,
                'admin' =>'',
                ]);
            
                }$index++;
                
            return redirect('produkanggota/pengajuan');
            }
            return redirect('produkanggota/pengajuan');
        } 
        catch (Exception $e) {
            // return $e->getMessage();
            echo 'data yang kamu masukkan salah';
        }
    }
    
    public function pengajuan(Request $request)
    {
        try{
            if (Session::get('login'))
            {
                $idproduk=$request->session()->get('login');
                // $produk = DB::table('transaksi as a')
                //         ->select('b.nama_produk','a.id_transaksi','c.jumlah','c.nama_customer','c.ktp_customer','b.sisa','a.created_at','a.tanggal_berangkat')
                //         ->join('produk as b','b.id_produk','=','a.id_produk')
                //         ->join('transaksi_detail as c','c.id_transaksi','=','a.id_transaksi')

                $produk = DB::table('transaksi_detail as a')
                        ->select('a.id_transaksi_detail','a.nama_customer','a.ktp_customer','b.nama_produk','b.sisa','a.jumlah','a.created_at','a.tanggal_berangkat')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->where([['a.id_anggota',$idproduk],['a.status','Pengajuan'],])->paginate(20);
                $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                return view('member/produk/pengajuan_produk', ['produk' => $produk],['hl'=>$hl]);
            }
            else
            {
                return redirect('/loginanggota');
            }
        } 
        catch (\Exception $e) {
            // return $e->getMessage();
            echo 'data yang kamu masukkan salah';
        }
    }

    public function pengajuanCari(Request $request)
    {
        try{
            if (Session::get('login'))
            {
                $cari = $request->cari;
                $select = $request->select;
                if($select=='ktp_customer' || $select =='nama_customer')
                {
                $idproduk=$request->session()->get('login');
                $produk = DB::table('transaksi_detail as a')
                        ->select('a.id_transaksi_detail','a.nama_customer','a.ktp_customer','b.nama_produk','b.sisa','a.jumlah','a.created_at','a.tanggal_berangkat')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->where([['a.id_anggota',$idproduk],['a.status','Pengajuan'],["a.$select",'like',"%".$cari."%"]])->paginate(20);
                $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                
                }
                else
                {
                $idproduk=$request->session()->get('login');
                $produk = DB::table('transaksi_detail as a')
                        ->select('a.id_transaksi_detail','a.nama_customer','a.ktp_customer','b.nama_produk','b.sisa','a.jumlah','a.created_at','a.tanggal_berangkat')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->where([['a.id_anggota',$idproduk],['a.status','Pengajuan'],["b.$select",'like',"%".$cari."%"]])->paginate(20);
                        $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                }
                return view('member/produk/pengajuan_produk', ['produk' => $produk],['hl'=>$hl]);
            }
            else
            {
                return redirect('/loginanggota');
            }
        } 
        catch (\Exception $e) {
            // return $e->getMessage();
            echo 'data yang kamu masukkan salah';
        }
    }

    public function diterima(Request $request)
    {
        try {
            if (Session::get('login'))
            {
                $idproduk=$request->session()->get('login');
            
                // $produk = DB::table('transaksi as a')
                //         ->select('b.nama_produk','a.id_transaksi','b.sisa','c.nama_customer','c.ktp_customer','a.created_at','d.komisi','d.poin')
                //         ->join('produk as b','b.id_produk','=','a.id_produk')
                //         ->join('transaksi_detail as c','c.id_transaksi','=','a.id_transaksi')
                //         ->join('transaksi_produk as d','d.id_transaksi_detail','=','c.id_transaksi_detail')

                $produk = DB::table('transaksi_detail as a')
                        ->select('c.komisi','c.poin','a.created_at','b.nama_produk','a.nama_customer','a.ktp_customer')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->join('transaksi_produk as c','c.id_transaksi_detail','=','a.id_transaksi_detail')
                        ->where([['a.id_anggota',$idproduk],['c.id_anggota',$idproduk],['a.status','diterima'],])
                        ->orwhere([['a.id_anggota',$idproduk],['c.id_anggota',$idproduk],['a.status','expired'],])
                        ->paginate(10);
                $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                        return view('member/produk/produk_diterima', ['produk' => $produk],['hl'=>$hl]);
            }
            else
            {
                return redirect('/loginanggota');
            }
        } 
        catch (\Exception $e) {
            echo 'data yang kamu masukkan salah';
        }
    }

    public function diterimaCari(Request $request)
    {
        try{
            if (Session::get('login'))
            {
                $idproduk=$request->session()->get('login');
                $cari = $request->cari;
                $select = $request->select;
                if($select=='ktp_customer' || $select =='nama_customer')
                {
                    $produk = DB::table('transaksi_detail as a')
                        ->select('c.komisi','c.poin','a.created_at','b.nama_produk','a.nama_customer','a.ktp_customer')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->join('transaksi_produk as c','c.id_transaksi_detail','=','a.id_transaksi_detail')
                        ->where([['a.id_anggota',$idproduk],['c.id_anggota',$idproduk],['a.status','diterima'],["a.$select",'like',"%".$cari."%"]])
                        ->orwhere([['a.id_anggota',$idproduk],['c.id_anggota',$idproduk],['a.status','expired'],["a.$select",'like',"%".$cari."%"]])
                        ->paginate(10);

                    $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                }
                else
                {
                    $produk = DB::table('transaksi_detail as a')
                        ->select('c.komisi','c.poin','a.created_at','b.nama_produk','a.nama_customer','a.ktp_customer')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->join('transaksi_produk as c','c.id_transaksi_detail','=','a.id_transaksi_detail')
                        ->where([['a.id_anggota',$idproduk],['c.id_anggota',$idproduk],['a.status','diterima'],["b.$select",'like',"%".$cari."%"]])
                        ->orwhere([['a.id_anggota',$idproduk],['c.id_anggota',$idproduk],['a.status','expired'],["a.$select",'like',"%".$cari."%"]])
                        ->paginate(10);

                    $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                }
                return view('member/produk/produk_diterima', ['produk' => $produk],['hl'=>$hl]);
            }
            else
            {
                return redirect('/loginanggota');
            }
        } 
        catch (\Exception $e) {
            echo 'data yang kamu masukkan salah';
        }
    }

    public function ditolak(Request $request)
    {
        try{
            if (Session::get('login'))
            {
                $idproduk=$request->session()->get('login');
                // $produk = DB::table('transaksi as a')
                // ->select('b.nama_produk','a.id_transaksi','b.sisa','c.nama_customer','c.ktp_customer','a.created_at','d.komisi','d.poin')
                // ->join('produk as b','b.id_produk','=','a.id_produk')
                // ->join('transaksi_detail as c','c.id_transaksi','=','a.id_transaksi')
                // ->join('transaksi_produk as d','d.id_transaksi_detail','=','c.id_transaksi_detail')
                // ->where([['d.id_anggota',$idproduk],['c.status','diterima'],])->paginate(10);
                $produk= DB::table('transaksi_detail as a')
                        ->select('b.nama_produk','a.nama_customer','a.ktp_customer','b.created_at')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->where([['a.id_anggota',$idproduk],['a.status','ditolak'],])->paginate(10);
                $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();
                return view('member/produk/produktolak', ['produk' => $produk],['hl'=>$hl]);
            }
            else
            {
                return redirect('/loginanggota');
            }
        } 
        catch (\Exception $e) {
            echo 'data yang kamu masukkan salah';
        }
    }

    public function ditolakCari(Request $request)
    {
        try {
            if (Session::get('login'))
            {
                $idproduk=$request->session()->get('login');
                $cari = $request->cari;
                $select = $request->select;
                if($select=='ktp_customer' || $select =='nama_customer')
                {
                    $produk= DB::table('transaksi_detail as a')
                        ->select('b.nama_produk','a.nama_customer','a.ktp_customer','b.created_at')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->where([['a.id_anggota',$idproduk],['a.status','ditolak'],["a.$select",'like',"%".$cari."%"]])->paginate(10);
                    
                    $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get();  
                }
                else
                {
                    $produk= DB::table('transaksi_detail as a')
                        ->select('b.nama_produk','a.nama_customer','a.ktp_customer','b.created_at')
                        ->join('produk as b','b.id_produk','=','a.id_produk')
                        ->where([['a.id_anggota',$idproduk],['a.status','ditolak'],["b.$select",'like',"%".$cari."%"]])->paginate(10);
                    
                    $hl = DB::table('highlight as a')
                        ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
                        ->where('a.status','aktif')
                        ->get(); 
                }
                return view('member/produk/produktolak', ['produk' => $produk],['hl'=>$hl]);
            }
            else
            {
                return redirect('/loginanggota');
            }
        }
        catch (\Exception $e) {
            echo 'data yang kamu masukkan salah';
        }
    }

    public function delete($id)
    {
        if (Session::get('login'))
        {
            DB::table('transaksi_detail')->where('id_transaksi_detail', $id)-> update([
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

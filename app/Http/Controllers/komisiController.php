<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\anggota;
use App\komisi;
use App\request_komisi;
use App\Exports\SuksesKomisiExport;
use App\Exports\BatalKomisiExport;
use App\Exports\PendingKomisiExport;
use App\Exports\SuspendKomisiExport;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class komisiController extends Controller
{
    public function index(Request $request) 
    {
        if (Session::get('login'))
        {
            $anggota = DB::table('anggota as a')
            ->select('a.id_anggota','a.nama','a.email','a.no_handphone','b.nama_jabatan','a.saldo')
            ->rightjoin('jabatan as b', 'b.id_jabatan', '=', 'a.id_jabatan')
            ->where('a.status','aktif')
            ->paginate(10);
            return view('komisi/komisi', ['anggota' => $anggota]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function pembayaran($id)
    {
        if (Session::get('login'))
        {
            $anggota = DB::table('anggota as a')
                    ->select('a.id_anggota','a.nama','a.email','a.no_handphone','a.saldo','b.jumlah_request')
                    ->join('request_komisi as b','b.id_anggota','=','a.id_anggota')
                    ->where('a.id_anggota',$id)->first();
                    return view('komisi/pembayaran_komisi', ['anggota' => $anggota]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function bayar($id,request $request)
    { 
        if (Session::get('login'))
        { 
            $this->validate($request,[
                'pembayaran' => 'required|numeric',
                'bukti_transfer'=> 'required'
            ]);
            $ids = $request->session()->get('login'); 
            $admin = DB::table('users')->where('id',$ids)->first();
            $namaadmin = $admin->name;
            $a = $request->saldo;
            $b = $request->pembayaran;
            $id_anggota = $request->id_anggota;
            $selisih = (int)$a-(int)$b;
            if((int)$a != 0)
            { 
                if((int)$a >= (int)$b)
                {
                    $file = $request->file('bukti_transfer');
                
                    $nama_file = $file->getClientOriginalName();
                    $gambar = komisi::where('bukti_transfer',$nama_file)->count();
                    //$a = $gambar->nama_materi;
                    if ($gambar==0)
                    {     
                        DB::table('anggota')-> where('id_anggota', $id)-> update([
                            'saldo' => $selisih,
                        ]);

                        DB::table('request_komisi')-> where('id_anggota', $id)-> update([
                            'status' => 'sudah dibayar',
                        ]);
                        
                    // $bukti = DB::table('komisi')
                    // ->orderBy('id_komisi','desc')
                    // ->first();
                    // $a = $bukti->id_komisi;
                          
                            // isi dengan nama folder tempat kemana file diupload
                            $tujuan_upload = 'data_transfer';
                            $file->move($tujuan_upload,$nama_file);
                        
                        
                            komisi::create([
                                'id_anggota' =>$request->id_anggota,
                                'bukti_transfer' => $nama_file,
                                'komisi' => $b,
                                'approval' => $namaadmin,
                            ]);
                        
                            return redirect('transaksiKomisi');
                        }
                        else
                        {
                            //Alert::message('Message', 'Optional Title');
                            //return view ('');
                            return redirect()->back()->with('alert','Nama materi sudah ada');
                        }
                    return redirect()->back();
                }
                else
                {
                    return redirect()->back();
                }
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function transaksiKomisi(request $request)
    { 
        if (Session::get('login'))
        {
            $komisi = DB::table('komisi as a')
                    ->select('a.id_komisi','a.id_anggota','a.komisi','a.created_at','b.nama','a.approval')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->paginate(10);
            return view('komisi/tampilKomisi', ['komisi' => $komisi]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function download($id)
    {
        // $pdf = DB::table('materi')->where('id_materi',$id)->first();
        // return response()->download($pdf);
        $book_cover = komisi::where('id_komisi', $id)->first();
        $path = public_path(). '/data_transfer/'. $book_cover->bukti_transfer;
        return response()->download($path, $book_cover
                 ->original_filename, ['Content-Type' => $book_cover->mime]); 
    }

    public function komisianggota(request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $komisi = DB::table('transaksi_produk as a')
                    ->select('a.komisi','a.poin','b.nama_produk','c.nama_customer','c.ktp_customer','a.id_anggota','a.jumlah','a.created_at')
                    ->join('produk as b','b.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as c','c.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['a.id_anggota',$ids],['a.status','sudah diproses']])
                    ->paginate(20);
            return view('member/komisi/komisi', ['komisi' => $komisi]);
        }
    }

    public function komisiCari(request $request)
    {
        if (Session::get('login'))
        {
            $cari = $request->cari;
            $select = $request->select;
            if($select=='nama' || $select =='id_anggota'||$select=='no_handphone')
            {
                $anggota = DB::table('anggota as a')
                ->select('a.id_anggota','a.nama','a.email','a.no_handphone','b.nama_jabatan','a.saldo')
                ->rightjoin('jabatan as b', 'b.id_jabatan', '=', 'a.id_jabatan')
                ->where('a.status','aktif')
                ->where("a.$select",'like',"%".$cari."%")
                ->paginate(10);
                
            }
            else
            {
                $anggota = DB::table('anggota as a')
                ->select('a.id_anggota','a.nama','a.email','a.no_handphone','b.nama_jabatan','a.saldo')
                ->rightjoin('jabatan as b', 'b.id_jabatan', '=', 'a.id_jabatan')
                ->where('a.status','aktif')
                ->where("b.$select",'like',"%".$cari."%")
                ->paginate(10);
            }
            return view('komisi/komisi', ['anggota' => $anggota]);
        }
    }

    public function requestkomisi(request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $anggota = DB::table('anggota')->where('id_anggota',$ids)->first();
            return view ('member/komisi/requestkomisi',['anggota'=>$anggota]);
        }
        else
        {
            return view('/loginanggota');
        }
    }
    public function trrequestkomisi(request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $anggota = DB::table('anggota')->where('id_anggota',$ids)->first();
            $komisi = DB::table('request_komisi')->where('id_anggota',$ids)->first();
          
            request_komisi::create([
                'id_anggota' => $ids,
                'jumlah_request' => $request->requestkomisi,
                'status' => 'belum dibayar'
            ]);

            return redirect('/lihatrequestkomisi');
            
        }
    }

    public function lihatrequestkomisi(request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $komisi = DB::table('request_komisi as a')
                    ->select('a.jumlah_request','a.status','b.saldo','a.created_at','a.id_anggota')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->where('a.id_anggota',$ids)
                    ->paginate();
    
            return view('member/komisi/lihatrequestkomisi',['komisi'=>$komisi]);
        }
        else
        {
            return view('/loginanggota');
        }
    }

    public function editrequestkomisi(request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $anggota = DB::table('request_komisi as a')
                    ->select('a.jumlah_request','a.status','b.saldo','a.created_at','a.id_anggota','b.nama','a.id_requestkomisi')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->where('a.id_anggota',$ids)
                    ->first();
            return view ('member/komisi/editrequestkomisi',['anggota'=>$anggota]);
        }
        else
        {
            return view('/loginanggota');
        }
    }

    public function updaterequestkomisi($id, request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $anggota = DB::table('anggota')->where('id_anggota',$ids)->first();
            
            DB::table('request_komisi')-> where('id_requestkomisi', $id)-> update([
                //$anggota = anggota::find($id);
                'jumlah_request' => $request->requestkomisi
                ]);
            return redirect('/lihatrequestkomisi');
        }
    }
    public function pending( request $request)
    {
        if (Session::get('login'))
        {
            $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','e.nama_customer','a.created_at','a.admin','b.nama','c.nama_jabatan','a.tanggal_berangkat','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','aktif'],['a.status','belum diproses']])->paginate(50);
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_pending',['komisi'=>$komisi]);
    }

    public function pendingCari( request $request)
    {
        if (Session::get('login'))
        {
            $a='b';
            $b='c';
            $cari = $request->cari;
            $select = $request->select;
            if($select=='nama' || $select =='id_anggota'||$select=='no_handphone')
            {
                $komisi = DB::table('transaksi_produk as a')
                        ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','b.nama','c.nama_jabatan','a.tanggal_berangkat','d.nama_produk')
                        ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                        ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                        ->join('produk as d','d.id_produk','=','a.id_produk')
                        ->where([['b.status','aktif'],['a.status','belum diproses'],["b.$select",'like',"%".$cari."%"]])->paginate(50);
            }
            else
            {
                $komisi = DB::table('transaksi_produk as a')
                        ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','b.nama','c.nama_jabatan','a.tanggal_berangkat','d.nama_produk')
                        ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                        ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                        ->join('produk as d','d.id_produk','=','a.id_produk')
                        ->where([['b.status','aktif'],['a.status','belum diproses'],["c.$select",'like',"%".$cari."%"]])->paginate(50);
            }
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_pending',['komisi'=>$komisi]);
    }

    public function pendingBatal($id, request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login');
            $tgl=date('Y-m-d');
            $admin = DB::table('users')->where('id',$ids)->first();
            $namaAdmin=$admin->name;     
            $komisi = DB::table('transaksi_produk')->where('id_transaksi_produk',$id)->update([
                'status' => 'dibatalkan',
                'admin'  => $namaAdmin,
                'tanggal_komisi' => $tgl,
            ]);
        }
        else
        {
            return view('/loginanggota');
        }
        return redirect()->back();
    }

    public function batalCari(request $request)
    {
        if (Session::get('login'))
        {
            $a='b';
            $b='c';
            $cari = $request->cari;
            $select = $request->select;
            if($select=='nama' || $select =='id_anggota'||$select=='no_handphone')
            {
                $komisi = DB::table('transaksi_produk as a')
                ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                ->join('produk as d','d.id_produk','=','a.id_produk')
                ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                ->where([['b.status','aktif'],['a.status','dibatalkan'],["b.$select",'like',"%".$cari."%"]])->paginate(50);
            }
            else
            {
                $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','aktif'],['a.status','dibatalkan'],["c.$select",'like',"%".$cari."%"]])->paginate(50);
            }
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_batal',['komisi'=>$komisi]);
    }

    public function suksesCari(request $request)
    {
        if (Session::get('login'))
        {
            $a='b';
            $b='c';
            $cari = $request->cari;
            $select = $request->select;
            if($select=='nama' || $select =='id_anggota'||$select=='no_handphone')
            {
                $komisi = DB::table('transaksi_produk as a')
                ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                ->join('produk as d','d.id_produk','=','a.id_produk')
                ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                ->where([['b.status','aktif'],['a.status','sudah diproses'],["b.$select",'like',"%".$cari."%"]])->paginate(50);
            }
            else
            {
                $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','aktif'],['a.status','sudah diproses'],["c.$select",'like',"%".$cari."%"]])->paginate(50);
            }
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_sukses',['komisi'=>$komisi]);
    }

    public function batal(request $request)
    {
        if (Session::get('login'))
        {
            $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','aktif'],['a.status','dibatalkan']])->paginate(50);
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_batal',['komisi'=>$komisi]);
    }

    public function sukses(request $request)
    {
        if (Session::get('login'))
        {
            $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','b.nama','c.nama_jabatan','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','aktif'],['a.status','sudah diproses']])->paginate(50);
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_sukses',['komisi'=>$komisi]);
    }

    public function suspend(request $request)
    {
        if (Session::get('login'))
        {
            $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','e.nama_customer','e.ktp_customer','a.admin','b.nama','c.nama_jabatan','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','suspend'],['a.status','suspend']])->paginate(50);
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_suspend',['komisi'=>$komisi]);
    }

    public function suspendCari(request $request)
    {
        if (Session::get('login'))
        {
            $a='b';
            $b='c';
            $cari = $request->cari;
            $select = $request->select;
            if($select=='nama' || $select =='id_anggota'||$select=='no_handphone')
            {
                $komisi = DB::table('transaksi_produk as a')
                ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','e.nama_customer','e.ktp_customer','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                ->join('produk as d','d.id_produk','=','a.id_produk')
                ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                ->where([['b.status','suspend'],['a.status','suspend'],["b.$select",'like',"%".$cari."%"]])->paginate(50);
            }
            else
            {
                $komisi = DB::table('transaksi_produk as a')
                    ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','e.nama_customer','e.ktp_customer','a.tanggal_komisi','b.nama','c.nama_jabatan','d.nama_produk')
                    ->join('anggota as b','b.id_anggota','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->join('produk as d','d.id_produk','=','a.id_produk')
                    ->join('transaksi_detail as e','e.id_transaksi_detail','=','a.id_transaksi_detail')
                    ->where([['b.status','suspend'],['a.status','suspend'],["c.$select",'like',"%".$cari."%"]])->paginate(50);
            }
        }
        else
        {
            return view('/loginanggota');
        }
        return view ('komisi/komisi_suspend',['komisi'=>$komisi]);
    }
//rthyareggta
    public function exportSukses(request $request)
	{
        $nama=$request->nama;
        $nama_jabatan=$request->nama_jabatan;
        $nama_file = 'Komisi_sukses_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new SuksesKomisiExport($nama, $nama_jabatan), $nama_file);
        // $nama = $request->nama;
        // $nama_jabatan = $request->nama_jabatan;

        // $komisi = DB::table('transaksi_produk as a')
        //     ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','b.nama','c.nama_jabatan','d.nama_produk')
        //     ->join('anggota as b','b.id_anggota','=','a.id_anggota')
        //     ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
        //     ->join('produk as d','d.id_produk','=','a.id_produk')
        //     ->where([['b.status','aktif'],['a.status','sudah diproses'],])
        //     ->whereBetween('a.created_at',[ $nama, $nama_jabatan])
        //     ->get();
        // print_r($komisi);
        // print_r($nama_jabatan);
    }
    
    public function exportBatal(request $request)
	{
        $nama=$request->nama;
        $nama_jabatan=$request->nama_jabatan;
        $nama_file = 'Komisi_batal_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new BatalKomisiExport($nama, $nama_jabatan), $nama_file);
    }

    public function exportPending(request $request)
	{
        $nama=$request->nama;
        $nama_jabatan=$request->nama_jabatan;
        $nama_file = 'Komisi_pending_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new pendingKomisiExport($nama, $nama_jabatan), $nama_file);
    }

    public function exportSuspend(request $request)
	{
        $nama=$request->nama;
        $nama_jabatan=$request->nama_jabatan;
        $nama_file = 'Komisi_suspend_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new SuspendKomisiExport($nama, $nama_jabatan), $nama_file);
    }
}

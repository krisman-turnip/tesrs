<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\anggota;
use App\komisi;
use App\request_komisi;
use Illuminate\Support\Facades\Session;

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
            $komisi = DB::table('transaksi_produk')->where('id_anggota',$ids)->paginate(10);
            return view('member/komisi/komisi', ['komisi' => $komisi]);
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
            $a = $komisi->status;
            if($a == 'belum dibayar')
            {
                return redirect('/lihatrequestkomisi');
            }
            else{
            request_komisi::create([
                'id_anggota' => $ids,
                'jumlah_request' => $request->requestkomisi,
                'status' => 'belum dibayar'
            ]);

            return redirect('/lihatrequestkomisi');
            }
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
}

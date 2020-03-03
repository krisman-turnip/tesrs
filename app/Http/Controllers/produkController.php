<?php

namespace App\Http\Controllers;
use App\produk;
use App\transaksi;
use App\materi;
use App\sub_produk;
use App\tanggal_produk;
use App\transaksi_produk;
use App\komisi_template;
use App\komisi_transaksi;
use App\komisi_template_trx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class produkController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        {
            // $produks = DB::table('produk as a')
            // ->select('b.tanggal_expired')
            // ->join('tanggal_produk as b','a.id_produk','=','b.id_produk')
            // ->where('a.status','aktif')
            // ->orderby('b.tanggal_expired','ASC')
            // ->get();
            // // $komisidate=date('Y-m-d', strtotime($komisi->created_at));
            // $indexs = 1;
            // foreach($produks as $namass => $qas)
            // {
            //     $produka[] = DB::table('produk')->get();
            //     $produkdate=date('Y-m-d', strtotime($qas->tanggal_expired));
            //     print_r($produkdate);
            //     $tgl=date('Y-m-d');
            //     if($produkdate<$tgl)
            //     {
            //         $index = 1;
            //         foreach($produka as $nama_s => $q)
            //         {
            //             $a = DB::table('produk as a')
            //                 ->join('tanggal_produk as b','a.id_produk','=','b.id_produk')
            //                 ->where('b.tanggal_expired',$produkdate)
            //                 ->update([
            //                 'status' => 'tidak aktif'
            //             ]);
            //             $index++;
            //             print_r($a);
            //         }
            //     }
            //     else{
            //         $index = 1;
            //         foreach($produka as $nama_s => $q)
            //         {
            //         $a = DB::table('produk as a')
            //                 ->join('tanggal_produk as b','a.id_produk','=','b.id_produk')
            //                 ->where('b.tanggal_expired',$produkdate)
            //                 ->update([
            //                 'status' => 'aktif'
            //             ]);
            //             $index++;
            //             print_r($a);
            //                 }
            //     }
            //     $indexs++;
            // }
            $produk = DB::table('produk')->where('status','aktif')->paginate(12);
             return view('produk/produk', ['produk' => $produk]);
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
            return view('produk/tambah_produk');
        }
        else
        {
            return redirect('/');
        }
    }

    public function detail(Request $request,$id)
	{
        if (Session::get('login'))
        {
            $id = $id;
    		// mengambil data dari table pegawai sesuai pencarian data
            $produk = DB::table('produk')
            ->select('id_produk','nama_produk','sisa','file_banner','terjual')
            ->where([['status','aktif'],['id_produk',$id]])
            ->paginate(100);
            $subproduk = DB::table('produk as a')
            ->select('a.id_produk','c.id_sub_produk','c.nama_produk as namaSubProduk','c.harga as HargaSub')
            ->join('sub_produk as c','c.id_produk','=','a.id_produk')
            ->where([['a.status','aktif'],['a.id_produk',$id]])
            ->paginate(100);
            $tanggal= DB::table('tanggal_produk as a')
            ->select('a.id_produk','a.tanggal_berangkat','a.tanggal_expired')
            ->where('a.id_produk',$id)
            ->get();
            return view('produk/produk_detail', ['produk' => $produk,'subproduk'=>$subproduk,'tanggal'=>$tanggal]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $select = $request->select;
 
    		// mengambil data dari table pegawai sesuai pencarian data
            $produk = DB::table('produk')->where([['status','aktif'],[$select,'like',"%".$cari."%"]])->paginate(12);
            return view('produk/produk', ['produk' => $produk]);
 
    }
    
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama_produk' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
    	]);
 
        $filew = $request->file('nama_banner');
   
        $nama_files = $filew->getClientOriginalName();
     
        //$a = $gambar->nama_materi;
                   
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_banner';
        $filew->move($tujuan_upload,$nama_files);
    
    
        $a = produk::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'sisa' => $request->jumlah,
            'terjual' => '0',
            'harga' => $request->harga,
            'file_banner' => $nama_files,
            'keterangan' => 'kamar',
            'status' =>'aktif'
        ]);
    
  

        //dd($a->id);
        $lastId = $a->id;
        $nama_sub = $request->nama_sub;
         $keterangan_sub = $request->keterangan_sub;
        $harga_sub = $request->harga_sub;
        $index = 1;
        foreach($nama_sub as $nama_s => $q)
        {
            $a = sub_produk::create([
                'id_produk' => $lastId,
                'nama_produk' => $q,
                'harga' => $harga_sub[$nama_s],
                'keterangan' => $keterangan_sub[$nama_s]
            ]);
            $index++;
        }

        $tanggalBerangkat = $request->tanggal_berangkat;
        $tanggalExpired = $request->tanggal_expired;
        $indexa = 1;
        foreach($tanggalBerangkat as $tanggal_s => $q)
        {
        tanggal_produk::create([
            'id_produk' =>$lastId, 
            'tanggal_berangkat' => $tanggalBerangkat[$tanggal_s],
            'tanggal_expired' => $tanggalExpired[$tanggal_s],
        ]);
        $index++;
        }

        // $produk = DB::table('produk')
        //         ->orderBy('id_produk','desc')
        //         ->first();
        // $a = $produk->id_produk;
        $file = $request->file('nama_materi');
        if ($file !=0)
        {
            $nama_file = $file->getClientOriginalName();
            $gambar = materi::where('nama_materi',$nama_file)->count();
            //$a = $gambar->nama_materi;
            if ($gambar==0)
            {            
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$nama_file);
     
                materi::create([
                    'id_produk' =>$lastId, 
                    'nama_materi' => $nama_file,
                    'keterangan' => $request->keterangan,
                ]); 
            
                return redirect('produk');
            }
            else
            {
                //Alert::message('Message', 'Optional Title');
                //return view ('');
                return redirect()->back()->with('alert','Nama materi sudah ada');
            }
        }
       
        return redirect('produk');
    }

    public function delete($id)
    {
        produk::where('id_produk', $id)->update([
            'status'=> 'tidak aktif',
        ]);
        return redirect('produk');
    }

    public function edit($id)
    {
        if (Session::get('login'))
        { 
            //$anggota = anggota::find($id);
            $produk = DB::table('produk')->where('id_produk',$id)->first();
            $materi = DB::table('materi')->where('id_produk',$id)->get();

            return view('produk/produk_edit', ['produk' => $produk],['materi'=>$materi]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function update($id, Request $request)
    {
        DB::table('produk')-> where('id_produk', $request-> id)-> update([
        //$anggota = anggota::find($id);
        //'id_produk' => $request->id_produk,
        'nama_produk' => $request->nama_produk,
        'jumlah' => $request->jumlah,
        'sisa' => $request->sisa,
        'terjual' => $request->terjual,
        'harga' => $request->harga
        ]);
        return redirect('produk');
    }

    public function tampil()
    {
        if (Session::get('login'))
        { 
            $produk = DB::table('transaksi as a')
                    ->select('b.id_produk','b.nama_produk','c.nama','c.id_anggota','a.created_at','b.sisa as sisa','a.jumlah','a.id_transaksi')
                    ->join('produk as b','b.id_produk','=','a.id_produk')
                    ->join('anggota as c','c.id_anggota','=','a.id_anggota')
                    ->where('a.status','pengajuan')->paginate(10);
            return view('produk/produk_pengajuan', ['produk' => $produk]);
        }
        else
        {
            return redirect('/');
        } 
    }

    public function tolak($id,$a,$c)
    {
        $produk = $id;
        $anggota =$a;
        $create = $c;
        
        DB::table('transaksi')-> where([['id_produk', $produk],['id_anggota',$anggota],['created_at',$create],])-> update([
        //$anggota = anggota::find($id);
        //'id_produk' => $request->id_produk,
        'status' => 'Ditolak'
        ]);
        return redirect('produk/produk_pengajuan');
    }

    public function terima($id,$a,$b,$d, Request $request)
    {
        if (Session::get('login'))
        {
            $ids = $request->session()->get('login'); 
            $admin = DB::table('users')->where('id',$ids)->first();
            $namaAdmin=$admin->name;
            $produk = $id;
            $anggota =$a;
            $create=$b;
            $transaksi = $d;
            $jumlah = DB::table('produk')->where('id_produk',$id)->first();
            $pengajuan = DB::table('transaksi')->where('id_transaksi',$transaksi)->first();
            $pengajuanIDProduk = $pengajuan->id_produk;
            $pengajuanIDAnggota = $pengajuan->id_anggota;
            $pengajuanProduk = $pengajuan->jumlah;
            $sisa = $jumlah->sisa;
            $terjual = $jumlah->terjual;
            $a = $jumlah->jumlah;
            $c = (int)$terjual+(int)$pengajuanProduk;
            $b= (int)$a-(int)$c;
            $hasil = (int)$sisa-(int)$pengajuanProduk;
            $harga = $jumlah->harga;
            $jumlahKomisi = $pengajuan->jumlah;
            $z = DB::table('jabatan as b')
                ->select('b.komisi')
                ->join('anggota as a','b.id_jabatan','=','a.id_jabatan')
                ->where('id_anggota',$anggota)->first();
            $za = $z->komisi; 
            $komisi= (((int)$za*(int)$harga)/100)*(int)$jumlahKomisi;
            $q = DB::table('anggota')->where('id_anggota',$anggota)->first();
            $saldo=$q->saldo;
            $parent1=$q->id_parent;
            $parent2=$q->id_parent_2;
$trx = DB::table('komisi_template_trx as a')
->select('a.id_produk','a.id_jabatan','a.id_template_komisi','b.komisi_1','b.komisi_2','b.komisi_3','a.id_komisi_template_trx','c.status')
->join('komisi_template as b','b.id_template_komisi','=','a.id_template_komisi')
->join('transaksi as c','c.id_produk','=','a.id_produk')
->join('jabatan as d','d.id_jabatan','=','a.id_jabatan')
->join('anggota as e','e.id_jabatan','=','d.id_jabatan')
->where('e.id_anggota',$anggota)
->first();

$komisi1=$trx->komisi_1;
$komisi2=$trx->komisi_2;
$komisi3=$trx->komisi_3;

$tKomisi1=$komisi1*$pengajuanProduk;
$tKomisi2=$komisi2*$pengajuanProduk;
$tKomisi3=$komisi3*$pengajuanProduk;

$selectId = DB::table('transaksi')->select('id_transaksi')->where([['id_produk', $produk],['id_anggota',$anggota],['created_at',$create],])->first();
$idtransaksia=$selectId->id_transaksi;

            $saldoAkhir=(int)$komisi+(int)$saldo;
            if ((int)$sisa!=0)
            {
                if((int)$sisa>=(int)$pengajuanProduk)
                {
                    ([
                        ['status', '=', '1'],
                        ['subscribed', '<>', '1'],
                    DB::table('produk')-> where('id_produk', $id)-> update([
                        //$angka  = "1",
                    'terjual' =>$c,
                    'sisa' =>$b,
                    ])]);
                    
                    $tr = DB::table('transaksi')-> where([['id_produk', $produk],['id_anggota',$anggota],['created_at',$create],])-> update([
                        //$anggota = anggota::find($id);
                        //'id_produk' => $request->id_produk,
                        'status' => 'Diterima',
                        'komisi' => $komisi,
                        
                    ]);
                  
                    // DB::table('anggota')-> where('id_anggota', $anggota)-> update([
                    //     'saldo'=> $saldoAkhir,
                    // ]);

                    // $kt = komisi_transaksi::create([
                    //     'id_anggota' => $anggota,
                    //     'id_produk' => $produk,
                    //     'id_transaksi' => $idtransaksia,
                    //     'jumlah' => $pengajuanProduk,
                    //     'nominal' => $tKomisi1,
                    //     'approve' => $namaAdmin,
                    //     'status' => 'belum diproses',

                    // ]);

                    transaksi_produk::create([
                        'id_produk' =>$pengajuanIDProduk, 
                        'id_anggota' => $anggota,
                        'id_transaksi' => $idtransaksia,
                        'jumlah' => $pengajuanProduk,
                        'komisi' => $tKomisi1,
                        'admin' =>$namaAdmin,
                        'status' =>'belum diproses',
                    ]); 

                    if($parent1 != 0)
                    {
                        // $kt = komisi_transaksi::create([
                        //     'id_anggota' => $parent1,
                        //     'id_produk' => $produk,
                        //     'id_transaksi' => $idtransaksia,
                        //     'jumlah' => $pengajuanProduk,
                        //     'nominal' => $tKomisi2,
                        //     'approve' => $namaAdmin,
                        //     'status' => 'belum diproses',
    
                        // ]);

                        transaksi_produk::create([
                            'id_produk' =>$pengajuanIDProduk, 
                            'id_anggota' => $parent1,
                            'id_transaksi' => $idtransaksia,
                            'jumlah' => $pengajuanProduk,
                            'komisi' => $tKomisi2,
                            'admin' =>$namaAdmin,
                            'status' =>'belum diproses',
                        ]); 
                    }

                    if($parent2 != 0)
                    {
                        // $kt = komisi_transaksi::create([
                        //     'id_anggota' => $parent2,
                        //     'id_produk' => $produk,
                        //     'id_transaksi' => $idtransaksia,
                        //     'jumlah' => $pengajuanProduk,
                        //     'nominal' => $tKomisi3,
                        //     'approve' => $namaAdmin,
                        //     'status' => 'belum diproses',
    
                        // ]);

                        transaksi_produk::create([
                            'id_produk' =>$pengajuanIDProduk, 
                            'id_anggota' => $parent2,
                            'id_transaksi' => $idtransaksia,
                            'jumlah' => $pengajuanProduk,
                            'komisi' => $tKomisi3,
                            'admin' =>$namaAdmin,
                            'status' =>'belum diproses',
                        ]); 
                    }

                   
                    return redirect('produk/produk_pengajuan');
                }
                else
                {
                    echo "<script>";
                    echo "alert('Maaf kuota untuk produk ini telah penuh');";
                    echo "</script>";
                    return redirect()->back()->with('alert','Maaf kuota untuk produk ini telah penuh');
                }
            } 
            else
            {
                echo "<script>";
                echo "alert('Maaf kuota untuk produk ini telah penuh');";
                echo "</script>";
                return redirect()->back()->with('alert','Maaf kuota untuk produk ini telah penuh');
            }
        }
        
    }

    public function transaksiProduk()
    {
        if (Session::get('login'))
        { 
            $komisi = DB::table('transaksi_produk as a')
            ->select('a.created_at','b.id_anggota','b.saldo','a.komisi')
            ->join('anggota as b','b.id_anggota','=','a.id_anggota')
            ->where('a.status','belum diproses')
            ->get();

            // $komisidate=date('Y-m-d', strtotime($komisi->created_at));
            $indexs = 1;
            foreach($komisi as $namas => $qa)
            {
                $produks[] = DB::table('transaksi_produk as a')
                        ->select('a.id_transaksi_produk','a.jumlah','b.nama','c.nama_produk','a.admin','a.created_at','a.komisi')
                        ->join('anggota as b','a.id_anggota','=','b.id_anggota')
                        ->join('produk as c','a.id_produk','=','c.id_produk')
                        ->where('a.status','belum diproses')
                        ->get();
                $komisidate=date('Y-m-d', strtotime($qa->created_at));
                $tgl=date('Y-m-d');
                $l=$qa->komisi;
                print_r($l);
                $s=$qa->saldo;
                
                $anggotaid=$qa->id_anggota;
                print_r($anggotaid);
                print_r($s);
                $qe = $l+$s;
                print_r($qe);
                if($komisidate>$tgl)
                {
                    // $index = 1;
                    // foreach($produks as $nama_s => $q)
                    // {
                    $a = DB::table('transaksi_produk')-> update([
                        'status' => 'sudah diproses'
                    ]);
                    // $c = $q->komisi;
                    // $total = $saldo+$c;

                    $anggota = DB::table('anggota')->where('id_anggota',$anggotaid)-> update([
                        'saldo' => $qe,
                    ]);
                    //     $index++;
                    // }
                }
                else{
                        // $a = DB::table('transaksi_produk')-> update([
                        //     'status' => 'sudah diproses'
                        // ]);
                        // $anggota = DB::table('anggota')->where('id_anggota',$anggotaid)-> update([
                        //     'saldo' => $qe,
                        // ]);
                }
                $indexs++;
            }
            $produk = DB::table('transaksi_produk as a')
                    ->select('a.jumlah','b.nama','c.nama_produk','a.admin','a.created_at')
                    ->join('anggota as b','a.id_anggota','=','b.id_anggota')
                    ->join('produk as c','a.id_produk','=','c.id_produk')
                    ->where('a.status','sudah diproses')
                    ->paginate(10);
                  
            return view('produk/tampil_transaksi', ['produk' => $produk]);
        }
        else
        {
            return redirect('/');
        } 
    }
}

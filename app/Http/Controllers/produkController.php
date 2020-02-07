<?php

namespace App\Http\Controllers;
use App\produk;
use App\transaksi;
use App\materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class produkController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        {
            $produk = DB::table('produk')->paginate(10);
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

    
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama_produk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
    	]);
 
        produk::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'sisa' => '0',
            'terjual' => '0',
            'harga' => $request->harga
        ]);
        $produk = DB::table('produk')
                ->orderBy('id_produk','desc')
                ->first();
        $a = $produk->id_produk;
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
                    'id_produk' =>$a, 
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
        produk::where('id_produk', $id)->delete();
        return redirect('produk');
    }

    public function edit($id)
    {
        if (Session::get('login'))
        { 
            //$anggota = anggota::find($id);
            $produk = DB::table('produk')->where('id_produk',$id)->first();
            return view('produk/produk_edit', ['produk' => $produk]);
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
                    ->select('b.id_produk','b.nama_produk','c.nama','c.id_anggota','a.created_at')
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

    public function terima($id,$a,$b, Request $request)
    {
        $produk = $id;
        $anggota =$a;
        $create=$b;
        $jumlah = DB::table('produk')->where('id_produk',$id)->first();
        $sisa = $jumlah->sisa;
        $terjual = $jumlah->terjual;
        $a = $jumlah->jumlah;
        $c = (int)$terjual+1;
        $b= (int)$a-(int)$c;
        $harga = $jumlah->harga;
        $z = DB::table('jabatan as b')
            ->select('b.komisi')
            ->join('anggota as a','b.id_jabatan','=','a.id_jabatan')
            ->where('id_anggota',$anggota)->first();
        $za = $z->komisi;
        $komisi= ((int)$za*(int)$harga)/100;
        $q = DB::table('anggota')->where('id_anggota',$anggota)->first();
        $saldo=$q->saldo;
        $saldoAkhir=(int)$komisi+(int)$saldo;
        if ((int)$sisa!=0)
        {
            // ([
            //     ['status', '=', '1'],
            //     ['subscribed', '<>', '1'],
            DB::table('produk')-> where('id_produk', $id)-> update([
                //$angka  = "1",
            'terjual' =>$c,
            'sisa' =>$b,
            ]);
            DB::table('transaksi')-> where([['id_produk', $produk],['id_anggota',$anggota],['created_at',$create],])-> update([
                //$anggota = anggota::find($id);
                //'id_produk' => $request->id_produk,
                'status' => 'Diterima',
                'komisi' => $komisi,
                
            ]);
            DB::table('anggota')-> where('id_anggota', $anggota)-> update([
                'saldo'=> $saldoAkhir,
            ]);
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


}

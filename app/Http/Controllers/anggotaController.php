<?php

namespace App\Http\Controllers;
use App\Anggota;
use App\jabatan;
use App\transaksi_produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use File;

class anggotaController extends Controller
{
    //  s
    public function index()

    {
        if (Session::get('login'))
        {
            // $anggota = anggota::all();
            // return view('anggota/anggota', ['anggota' => $anggota]);
            $anggota = DB::table('anggota as a')
            ->select('a.id_anggota','a.id_parent','a.nama','a.email','a.no_handphone','a.alamat','b.nama_jabatan','c.nama as namaParent')
            ->join('jabatan as b', 'b.id_jabatan', '=', 'a.id_jabatan')
            ->join('anggota as c', 'c.id_anggota' ,'=', 'a.id_parent')
            ->where('a.status','aktif')
            ->paginate(10);
            return view('anggota/anggota', ['anggota' => $anggota]);
        }
        else
        {
            return redirect('/');
        }

       
    }

    public function cari(Request $request)
	{
        if (Session::get('login'))
        {
        // menangkap data pencarian
        $a='a';
        $b='b';
        $cari = $request->cari;
        $select = $request->select;
        if($select=='nama' || $select =='id_anggota'||$select=='no_handphone')
        {
            $anggota = DB::table('anggota as a')
        ->select('a.id_anggota as id_anggota','a.id_parent as id_parent','a.nama as nama','a.email as email','a.no_handphone as no_handphone','a.alamat as alamat','b.nama_jabatan as nama_jabatan','c.nama as namaParent')
        ->join('jabatan as b', 'b.id_jabatan', '=', 'a.id_jabatan')
        ->join('anggota as c', 'c.id_anggota' ,'=', 'a.id_parent')
        ->where('a.status','aktif')
        ->where("$a.$select",'like',"%".$cari."%")
        ->paginate(10);
        }
        else
        {
            $anggota = DB::table('anggota as a')
        ->select('a.id_anggota as id_anggota','a.id_parent as id_parent','a.nama as nama','a.email as email','a.no_handphone as no_handphone','a.alamat as alamat','b.nama_jabatan as nama_jabatan','c.nama as namaParent')
        ->join('jabatan as b', 'b.id_jabatan', '=', 'a.id_jabatan')
        ->join('anggota as c', 'c.id_anggota' ,'=', 'a.id_parent')
        ->where('a.status','aktif')
        ->where("$b.$select",'like',"%".$cari."%")
        ->paginate(10);
        }
        
        return view('anggota/anggota', ['anggota' => $anggota]);
    		// mengambil data dari table pegawai sesuai pencarian data
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
            $pilihan = DB::table('jabatan')
            ->select('id_jabatan','nama_jabatan')
            ->get();
            $data = DB::table('anggota')
            ->select('id_anggota','nama')
            ->get();
            return view('anggota/tambah_anggota',['data'=>$data],['pilihan'=>$pilihan]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function loadData(Request $request)
    {
        // $data = [];
        // if ($request->has('q')) {
        //     $cari = $request->q;
        //     $data = DB::table('jabatan')->select('id_jabatan', 'nama_jabatan')->where('nama_jabatan', 'LIKE', '%' .$request . '%')->first();
        //     if (!empty($keywords)) {
        //         //$datas = array("1" => "Belajar", "2" => "select2", "3" => "ajax");
        //        // return response()->json($dataArray, 200);
        //     }

            //return json_encode($data);
        //}
        // $keywords = $request->get("search");
        // $dataq = DB::table('jabatan')->select('id_jabatan', 'nama_jabatan')->where('nama_jabatan', 'LIKE', '%senior%')->get();
        // // $json = json_encode($dataq);
        // // return $json;
        // return response()->json($dataq, 200);

        // $keywords = $request->get("q");
        // if($keywords!= '')
        //     {
        //         $data = DB::table('jabatan')->select('id_jabatan', 'nama_jabatan')->where('nama_jabatan', 'LIKE', '%' .$keywords . '%')->first();
        //         return view('anggota/tambah_anggota',['data'=>$data]);
        //         //return response()->json($data, 200);
        //     }
            $data = DB::table('jabatan')->select('id_jabatan', 'nama_jabatan')->get();
                return view('anggota/tambah_anggota',['data'=>$data]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'email' => 'required|email'
        ]);
        $npwps = $request->no_npwp;
        $a= $request->id_parent;
        if($npwps == '')
        {
            $npwp='0';
        }
        else
        {
            $npwp=$npwps;
        }
        $p = DB::table('anggota')->select('parent_all','id_parent')->where('id_anggota',$a)->first();
        $parenta = $p->id_parent;
        $pa = $p->parent_all;
        $ex = explode(",",$pa);
        $i= count($ex);
        $ex[$i]=$a;
        $newData = implode(",", $ex);

        $file = $request->file('file_ktp');
        $nama_file = $file->getClientOriginalName();
        $gambar = anggota::where('file_ktp',$nama_file)->count();
        //$a = $gambar->nama_materi;
        if ($gambar==0)
        {
              // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_ktp';
            $file->move($tujuan_upload,$nama_file);

            anggota::create([
                'id_anggota' => $request->id_anggota,
                'id_parent' => $request->id_parent,
                'id_parent_2' => $parenta,
                'id_jabatan' => $request->id_jabatan,
                'parent_all' => $newData,
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_handphone' => $request->no_handphone,
                'password' => '0',
                'saldo' => '0',
                'status' => 'aktif',
                'no_ktp' => $request->no_ktp,
                'file_ktp' => $nama_file,
                'no_npwp' => $npwp,
                'poin' =>'0',
            ]);

        }
        else
        {
            //Alert::message('Message', 'Optional Title');
            //return view ('');
            //Alert::message('Nama anggota sudah ada', 'Judul Pesan');
            return redirect()->back();
        }

        return redirect('home');
    }

    public function reset($id)
    {
       $delete= DB::table('anggota')-> where('id_anggota', $id)-> update([
           'status' => 'reset',
           'password' => ''
       ]);

        return redirect('home');
    }

    public function delete($id)
    {
       $delete= DB::table('anggota')-> where('id_anggota', $id)-> update([
           'status' => 'tidak aktif',
       ]);

        return redirect('home');
    }
    public function edit($id)
    {
        // id','id_anggota','id_parent', 'id_jabatan','parent_all','nama','alamat','email','no_handphone','password','saldo','status','no_ktp','no_npwp','file_ktp',];

        if (Session::get('login'))
        {
            //$anggota = anggota::find($id);
            $anggota = DB::table('anggota as a')
                    ->select('c.nama as namaParent','a.id_anggota','a.id_parent','a.id_jabatan','a.parent_all','a.nama','a.alamat','a.email','a.no_handphone','a.password','a.saldo','a.status','a.no_ktp','a.no_npwp','a.file_ktp','b.nama_jabatan')
                    ->join('jabatan as b','a.id_jabatan','=','b.id_jabatan')
                    ->join('anggota as c','c.id_anggota','=','a.id_parent')
                    ->where('a.id_anggota',$id)
                    ->first();
                    $pilihan = DB::table('jabatan')
                    ->select('id_jabatan','nama_jabatan')
                    ->get();
                    $data = DB::table('anggota')
                    ->select('id_anggota','nama')
                    ->get();
            return view('anggota/anggota_edit', ['anggota' => $anggota,'pilihan'=>$pilihan,'data'=>$data]);
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
        $a= $request->id_parent;
        $p = DB::table('anggota')->select('parent_all','id_parent')->where('id_anggota',$a)->first();
        $parenta = $p->id_parent;
        $pa = $p->parent_all;
        $ex = explode(",",$pa);
        $i= count($ex);
        $ex[$i]=$a;
        $newData = implode(",", $ex);
        $gambar = anggota::where('id_anggota',$request-> id)->first();
        File::delete('data_ktp/'.$gambar->file_ktp);
        $file = $request->file('file_ktp');
        $nama_file = $file->getClientOriginalName();
        $gambar = anggota::where('file_ktp',$nama_file)->count();
        //$a = $gambar->nama_materi;
        if ($gambar==0)
        {
              // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_ktp';
            $file->move($tujuan_upload,$nama_file);
            DB::table('anggota')-> where('id_anggota', $request-> id)-> update([
            //$anggota = anggota::find($id);
            'id_parent' => $request->id_parent,
            'id_jabatan' => $request->id_jabatan,
            'id_parent_2' => $request->$parenta,
            'parent_all' => $newData,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
            'no_ktp' => $request->no_ktp,
            'file_ktp' => $nama_file,
            'no_npwp' => $request->no_npwp,
            ]);

            return redirect('home');
        }
        else
        {
            //Alert::message('Message', 'Optional Title');
            //return view ('');
            //Alert::message('Nama materi sudah ada', 'Judul Pesan');
            return redirect()->back();
        }
    }

    public function profile($id)
    {
        if (Session::get('login'))
        {
            //$anggota = anggota::find($id);
            $anggota = DB::table('anggota as a')
                    ->select('b.id_anggota','b.id_parent','b.id_jabatan','a.nama','a.email','a.alamat','a.no_handphone','a.saldo','b.nama as namaParent','c.nama_jabatan','a.file_ktp','a.no_ktp','a.no_npwp')
                    ->join('anggota as b','b.id_anggota','=','a.id_parent')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->where('a.id_anggota',$id)
                    ->get();

            $parent = DB::table('anggota as a')
                    ->select('b.id_anggota','a.id_parent','b.id_jabatan','b.nama','b.email','b.alamat','b.no_handphone','b.saldo','a.nama as namaParent','c.nama_jabatan')
                    ->join('anggota as b','b.id_parent','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->where('a.id_anggota',$id)
                    ->get();
                    $num = 0;
                    $anak_array = null;
                    //$anak_array=[];
                    $anak = [];
                    foreach ($parent as $az)
                        {
                            $sc = $az->id_anggota;
                            //echo $sc;
                            $anak[$sc] =DB::table('anggota as a')
                                    ->select('b.id_anggota','b.id_parent','b.id_jabatan','a.nama','b.email','b.alamat','b.no_handphone','b.saldo','b.nama as namaParent','c.nama_jabatan')
                                    ->join('anggota as b','b.id_parent','=','a.id_anggota')
                                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                                    ->where([['b.id_parent',$sc],])
                                    ->get();

                            //$anak_array = Arr::add([$anak_array],$anak);

                    $num++;
                        }

            return view('anggota/anggota_profile', ['anggota' => $anggota, 'parent' => $parent, 'anak' => $anak]);
            //return view('anggota/anggota_edit', ['anggota' => $anggota]);
        }
        else
        {
            return redirect('/');
        }
    }

}

<?php

namespace App\Http\Controllers;
use App\Anggota;
use App\jabatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

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
            return view('anggota/tambah_anggota',['data'=>$data],['pilihan'=>$pilihan],);
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
            'id_anggota' => 'required',
            'id_parent' => 'required',
            'id_jabatan' => 'required', 
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_handphone' => 'required',
            'password' => 'required',
            
        ]);
        $a= $request->id_parent;
        $p = DB::table('anggota')->select('parent_all')->where('id_anggota',$a)->first();
        $pa = $p->parent_all;
        $ex = explode(",",$pa);
        $i= count($ex);
        $ex[$i]=$a;
        $newData = implode(",", $ex);
        anggota::create([
            'id_anggota' => $request->id_anggota,
            'id_parent' => $request->id_parent,
            'id_jabatan' => $request->id_jabatan,
            'parent_all' => $newData,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
            'password' => hash::make($request->password),
            'saldo' => '0',
            'status' => 'aktif'
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
        if (Session::get('login'))
        {
            //$anggota = anggota::find($id);
            $anggota = DB::table('anggota')
                    ->where('id_anggota',$id)
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
        $p = DB::table('anggota')->select('parent_all')->where('id_anggota',$a)->first();
        $pa = $p->parent_all;
        $ex = explode(",",$pa);
        $i= count($ex);
        $ex[$i]=$a;
        $newData = implode(",", $ex);
        DB::table('anggota')-> where('id_anggota', $request-> id)-> update([
        //$anggota = anggota::find($id);
        'id_parent' => $request->id_parent,
        'id_jabatan' => $request->id_jabatan,
        'parent_all' => $newData,
        'nama' => $request->nama,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'no_handphone' => $request->no_handphone,
        'password' => hash::make($request->password)
        ]);
        return redirect('home');
    }

    public function profile($id)
    {
        if (Session::get('login'))
        {
            //$anggota = anggota::find($id);
            $anggota = DB::table('anggota as a')
                    ->select('b.id_anggota','b.id_parent','b.id_jabatan','a.nama','b.email','b.alamat','b.no_handphone','b.saldo','b.nama as namaParent','c.nama_jabatan')
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
                                    ->select('b.id_anggota','a.id_parent','b.id_jabatan','a.nama','b.email','b.alamat','b.no_handphone','b.saldo','b.nama as namaParent','c.nama_jabatan')
                                    ->join('anggota as b','b.id_parent','=','a.id_anggota')
                                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                                    ->where('b.id_parent',$sc)
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

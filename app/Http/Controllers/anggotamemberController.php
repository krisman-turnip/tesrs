<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\anggota;

class anggotamemberController extends Controller
{
    public function index(Request $request) 
    {
        if (Session::get('login'))
        {
            $id = $request->session()->get('login'); 
            //echo $request->session()->get('login'); 
            $anggota = DB::table('anggota as a')
                    ->select('b.id_anggota','b.id_parent','b.id_jabatan','a.file_ktp','a.no_ktp','a.no_npwp','a.nama','a.email','a.alamat','a.no_handphone','a.saldo','b.nama as namaParent','c.nama_jabatan')
                    ->join('anggota as b','b.id_anggota','=','a.id_parent')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->where([['a.status','aktif'],['a.id_anggota',$id],])
                    ->get();
                    $parent = DB::table('anggota as a')
                    ->select('b.id_anggota','a.id_parent','b.id_jabatan','b.nama','b.email','b.alamat','b.no_handphone','b.saldo','a.nama as namaParent','c.nama_jabatan')
                    ->join('anggota as b','b.id_parent','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->where([['b.status','aktif'],['a.id_anggota',$id],])
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
                                    ->select('b.id_anggota','a.id_parent','b.id_jabatan','a.nama','a.email','a.alamat','a.no_handphone','a.saldo','b.nama as namaParent','c.nama_jabatan')
                                    ->join('anggota as b','b.id_parent','=','a.id_anggota')
                                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                                    ->where([['b.status','aktif'],['b.id_parent',$sc],])
                                    ->get();

                            //$anak_array = Arr::add([$anak_array],$anak);
                            
                    $num++;
                        }
            return view('member/home/beranda',['anggota' => $anggota, 'parent' => $parent, 'anak' => $anak]);
            //return view('');
             
            //return view('member/home/beranda', ['parent' => $parent]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function tab($id, Request $request) 
    {
        if (Session::get('login'))
        {
            
            //echo $request->session()->get('login'); 
            $anggota = DB::table('anggota as a')
                    ->select('b.id_anggota','a.file_ktp','a.no_ktp','a.no_npwp','b.id_parent','b.id_jabatan','a.nama','a.email','a.alamat','a.no_handphone','a.saldo','b.nama as namaParent','c.nama_jabatan')
                    ->join('anggota as b','b.id_anggota','=','a.id_parent')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->where([['a.status','aktif'],['a.id_anggota',$id],])
                    ->get(); 
                    $parent = DB::table('anggota as a')
                    ->select('b.id_anggota','a.id_parent','b.id_jabatan','b.nama','b.email','b.alamat','b.no_handphone','b.saldo','a.nama as namaParent','c.nama_jabatan')
                    ->join('anggota as b','b.id_parent','=','a.id_anggota')
                    ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
                    ->where([['b.status','aktif'],['a.id_anggota',$id],])
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
                                    ->where([['b.status','aktif'],['b.id_parent',$sc],])
                                    ->get();

                            //$anak_array = Arr::add([$anak_array],$anak);
                            
                    $num++;
                        }
            return view('member/home/beranda',['anggota' => $anggota, 'parent' => $parent, 'anak' => $anak]);
            //return view('');
             
            //return view('member/home/beranda', ['parent' => $parent]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }
}

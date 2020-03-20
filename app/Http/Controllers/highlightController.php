<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\highlight;
use File;
use Illuminate\Support\Facades\Session;

class highlightController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        {
            $hl = DB::table('highlight as a')
            ->select('a.id_highlight','a.judul','a.deskripsi','a.keterangan','a.file')
            ->where('a.status','aktif')
            ->paginate(30);
            return view('highlight/highlight', ['hl'=> $hl]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function upload()
    {
        if (Session::get('login'))
        {
           
            return view('highlight/tambah_highlight');
        }
        else
        {
            return redirect('/');
        }
    }   
    
    public function prosesupload(request $request)
    {
        if (Session::get('login'))
        {
            $file = $request->file('file_hl');
    
            $nama_file = $file->getClientOriginalName();
            $nama_f = $nama_file.date('Y-m-d_H-i-s');
            $gambar = highlight::where('file',$nama_f)->count();
            //$a = $gambar->nama_materi;
            print_r($nama_f);
            if ($gambar==0)
            {            
                  // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'image_dash';
                $file->move($tujuan_upload,$nama_f);
            
            
                highlight::create([
                    'judul' =>$request->deskripsi,  
                    'file' => $nama_f,
                    'deskripsi' => $request->deskripsi,
                    'keterangan' => $request->keterangan,
                    'status' =>'aktif'
                ]);
            
                return redirect('highlightBeranda');
            }
            else
            {
                //Alert::message('Message', 'Optional Title');
                //return view ('');
                Alert::message('Nama materi sudah ada', 'Judul Pesan');
                return redirect()->back();
            }
            
        }
        else
        {
            return redirect('/');
        }
    }   

    public function nonaktif(request $request,$id)
    {
        if (Session::get('login'))
        {
            $update = DB::table('highlight')->where('id_highlight',$id)->update([
                'status' => 'tidak aktif',
            ]);
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }

}

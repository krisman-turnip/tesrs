<?php

namespace App\Http\Controllers;
use App\materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Session;
use Alert;

class materiController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        {
            $materi = DB::table('materi as a')
            ->select('a.id_materi','a.nama_materi','a.keterangan','b.nama_produk')
            ->join('produk as b', 'b.id_produk', '=', 'a.id_produk')
            ->paginate(10);
            return view('materi/materi', ['materi' => $materi]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function materiCari(request $request)
    {
        if (Session::get('login'))
        {
            
            $cari = $request->cari;
            $select = $request->select;
            if($select=='nama_materi')
            {
                $materi = DB::table('materi as a')
                ->select('a.id_materi','a.nama_materi','a.keterangan','b.nama_produk')
                ->join('produk as b', 'b.id_produk', '=', 'a.id_produk')
                ->where("a.$select",'like',"%".$cari."%")
                ->paginate(10);
                
            }
            else
            {
                $materi = DB::table('materi as a')
                ->select('a.id_materi','a.nama_materi','a.keterangan','b.nama_produk')
                ->join('produk as b', 'b.id_produk', '=', 'a.id_produk')
                ->where("b.$select",'like',"%".$cari."%")
                ->paginate(10);
                
            }
            return view('materi/materi', ['materi' => $materi]);
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
            $pilihan = DB::table('produk')
            ->select('id_produk','nama_produk')
            ->get();
            return view('materi/upload_materi',['pilihan'=> $pilihan]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function proses_upload(Request $request){
        $this->validate($request, [
            'nama_materi' => 'required|file|mimes:pdf',
            'keterangan' => 'required'
        ]);
        
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('nama_materi');
    
        $nama_file = $file->getClientOriginalName();
        $gambar = materi::where('nama_materi',$nama_file)->count();
        //$a = $gambar->nama_materi;
        if ($gambar==0)
        {            
              // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
        
        
            materi::create([
                'id_produk' =>'2',  
                'nama_materi' => $nama_file,
                'keterangan' => $request->keterangan,
            ]);
        
            return redirect('materi');
        }
        else
        {
            //Alert::message('Message', 'Optional Title');
            //return view ('');
            Alert::message('Nama materi sudah ada', 'Judul Pesan');
            return redirect()->back();
        }
    }

    public function download($id)
    {
        // $pdf = DB::table('materi')->where('id_materi',$id)->first();
        // return response()->download($pdf);
        $book_cover = materi::where('id_materi', $id)->first();
        $path = public_path(). '/data_file/'. $book_cover->nama_materi;
        return response()->download($path, $book_cover
                 ->original_filename, ['Content-Type' => $book_cover->mime]); 
    }

    public function delete($id)
    {
        
        // $book_cover = materi::where('id_materi', $id)->first();
        // $path = public_path(). '/data_file/'. $book_cover->nama_materi;
        // return response()->delete($path, $book_cover
        //          ->original_filename, ['Content-Type' => $book_cover->mime]);
        //          materi::where('id_materi', $id)->delete();
        // return redirect('materi');
        $gambar = materi::where('id_materi',$id)->first();
		File::delete('data_file/'.$gambar->nama_materi);
 
		// hapus data
		materi::where('id_materi',$id)->delete();
 
		return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\komisi;
use File;

class pembayarankomisiController extends Controller
{
    public function index(Request $request) 
    {
        if (Session::get('login'))
        {
            $id = $request->session()->get('login'); 
            //echo $request->session()->get('login');
            $komisi = DB::table('komisi')
                    ->where('id_anggota',$id)
                    ->paginate(10);
            return view('member/komisi/pembayaran', ['komisi' => $komisi]);
        
        $book_cover = komisi::where('id_komisi', $id)->first();
        $path = public_path(). '/data_transfer/'. $book_cover->bukti_transfer;
        // return response()->download($path, $book_cover
        //          ->original_filename, ['Content-Type' => $book_cover->mime]);
        }
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function download($id)
    {
        $book_cover = komisi::where('id_komisi', $id)->first();
        $path = public_path(). '/data_transfer/'. $book_cover->bukti_transfer;
        return response()->download($path, $book_cover
                 ->original_filename, ['Content-Type' => $book_cover->mime]);
    }
}

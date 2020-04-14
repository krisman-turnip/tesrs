<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bahan_mentahController extends Controller
{
    public function index()
    {
        
            // $user = DB::table('tbl_m_user')->get();
            return view('barang_mentah/barang_mentah');
        
    }
    public function tambah()
    {
        
            // $user = DB::table('tbl_m_user')->get();
            return view('barang_mentah/barang_mentah_tambah');
        
    }
}

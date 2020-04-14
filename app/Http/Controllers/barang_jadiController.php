<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class barang_jadiController extends Controller
{
    public function index()
    {
        
            // $user = DB::table('tbl_m_user')->get();
            return view('barang_jadi/barang_jadi');
        
    }
    public function tambah()
    {
        
            // $user = DB::table('tbl_m_user')->get();
            return view('barang_jadi/barang_jadi_tambah');
        
    }
}

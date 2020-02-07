<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class produkanggotaController extends Controller
{
    public function index(Request $request)
    {
        if (Session::get('login'))
        {
            $produk = DB::table('produk')->paginate(10);
            //echo $request->session()->get('login');
            return view('member/produk/produk', ['produk' => $produk]);
        } 
        else
        {
            return redirect('/loginanggota');
        }
    }
    
}

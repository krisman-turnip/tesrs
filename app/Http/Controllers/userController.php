<?php

namespace App\Http\Controllers;
use App\userModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        
            $user = DB::table('master')->get();
            return view('user/user', ['user' => $user]);
      
            return redirect('/');
        
    }
    public function usertambah()
    {
            return view('user/user_tambah');

    }

    public function store(Request $request)
    {
        $createMaster = userModel::create([
            'produk_id' => $request->produk_id,
            'nama_produk' => $request->nama_produk,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'menu' => $request->menu,
    	]);
 
        return redirect('user');
    }

   
}

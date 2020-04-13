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
        
            $user = DB::table('tbl_m_user')->get();
            return view('user/user', ['user' => $user]);
      
      
            return redirect('/');
        
    }
    public function usertambah()
    {
            return view('user/user_tambah');

    }

    public function store(Request $request)
    {
        $createAdmin = userModel::create([
            'username' => $request->username,
            'password' => hash::make($request->password),
            'fullname' => $request->fullname,
            'menu' => $request->menu,
            'date_login' => '2010-04-01 00:00:00',
            'karyawan_id' => '1',
    	]);
 
        return redirect('user/tambah');
    }

    public function edit(Request $request,$id)
    {
        if (Session::get('login'))
        {
            $id=$request->id;
            //$anggota = anggota::find($id);
            $user = DB::table('tbl_m_user')->where('user_id',$id)->first();
            return view('user/user_edit', ['user' => $user]);
        }
        else
        {
            return redirect('/');
        }    
    }

    public function update( Request $request)
    {
        $id = $request->id;
        DB::table('tbl_m_user')-> where('user_id', $id)-> update([
        //$anggota = anggota::find($id);
        'username' => $request->username,
        'fullname' => $request->fullname,
        'menu' => $request->menu,
        'karyawan_id' => '1',
        ]);
        return redirect('user');
    }
}

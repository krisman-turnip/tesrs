<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function index()
    {
        if (Session::get('admin'))
        {
            $admin = DB::table('users')->paginate(10);
            return view('admin/admin', ['admin' => $admin]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function tambah()
    {
        if (Session::get('admin'))
        {
            return view('admin/tambah_admin');
            //return view('../pegawai');
        }
        else
        {
            return redirect('/');
        }   
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'level' => 'required',
            'password' => 'required'
    	]);
 
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => hash::make($request->password),
            'status' => 'aktif'
    	]);
 
        return redirect('admin');
    }

        public function delete($id)
    {
        user::where('id', $id)->delete();
        return redirect('admin');
    }

    public function edit($id)
    {
        if (Session::get('admin'))
        {
            //$anggota = anggota::find($id);
            $admin = DB::table('users')->where('id',$id)->first();
            return view('admin/admin_edit', ['admin' => $admin]);
        }
        else
        {
            return redirect('/');
        }    
    }

    public function update($id, Request $request)
    {
        DB::table('users')-> where('id', $request-> id)-> update([
        //$anggota = anggota::find($id);
        'id' => $request->id,
        'name' => $request->name,
        'email' => $request->email,
        'level' => $request->level,
        'password' => hash::make($request->password)
        ]);
        return redirect('admin');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginadminController extends Controller
{
    public function login(Request $request) 
    {
        $this->validate($request,

            ['email'=>'required'],

            ['password'=>'required']
            
        );
    try{
        $user = $request->email;
        $pass = $request->password;    

        $usersa = DB::table('users')->where([['email', $user],['status','aktif'],])->count();
        $users = DB::table('users')->where([['email', $user],['status', 'aktif'],])->first();
        //$jabatan = DB::table('jabatan')->where('id_jabatan',$id)->first();
        //$anggota=count($users);[
        $level = $users->level;
        $admin = 'admin';
        echo $level;
            
        if($usersa!=0){
            if($level=='admin')
            {
                if($users->email == $user AND Hash::check($pass, $users->password) ){ 
                    //$users->session()->put('login', 'Selamat anda berhasil login');
                    //$request->session()->put('id',$users->id_anggota);
                    Session::put('login', $users->id);
                    Session::put('admin', $users->level);
                    return redirect('/home'); 
                }
                else 
                {    
                    echo $level;
                    return redirect('/')->with('failed','Login gagal');
                }
            }
            if($level=='marketing')
            {
                if($users->email == $user AND Hash::check($pass, $users->password) ){ 
                    //$users->session()->put('login', 'Selamat anda berhasil login');
                    //$request->session()->put('id',$users->id_anggota);
                    Session::put('login', $users->id);
                    Session::put('marketing', $users->level);
                    return redirect('/produk'); 
                } 
                else 
                {    
                    echo $level;
                    return redirect('/')->with('failed','Login gagal');
                }
            }
            if($level=='multiadmin')
            {
                if($users->email == $user AND Hash::check($pass, $users->password) ){ 
                    //$users->session()->put('login', 'Selamat anda berhasil login');
                    //$request->session()->put('id',$users->id_anggota);
                    Session::put('login', $users->id);
                    Session::put('multiadmin', $users->level);
                    return redirect('/home'); 
                } 
                else 
                {    
                    echo $level;
                    return redirect('/')->with('failed','Login gagal');
                }
            }
        }
        else
        {
            return redirect('/')->with('failed','Login gagal');
        }
    } catch (\Exception $e) {

        return $e->getMessage();
    }   
    }

    public function logout(Request $request)
    {
        session::forget('login');
        session::flush();
        return redirect('/');
    }
}

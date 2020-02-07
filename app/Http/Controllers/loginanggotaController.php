<?php

namespace App\Http\Controllers;
use App\anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginanggotaController extends Controller
{
    public function login(Request $request) 
    {
        $this->validate($request,

            ['email'=>'required'],

            ['password'=>'required']
            
        );

        $user = $request->email;
        $pass = $request->password;        

        $usersa = DB::table('anggota')->where([['email', $user],['status','aktif'],])->count();
        $users = DB::table('anggota')->where([['email', $user],['status','aktif'],])->first();
        //$jabatan = DB::table('jabatan')->where('id_jabatan',$id)->first();
        //$anggota=count($users);[
        
                if($usersa!=0){
                    if($users->email == $user AND Hash::check($pass, $users->password) ){ 
                        //$users->session()->put('login', 'Selamat anda berhasil login');
                        //$request->session()->put('id',$users->id_anggota);
                        Session::put('login', $users->id_anggota);
                        return redirect('/beranda');
                    } 
                    else 
                    {     
                        return redirect('/loginanggota')->with('failed','Login gagal');
                    }
                }
                else
                {
                    return redirect('/loginanggota')->with('failed','Login gagal');
                }
    }
    
    public function logout(Request $request)
    {
        session::forget('login');
        session::flush();
        return redirect('/loginanggota');
    }
}

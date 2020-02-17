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

        $usersa = DB::table('anggota')->where([['email', $user],])->count();
        $users = DB::table('anggota')->where([['email', $user],])->first();
        //$jabatan = DB::table('jabatan')->where('id_jabatan',$id)->first();
        //$anggota=count($users);[
        $password = $users->status;
                if($usersa!=0){
                    if($password=='reset')
                    {
                        session::put('id',$users->id_anggota);
                        
                        return redirect('/reset');
                    }
                    else
                    {
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
                }
                else
                {
                    return redirect('/loginanggota')->with('failed','Login gagal');
                }
    }

    public function reset()
    {
        if (Session::get('id'))
        {
            return view('/loginanggota/reset');
        }
        else
        {
            return redirect('/loginanggota');
        }
    }

    public function loginreset(request $request)
    {
        $this->validate($request,[
            'password' => 'required',
            'passwordcheck' => 'required'
    	]);
 
        $id = $request->session()->get('id'); 
            $password = $request->password;
            $passwordchange = $request->passwordcheck;
            if($password==$passwordchange)
            {
                DB::table('anggota')-> where('id_anggota', $id)-> update([
                    
                    'password' => hash::make($request->password),
                    'status' =>'aktif'
                ]);
                return redirect('/loginanggota');
            }
            else
            {
                return redirect()->back();
            }
            session::forget('id');
            session::flush('id');
        
    }
    
    public function logout(Request $request)
    {
        session::forget('login');
        session::flush();
        return redirect('/loginanggota');
    }
}

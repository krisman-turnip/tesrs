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
        
            // Validate the value...
        
            $this->validate($request,

                ['email'=>'required'],

                ['password'=>'required']
                
            );
            try {
            $user = $request->email;
            $pass = $request->password;        

            $usersa = DB::table('anggota')->where([['email', $user],])->count();
            $users = DB::table('anggota')->where([['email', $user],])->first();
            //$jabatan = DB::table('jabatan')->where('id_jabatan',$id)->first();
            //$anggota=count($users);[
            $password = $users->status;
            $psw= $users->password;
                    if($usersa!=0){
                        if($password=='reset')
                        {
                            session::put('id',$users->id_anggota);
                            
                            return redirect('/reset');
                        }
                        else if($psw=='0')
                        {
                            session::put('id',$users->id_anggota);
                            
                            return redirect('/set_password');
                        }
                        else if( $password=='tidak aktif')
                        {
                            return redirect('/loginanggota')->with('failed','Login gagal');
                        }
                        else
                        {
                            if($users->email == $user AND Hash::check($pass, $users->password) ){ 
                                //$users->session()->put('login', 'Selamat anda berhasil login');
                                //$request->session()->put('id',$users->id_anggota);
                                Session::put('login', $users->id_anggota);
                                Session::put('name', $users->nama);
                                return redirect('/homeanggota');
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
            catch (\Exception $e) {

                return $e->getMessage();
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

    public function set()
    {
        if (Session::get('id'))
        {
            return view('/loginanggota/set_password');
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
        try {
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
        catch (\Exception $e) {

            return $e->getMessage();
        }
        
    }
    
    public function logout(Request $request)
    {
        session::forget('login');
        session::flush();
        return redirect('/loginanggota');
    }
}

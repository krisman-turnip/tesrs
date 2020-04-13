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

        $usersa = DB::table('tbl_m_user')->where([['username', $user],])->count();
        $users = DB::table('tbl_m_user')->where([['username', $user],])->first();
        //$jabatan = DB::table('jabatan')->where('id_jabatan',$id)->first();
        //$anggota=count($users);[
        $admin = 'admin';
        $date =date('Y-m-d H-i-s');
        if($usersa!=0)
        {
            if($users->username == $user AND  Hash::check($pass, $users->password) ){ 
                //$users->session()->put('login', 'Selamat anda berhasil login');
                //$request->session()->put('id',$users->id_anggota);
                Session::put('login', $users->user_id);
                Session::put('name', $users->username);
                DB::table('tbl_m_user')-> where('username', $user)-> update([
                    'date_login' => $date,
                ]);
                return redirect('/user');
            }
            
            else 
            {    
                return redirect('/')->with('failed','Login gagal');
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

    public function admin($id)
    {
        if (Session::get('login'))
        {
            $users = DB::table('users')->where([['email', $user],['status', 'aktif'],])->first();
            return view('komisi/pembayaran_komisi', ['anggota' => $anggota]);
        }
        else
        {
            return redirect('/');
        }
    }
}

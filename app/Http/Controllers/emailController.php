<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\email;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class emailController extends Controller
{
    public function index()
    {
        if (Session::get('login'))
        {
            return view('email/email');
        }
        else 
        {
            return redirect('/');
        }
    }

    public function emailKirim(request $request)
    {
        // $email = $request->email;
        // try{
        //     // Mail::to('email', ['nama' => $request->judul, 'pesan' => $request->isi], function ($message) use ($request)
        //     // {
        //     //     $email = $request->email;
        //     //     $message->subject($request->judul);
        //     //     $message->from('krisman.andrianus@gmail.com', 'krisman');
        //     //     $message->to($email);
        //     // });
        //     Mail::to($request->get('email'))->send(new email($request->get('isi')));

        //     return back()->with('alert-success','Berhasil Kirim Email');
        // }
        // catch (Exception $e){
        //     return response (['status' => false,'errors' => $e->getMessage()]);
        // }
        // $details = [
        //     'title' => 'Title: Mail from Real Programmer',
        //     'body' => 'Body: This is for testing email using smtp'
        // ];

        // \Mail::to('krisman.andrianus@gmail.com')->send(new email($details));
        // return view('email/email');

        $email = $request->email;
        $data = array(
                'name' => $request->name,
                'email_body' => $request->email_body
            );
        $judul =  $request->name;
        // Kirim Email
        Mail::send('email/emailsend', $data, function($mail) use($email) {
            $mail->to($email, 'no-reply')
                    ->subject("Sample Email Laravel");
            $mail->from('krisman.andrianus@gmail.com', 'Testing');
        });
        email::create([
            'penerima' => $request->email,
            'judul'    => $request->name,
            'body'     => $request->email_body

        ]);

        // Cek kegagalan 
        if (Mail::failures()) {
            return "Gagal mengirim Email";
        }
        return redirect('emailtampil');
    }

    public function emailtampil(request $request)
    { 
        if (Session::get('login'))
        { 
            $email = DB::table('email')->paginate(10);
            return view('email/tampilemail', ['email' => $email]);
        }
        else 
        {
            return redirect('/');
        }
    }
}

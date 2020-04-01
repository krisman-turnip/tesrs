<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class reportController extends Controller
{
    public function reportSukses()
    {
        if (Session::get('login'))
        { 
            return view('report/reportSukses');
        }
        else
        {
            return redirect('/');
        }
    }

    public function reportBatal()
    {
        if (Session::get('login'))
        { 
            return view('report/reportBatal');
        }
        else
        {
            return redirect('/');
        }
    }

    public function reportPending()
    {
        if (Session::get('login'))
        { 
            return view('report/reportPending');
        }
        else
        {
            return redirect('/');
        }
    }

    public function reportPenjualanProduk()
    {
        if (Session::get('login'))
        { 
            return view('report/reportPenjualanProduk');
        }
        else
        {
            return redirect('/');
        }
    }
}

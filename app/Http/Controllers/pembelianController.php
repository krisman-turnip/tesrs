<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\karyawanModel;
use Illuminate\Http\Request;

class pembelianController extends Controller
{
    public function index()
    {
            return view('pembelian/pemesanan_barang');
        
    }

    public function tambah()
    {
            return view('pembelian/pemesanan_barang_tambah');
    }

    public function formapproval()
    {
            return view('pembelian/form_approval');
    }

    public function penerimaanbarang()
    {
            return view('pembelian/penerimaan_barang');
    }

    public function planningpembayaran()
    {
            return view('pembelian/planning_pembayaran');
    }

    public function pembayarankesupplier()
    {
            return view('pembelian/pembayaran_kesupplier');
    }

    public function formpembayaran()
    {
            return view('pembelian/form_pembayaran');
    }
}



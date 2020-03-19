<?php

namespace App\Exports;
use App\transaksi_detail;
use Illuminate\Support\Facades\DB;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromCollection;

class transaksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct( $nama,  $nama_jabatan)
    {
        $this->nama = $nama;
        $this->nama_jabatan = $nama_jabatan;
    }

    public function view(): View
    {   
        $nama=$this->nama;
        $nama_jabatan=$this->nama_jabatan;
            return view('produk/exporttransaksi', [
            'produk' => DB::table('transaksi_detail as a')
            ->select('b.nama','a.id_transaksi_detail','c.nama_produk','a.admin','a.created_at as date','a.nama_customer','a.ktp_customer')
            ->join('anggota as b','a.id_anggota','=','b.id_anggota')
            ->join('produk as c','a.id_produk','=','c.id_produk')
            ->where('a.status','diterima')
            ->whereBetween('a.created_at',[ $nama, $nama_jabatan])
            ->get()

        ]);        
    }
}

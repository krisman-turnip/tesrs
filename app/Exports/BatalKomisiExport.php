<?php

namespace App\Exports;
use App\transaksi_produk;
use Illuminate\Support\Facades\DB;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class BatalKomisiExport implements FromView
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
        return view('komisi/exportKomisiSukses', [
            'komisi' => DB::table('transaksi_produk as a')
            ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','b.nama','c.nama_jabatan','d.nama_produk')
            ->join('anggota as b','b.id_anggota','=','a.id_anggota')
            ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
            ->join('produk as d','d.id_produk','=','a.id_produk')
            ->where([['b.status','aktif'],['a.status','dibatalkan'],])
            ->whereBetween('a.created_at',[ $nama, $nama_jabatan])
            ->get()

        ]);        
    }
}

<?php

namespace App\Exports;

use App\transaksi_produk;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuksesKomisiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $a =(['id','komisi','jumlah']);
        $komisi = DB::table('transaksi_produk as a')
        ->select('a.id_transaksi_produk','a.komisi','a.jumlah','a.created_at','a.admin','b.nama','c.nama_jabatan','d.nama_produk')
        ->join('anggota as b','b.id_anggota','=','a.id_anggota')
        ->join('jabatan as c','c.id_jabatan','=','b.id_jabatan')
        ->join('produk as d','d.id_produk','=','a.id_produk')
        ->where([['b.status','aktif'],['a.status','sudah diproses']])->paginate(20);
        return ($komisi);
    }
}

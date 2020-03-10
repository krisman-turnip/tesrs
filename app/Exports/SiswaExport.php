<?php

namespace App\Exports;

use App\transaksi_produk;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return transaksi_produk::all();
    }
}

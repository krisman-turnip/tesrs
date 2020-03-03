<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomisiTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_anggota');
            $table->integer('id_produk');
            $table->integer('id_transaksi');
            $table->integer('jumlah');
            $table->float('nominal');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komisi_transaksi');
    }
}

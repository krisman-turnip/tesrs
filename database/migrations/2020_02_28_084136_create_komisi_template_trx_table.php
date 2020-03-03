<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomisiTemplateTrxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_template_trx', function (Blueprint $table) {
            $table->bigIncrements('id_komisi_template_trx');
            $table->integer('id_jabatan');
            $table->integer('id_produk');
            $table->integer('id_template_komisi');
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
        Schema::dropIfExists('komisi_template_trx');
    }
}

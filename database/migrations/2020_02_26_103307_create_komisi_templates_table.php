<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomisiTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_template', function (Blueprint $table) {
            $table->bigIncrements('id_template_komisi');
            $table->string('nama_template');
            $table->float('komisi_1');
            $table->float('komisi_2');
            $table->float('komisi_3');
            $table->integer('poin_1');
            $table->integer('poin_2');
            $table->integer('poin_3');
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
        Schema::dropIfExists('komisi_template');
    }
}

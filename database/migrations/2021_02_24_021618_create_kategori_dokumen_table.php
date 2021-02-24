<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_dokumen', function (Blueprint $table) {
            $table->integer('ID_KATEGORI', true);
            $table->integer('ID_JENIS_KATEGORI')->index('FK_MEMPUNYAI');
            $table->string('KATEGORI', 50);
            $table->integer('NOMOR_URUT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_dokumen');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->integer('ID_DOKUMEN', true);
            $table->integer('ID_KATEGORI')->index('FK_MEMPUNYAI3');
            $table->integer('ID_JENIS_DOKUMEN')->index('FK_MEMILIKI3');
            $table->string('NAMA_DOKUMEN', 100);
            $table->integer('NOMOR_URUT');
            $table->text('KETERANGAN')->nullable();
            $table->text('PATH_FILE')->nullable();
            $table->text('LINK_FILE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}

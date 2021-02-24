<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->foreign('ID_JENIS_DOKUMEN', 'FK_MEMILIKI3')->references('ID_JENIS_DOKUMEN')->on('jenis_dokumen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_KATEGORI', 'FK_MEMPUNYAI3')->references('ID_KATEGORI')->on('kategori_dokumen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->dropForeign('FK_MEMILIKI3');
            $table->dropForeign('FK_MEMPUNYAI3');
        });
    }
}

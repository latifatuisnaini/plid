<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKategoriDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_dokumen', function (Blueprint $table) {
            $table->foreign('ID_JENIS_KATEGORI', 'FK_MEMPUNYAI')->references('ID_JENIS_KATEGORI')->on('jenis_kategori_dokumen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_dokumen', function (Blueprint $table) {
            $table->dropForeign('FK_MEMPUNYAI');
        });
    }
}

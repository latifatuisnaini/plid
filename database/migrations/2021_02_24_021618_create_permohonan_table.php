<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->integer('ID_PERMOHONAN', true);
            $table->integer('ID_USER')->index('FK_MENGAJUKAN');
            $table->integer('ID_STATUS')->index('FK_MEMILIKI4');
            $table->integer('NOMOR_URUT');
            $table->string('DOKUMEN_PERMOHONAN', 100);
            $table->text('KETERANGAN');
            $table->timestamp('TANGGAL')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan');
    }
}

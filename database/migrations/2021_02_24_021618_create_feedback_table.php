<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->integer('ID_FEEDBACK', true);
            $table->integer('ID_PERMOHONAN')->index('FK_MELAKUKAN');
            $table->text('KETERANGAN')->nullable();
            $table->string('LINK_DOWNLOAD')->nullable();
            $table->timestamp('TGL_FEEDBACK')->useCurrent()->nullable();
            $table->dateTime('WAKTU_ESTIMASI')->nullable();
            $table->text('KETERANGAN_ESTIMASI')->nullable();
            $table->string('NAMA_FILE')->nullable();
            $table->date('EXPIRED_DATE')->nullable();
            $table->text('KETERANGAN_PENGHITAMAN')->nullable();
            $table->text('PENGUASAAN_INFORMASI')->default('Kami')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}

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
            $table->text('KETERANGAN');
            $table->string('LINK_DOWNLOAD');
            $table->timestamp('TGL_FEEDBACK')->useCurrent();
            $table->dateTime('WAKTU_ESTIMASI');
            $table->string('NAMA_FILE');
            $table->date('EXPIRED_DATE');
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

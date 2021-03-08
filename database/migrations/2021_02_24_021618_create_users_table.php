<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('ID_USER', true);
            $table->boolean('TIPE_USER');
            $table->integer('ID_JENIS_IDENTITAS')->index('FK_MERUPAKAN2')->nullable();
            $table->integer('ID_JENIS_PEMOHON')->index('FK_MERUPAKAN')->nullable();
            $table->string('NOMOR_IDENTITAS', 20)->nullable();
            $table->string('NAMA_LENGKAP', 100);
            $table->string('NPWP', 20)->nullable();
            $table->string('email', 100);
            $table->string('PEKERJAAN', 100)->nullable();
            $table->text('ALAMAT')->nullable();
            $table->string('NO_TLP', 15)->nullable();
            $table->string('NO_FAX', 15)->nullable();
            $table->text('FILE_NPWP')->nullable();
            $table->text('FILE_KTP')->nullable();
            $table->string('password');
            $table->boolean('STATUS_KONFIRMASI')->nullable();
            $table->timestamp('created_at', 0);
            $table->timestamp('updated_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

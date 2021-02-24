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
            $table->integer('ID_JENIS_IDENTITAS')->index('FK_MERUPAKAN2');
            $table->integer('ID_JENIS_PEMOHON')->index('FK_MERUPAKAN');
            $table->string('NOMOR_IDENTITAS', 20);
            $table->string('NAMA_LENGKAP', 100);
            $table->string('NPWP', 20);
            $table->string('EMAIL', 100);
            $table->string('PEKERJAAN', 100);
            $table->text('ALAMAT');
            $table->string('NO_TLP', 15);
            $table->string('NO_FAX', 15);
            $table->string('PASSWORD');
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

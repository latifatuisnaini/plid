<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('ID_JENIS_PEMOHON', 'FK_MERUPAKAN')->references('ID_JENIS_PEMOHON')->on('jenis_pemohon')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_JENIS_IDENTITAS', 'FK_MERUPAKAN2')->references('ID_JENIS_IDENTITAS')->on('jenis_identitas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('FK_MERUPAKAN');
            $table->dropForeign('FK_MERUPAKAN2');
        });
    }
}

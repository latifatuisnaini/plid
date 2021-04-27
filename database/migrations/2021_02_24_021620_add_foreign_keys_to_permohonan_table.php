<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonan', function (Blueprint $table) {
            $table->foreign('ID_STATUS', 'FK_MEMILIKI4')->references('ID_STATUS')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_USER', 'FK_MENGAJUKAN')->references('ID_USER')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_PETUGAS', 'FK_PETUGAS')->references('ID_USER')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permohonan', function (Blueprint $table) {
            $table->dropForeign('FK_MEMILIKI4');
            $table->dropForeign('FK_MENGAJUKAN');
            $table->dropForeign('FK_PETUGAS');
        });
    }
}

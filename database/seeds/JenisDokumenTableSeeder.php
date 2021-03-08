<?php

use Illuminate\Database\Seeder;

class JenisDokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('jenis_dokumen')->delete();
        \DB::table('jenis_dokumen')->insert([
            "JENIS_DOKUMEN" => "View"
        ]);
        \DB::table('jenis_dokumen')->insert([
            "JENIS_DOKUMEN" => "Download"
        ]);
        \DB::table('jenis_dokumen')->insert([
            "JENIS_DOKUMEN" => "View dan Download"
        ]);
        
    }
}
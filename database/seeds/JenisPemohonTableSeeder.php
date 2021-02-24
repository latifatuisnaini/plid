<?php

use Illuminate\Database\Seeder;

class JenisPemohonTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('jenis_pemohon')->delete();
        \DB::table('jenis_pemohon')->insert([
        	"JENIS_PEMOHON" => "PERORANGAN"
        ]);
        \DB::table('jenis_pemohon')->insert([
        	"JENIS_PEMOHON" => "KELOMPOK ORANG"
        ]);
        \DB::table('jenis_pemohon')->insert([
        	"JENIS_PEMOHON" => "BADAN HUKUM"
        ]);
        
    }
}
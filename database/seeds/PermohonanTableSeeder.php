<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PermohonanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permohonan')->delete();
        $faker = Faker::create('id_ID');

        $users = [];
        for ($i = 0; $i < 500; $i++) {
            $users[] = [
                'ID_USER' => rand(5,100),
                'ID_STATUS' => rand(1,4),
                'DOKUMEN_PERMOHONAN' => "Nama dokumen".$i,
                'KETERANGAN' => "Isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen.",
                'TANGGAL' => date('Y-m-d'),
            ];
        }
        DB::table('permohonan')->insert($users);
        
    }
}
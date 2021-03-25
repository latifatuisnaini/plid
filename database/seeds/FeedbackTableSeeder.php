<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FeedbackTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
    
        \DB::table('feedback')->delete();
        $faker = Faker::create('id_ID');
        
        $feedback = [];
        for ($i = 0; $i < 50; $i++) {
            $feedback[] = [
                'ID_PERMOHONAN' => rand(301,400),
                'KETERANGAN' => "isi keterangan feedback".$i,
                'LINK_DOWNLOAD' => "link_download".$i,
                'TGL_FEEDBACK' => date('Y-m-d'),
                'WAKTU_ESTIMASI' => date('Y-m-d'),
                'NAMA_FILE' => "Nama file".$i,
                'EXPIRED_DATE' => date('Y-m-d'),
            ];
        }
        DB::table('feedback')->insert($feedback);

        $feedback2 = [];
        for ($i = 0; $i < 50; $i++) {
            $feedback2[] = [
                'ID_PERMOHONAN' => rand(401,500),
                'KETERANGAN' => "isi keterangan feedback".$i,
                'LINK_DOWNLOAD' => "link_download".$i,
                'TGL_FEEDBACK' => date('Y-m-d'),
                'WAKTU_ESTIMASI' => date('Y-m-d'),
                'NAMA_FILE' => "Nama file".$i,
                'EXPIRED_DATE' => date('Y-m-d'),
            ];
        }
        DB::table('feedback')->insert($feedback2);
        
        
    }
}
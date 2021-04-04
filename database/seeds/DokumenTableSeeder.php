<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dokumen')->delete();
        
        $faker = Faker::create('id_ID');
        
        $dokumen = [];
        $j=1;
        for ($i = 0; $i < 100; $i++) {
            $dokumen[] = [
                'ID_KATEGORI' => rand(1,8),
                'ID_JENIS_DOKUMEN' => rand(1,3),
                'NAMA_DOKUMEN' => "Nama dokumen".$i,
                'NOMOR_URUT' => $j,
                'KETERANGAN' => "Keterangan".$i,
                'PATH_FILE' => '#',
                'LINK_FILE' => '#',
            ];
            if($j==5){
                $j=0;
            }
            $j++;
        }
        \DB::table('dokumen')->insert($dokumen);
        
        
    }
}
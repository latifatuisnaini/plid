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
        $id_k = 1;
        for ($i = 0; $i < 40; $i++) {
            $dokumen[] = [
                'ID_KATEGORI' => $id_k,
                'ID_JENIS_DOKUMEN' => rand(1,3),
                'NAMA_DOKUMEN' => "Nama dokumen".$i,
                'NOMOR_URUT' => $j,
                'KETERANGAN' => "Keterangan".$i,
                'PATH_FILE' => '#',
                'LINK' => '#',
            ];
            if($j==5){
                $j=0;
                $id_k++;
            }
            $j++;
        }
        \DB::table('dokumen')->insert($dokumen);
        
        
    }
}
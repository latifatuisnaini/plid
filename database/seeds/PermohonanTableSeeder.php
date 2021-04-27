<?php

use Illuminate\Database\Seeder;
use App\Models\Permohonan;
use Carbon\Carbon;
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

        // $users = [];
        // for ($i = 0; $i < 500; $i++) {
        //     $users[] = [
        //         'ID_USER' => rand(5,100),
        //         'ID_STATUS' => rand(1,4),
        //         'DOKUMEN_PERMOHONAN' => "Nama dokumen".$i,
        //         'KETERANGAN' => "Isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen.",
        //         'TANGGAL' => date('Y-m-d'),
        //     ];
        // }
        $users = [];
        for ($i = 0; $i < 200; $i++) {
            $users[] = [
                'ID_USER' => rand(5,100),
                'ID_STATUS' => 1,
                'NOMOR_URUT' => $i+1,
                'DOKUMEN_PERMOHONAN' => "Nama dokumen".$i,
                'KETERANGAN' => "Isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen.",
                'TANGGAL' => date('Y-m-d'),
                'ID_PETUGAS' => 1,
            ];
        }
        DB::table('permohonan')->insert($users);

        $users2 = [];
        for ($j = 200; $j < 300; $j++) {
            $users2[] = [
                'ID_USER' => rand(5,100),
                'ID_STATUS' => 2,
                'NOMOR_URUT' =>  $j+1,
                'DOKUMEN_PERMOHONAN' => "Nama dokumen".$j,
                'KETERANGAN' => "Isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen.",
                'TANGGAL' => date('Y-m-d'),
                'ID_PETUGAS' => 1,
            ];
        }
        DB::table('permohonan')->insert($users2);

        $users3 = [];
        for ($k = 300; $k < 400; $k++) {
            $users3[] = [
                'ID_USER' => rand(5,100),
                'ID_STATUS' => 3,
                'NOMOR_URUT' => $k+1,
                'DOKUMEN_PERMOHONAN' => "Nama dokumen".$k,
                'KETERANGAN' => "Isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen.",
                'TANGGAL' => date('Y-m-d'),
                'ID_PETUGAS' => 1,
            ];
        }
        DB::table('permohonan')->insert($users3);

        $users4 = [];
        for ($l = 400; $l < 500; $l++) {
            $users4[] = [
                'ID_USER' => rand(5,100),
                'ID_STATUS' => 4,
                'NOMOR_URUT' => $l+1,
                'DOKUMEN_PERMOHONAN' => "Nama dokumen".$l,
                'KETERANGAN' => "Isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen isi keterangan dokumen.",
                'TANGGAL' => date('Y-m-d'),
                'ID_PETUGAS' => 1,
            ];
        }
        DB::table('permohonan')->insert($users4);
        
    }
}
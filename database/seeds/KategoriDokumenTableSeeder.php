<?php

use Illuminate\Database\Seeder;

class KategoriDokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kategori_dokumen')->delete();
        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik',
            'ID_JENIS_KATEGORI' => 1,
            'NOMOR_URUT' => 1,
            'STATUS' => 1
        ]);

        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik I',
            'ID_JENIS_KATEGORI' => 1,
            'NOMOR_URUT' => 2,
            'STATUS' => 1
        ]);

        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik II',
            'ID_JENIS_KATEGORI' => 1,
            'NOMOR_URUT' => 3,
            'STATUS' => 1
        ]);

        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik III',
            'ID_JENIS_KATEGORI' => 1,
            'NOMOR_URUT' => 4,
            'STATUS' => 1
        ]);
        
        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik A',
            'ID_JENIS_KATEGORI' => 2,
            'NOMOR_URUT' => 1,
            'STATUS' => 1
        ]);

        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik B',
            'ID_JENIS_KATEGORI' => 2,
            'NOMOR_URUT' => 2,
            'STATUS' => 1
        ]);

        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik C',
            'ID_JENIS_KATEGORI' => 2,
            'NOMOR_URUT' => 3,
            'STATUS' => 1
        ]);

        \DB::table('kategori_dokumen')->insert([
            'KATEGORI' => 'Peraturan Mengenai Keterbukaan Informasi Publik D',
            'ID_JENIS_KATEGORI' => 2,
            'NOMOR_URUT' => 4,
            'STATUS' => 1
        ]);
    }
}
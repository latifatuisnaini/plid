<?php

use Illuminate\Database\Seeder;

class JenisKategoriDokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('jenis_kategori_dokumen')->delete();
        \DB::table('jenis_kategori_dokumen')->insert([
            "JENIS_KATEGORI" => "Regulasi"
        ]);
        \DB::table('jenis_kategori_dokumen')->insert([
            "JENIS_KATEGORI" => "Informasi yang wajib disediakan dan diumumkan secara berkala"
        ]);
        \DB::table('jenis_kategori_dokumen')->insert([
            "JENIS_KATEGORI" => "Informasi yang wajib disediakan dan diumumkan secara serta-merta
            "
        ]);
        \DB::table('jenis_kategori_dokumen')->insert([
            "JENIS_KATEGORI" => "Informasi Yang Wajib Sedia Setiap Saat"
        ]);
        
        
        
    }
}
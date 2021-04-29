<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JenisDokumenTableSeeder::class);
        $this->call(JenisIdentitasTableSeeder::class);
        $this->call(JenisKategoriDokumenTableSeeder::class);
        $this->call(JenisPemohonTableSeeder::class);
        $this->call(KategoriDokumenTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DokumenTableSeeder::class);
        $this->call(PermohonanTableSeeder::class);
        $this->call(FeedbackTableSeeder::class);
        $this->call(FaqSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('faq')->delete();
        \DB::table('faq')->insert([
            "QUESTION" => "Siapa yang dapat mengajukan permohonan informasi publik?"
        ]);
        \DB::table('faq')->insert([
            "QUESTION" => "Bagaimana cara mengajukan permohonan informasi?"
        ]);
        \DB::table('faq')->insert([
            "QUESTION" => "Apakah persyaratan pengajuan permohonan informasi dan pengajuan keberatan atas tanggapan PPID?"
        ]);
        \DB::table('faq')->insert([
            "ANSWER" => "Setiap warga negara dan/atau badan hukum Indonesia sebagaimana diatur dalam Undang-Undang Republik Indonesia Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik."
        ]);
        \DB::table('faq')->insert([
            "ANSWER" => "Pemohon informasi dapat datang langsung ke kantor PT PAL Indonesia (Persero) untuk melakukan pengisian formulir permintaan informasi dan/atau melakukan permohonan informasi melalui aplikasi e-ppid dengan melakukan registrasi terlebih dahulu. Pemohon informasi wajib memenuhi persyaratan yang ditentukan."
        ]);
        \DB::table('faq')->insert([
            "ANSWER" => "Melampirkan Kartu Tanda Penduduk untuk pemohon dari individu atau Akta Pendirian Badan Hukum untuk pemohon dari badan hukum serta formulir permohonan informasi dan jawaban PPID untuk pengajuan keberatan."
        ]);


    }
}

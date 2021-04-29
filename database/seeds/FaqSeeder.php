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
            "ID_FAQ" => "1",
            "QUESTION" => "Siapa yang dapat mengajukan permohonan informasi publik?",
            "ANSWER" => "Setiap warga negara dan/atau badan hukum Indonesia sebagaimana diatur dalam Undang-Undang Republik Indonesia Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik."
        ]);
        \DB::table('faq')->insert([
            "ID_FAQ" => "2",
            "QUESTION" => "Bagaimana cara mengajukan permohonan informasi?",
            "ANSWER" => "Pemohon informasi dapat datang langsung ke kantor PT PAL Indonesia (Persero) untuk melakukan pengisian formulir permintaan informasi dan/atau melakukan permohonan informasi melalui aplikasi e-ppid dengan melakukan registrasi terlebih dahulu. Pemohon informasi wajib memenuhi persyaratan yang ditentukan."
        ]);
        \DB::table('faq')->insert([
            "ID_FAQ" => "3",
            "QUESTION" => "Apakah persyaratan pengajuan permohonan informasi dan pengajuan keberatan atas tanggapan PPID?",
            "ANSWER" => "Melampirkan Kartu Tanda Penduduk untuk pemohon dari individu atau Akta Pendirian Badan Hukum untuk pemohon dari badan hukum serta formulir permohonan informasi dan jawaban PPID untuk pengajuan keberatan."
        ]);


    }
}

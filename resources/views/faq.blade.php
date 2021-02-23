@extends('layout')
@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="list"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> FAQ</h2>
</div>
@endsection
@section('content')
<div class="overflow-x-auto">
    <table class="table mt-5">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="whitespace-no-wrap">No.</th>
                <th class="whitespace-no-wrap">FAQ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-b dark:border-dark-5">1</td>
                <td class="border-b dark:border-dark-5">Q : Siapa yang dapat mengajukan permohonan informasi publik?</td>
            </tr>
            <tr>
                <td class="border-b dark:border-dark-5"></td>
                <td class="border-b dark:border-dark-5">A : Setiap warga negara dan/atau badan hukum Indonesia sebagaimana diatur dalam Undang-Undang Republik Indonesia Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. </td>
                </td>
            </tr>
            <tr>
                <td class="border-b dark:border-dark-5">2</td>
                <td class="border-b dark:border-dark-5">Q : Bagaimana cara mengajukan permohonan informasi?</td>
            </tr>
            <tr>
                <td class="border-b dark:border-dark-5"></td>
                <td class="border-b dark:border-dark-5">A : Pemohon informasi dapat datang langsung ke kantor Pelindo III untuk melakukan pengisian formulir permintaan informasi dan/atau melakukan permohonan informasi melalui aplikasi e-ppid dengan melakukan registrasi terlebih dahulu. Pemohon informasi wajib memenuhi persyaratan yang ditentukan. </td>
                </td>
            </tr>
            <tr>
                <td class="border-b dark:border-dark-5">3</td>
                <td class="border-b dark:border-dark-5">Q : Apakah persyaratan pengajuan permohonan informasi dan pengajuan keberatan atas tanggapan PPID?</td>
            </tr>
            <tr>
                <td class="border-b dark:border-dark-5"></td>
                <td class="border-b dark:border-dark-5">A : Melampirkan Kartu Tanda Penduduk untuk pemohon dari individu atau Akta Pendirian Badan Hukum untuk pemohon dari badan hukum serta formulir permohonan informasi dan jawaban PPID untuk pengajuan keberatan. </td>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
</div>
@endsection
@extends('layout')

@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="users"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> REGISTRASI PERMOHONAN</h2>
</div>
@endsection

@section('content')
    <p class="col-md-12">
		<i>
			Formulir ini digunakan untuk registrasi pemohon. Dengan mendaftar di Sistem Informasi PPID, pemohon mendapatkan kemudahan dalam mengajukan permohonan informasi maupun pengajuan keberatan secara online. Pemohon dinyatakan berhasil mendaftar apabila telah memenuhi semua kelengkapan yang dibutuhkan dan mendapatkan email komfirmasi dari pengelola Sistem Informasi PPID.
		</i>
	</p>
            <div class="p-3" id="horizontal-form">
                <div class="preview">
                    <div class="flex flex-col sm:flex-row items-center mt-3">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Jenis Pemohon</label>
                        <select class="input border border-gray-500 mt-3 flex-1">
                            <option>PERORANGAN</option>
                            <option>KELOMPOK ORANG</option>
                            <option>BADAN HUKUM</option>
                        </select>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Jenis Identitas</label>
                        <select class="input border border-gray-500 mt-3 flex-1">
                            <option>KTP</option>
                            <option>PENGESAHAN BADAN USAHA</option>
                            <option>SURAT KUASA</option>
                            <option>BADAN PUBLIK</option>
                        </select>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center flex-auto mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Nomor Identitas</label>
                            <input type="password" class="input border border-gray-500 mt-2 flex-1" >
                    </div>
                    <div class="flex flex-col sm:flex-row items-center flex-auto mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Nama Lengkap</label>
                            <input type="password" class="input border border-gray-500 mt-2 flex-1" >
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">NPWP</label>
                            <input type="password" class="input w-full border border-gray-500 mt-2 flex-1" >
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Email *</label>
                            <input type="email" class="input w-full border border-gray-500 mt-2 flex-1" >
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Pekerjaan</label>
                            <input type="password" class="input w-full border border-gray-500 mt-2 flex-1">
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Alamat</label>
                            <textarea class="input w-full border border-gray-500 mt-2 flex-1"></textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">No Telp</label>
                            <input type="password" class="input w-full border border-gray-500 mt-2 flex-1">
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">No Fax</label>
                            <input type="password" class="input w-full border border-gray-500 mt-2 flex-1">
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Password</label>
                            <input type="password" class="input w-full border border-gray-500 mt-2 flex-1">
                    </div>
                    <button type="cancel" class="button bg-theme-1 text-white mt-5">Cancel</button>
                    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>
                    
                </div>
                <div class="source-code hidden">
                    <button data-target="#copy-vertical-form" class="copy-code button button--sm border flex items-center text-gray-700 dark:border-dark-5 dark:text-gray-300"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                    <div class="overflow-y-auto h-64 mt-3">
                        <pre class="source-preview" id="copy-vertical-form"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTagdivHTMLCloseTag HTMLOpenTaglabelHTMLCloseTagEmailHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;email&quot; class=&quot;input w-full border mt-2&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-3&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagPasswordHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;password&quot; class=&quot;input w-full border mt-2&quot; placeholder=&quot;secret&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;flex items-center text-gray-700 dark:text-gray-500 mt-5&quot;HTMLCloseTag HTMLOpenTaginput type=&quot;checkbox&quot; class=&quot;input border mr-2&quot; id=&quot;vertical-remember-me&quot;HTMLCloseTag HTMLOpenTaglabel class=&quot;cursor-pointer select-none&quot; for=&quot;vertical-remember-me&quot;HTMLCloseTagRemember meHTMLOpenTag/labelHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;button bg-theme-1 text-white mt-5&quot;HTMLCloseTagLoginHTMLOpenTag/buttonHTMLCloseTag </code> </pre>
                    </div>
                </div>
            </div>
@endsection
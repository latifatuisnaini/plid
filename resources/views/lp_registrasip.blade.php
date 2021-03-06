@extends('layout')

@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="users"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> REGISTRASI PERMOHONAN</h2>
</div>

@endsection

@section('content')
@if(Session::has('alert_sukses'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-green-300 dark:text-gray-400"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{@session('alert_sukses') }}</div>
@endif
    <p class="col-md-12">
		<i>
			Formulir ini digunakan untuk registrasi pemohon. Dengan mendaftar di Sistem Informasi PPID, pemohon mendapatkan kemudahan dalam mengajukan permohonan informasi maupun pengajuan keberatan secara online. Pemohon dinyatakan berhasil mendaftar apabila telah memenuhi semua kelengkapan yang dibutuhkan dan mendapatkan email konfirmasi dari pengelola Sistem Informasi PPID.
		</i>
	</p>
    <form action="{{ url('/lp_registrasip/store') }}" method="post">
                    @csrf
            <div class="p-3" id="horizontal-form">
                <div class="preview">
                    
                    <div class="flex flex-col sm:flex-row items-center mt-3">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Jenis Pemohon</label>
                        <select name="jenis_pemohon" class="input border border-gray-500 mt-3 flex-1">
                            @foreach($jenis_pemohon as $jp)
                            <option value="{{ $jp->ID_JENIS_PEMOHON }}">{{ $jp->JENIS_PEMOHON }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Jenis Identitas</label>
                        <select name="jenis_identitas" class="input border border-gray-500 mt-3 flex-1">
                            @foreach($jenis_identitas as $ji)
                            <option value="{{ $ji->ID_JENIS_IDENTITAS }}">{{ $ji->JENIS_IDENTITAS }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center flex-auto mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Nomor Identitas</label>
                            <input type="text" name="nomor_identitas" class="input border border-gray-500 mt-2 flex-1" required >
                    </div>
                    <div class="flex flex-col sm:flex-row items-center flex-auto mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="input border border-gray-500 mt-2 flex-1"required >
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">NPWP</label>
                            <input type="text" name="NPWP" class="input w-full border border-gray-500 mt-2 flex-1" required>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Email *</label>
                            <input type="email" name="email_pemohon" class="input w-full border border-gray-500 mt-2 flex-1" required>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="input w-full border border-gray-500 mt-2 flex-1" required>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Alamat</label>
                            <textarea name="alamat" class="input w-full border border-gray-500 mt-2 flex-1" required></textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">No Telp</label>
                            <input type="number" name="no_tlp" class="input w-full border border-gray-500 mt-2 flex-1" required>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">No Fax</label>
                            <input type="number" name="no_fax" class="input w-full border border-gray-500 mt-2 flex-1" required>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-4">
                        <label class="w-full sm:w-20 sm:text-left sm:mr-12">Password</label>
                            <input type="password" name="password_pemohon" class="input w-full border border-gray-500 mt-2 flex-1" required>
                    </div>
                    <br>
                    <button type="cancel" class="button bg-theme-1 text-white mt-4">Cancel</button>
                    <button class="button bg-theme-1 text-white mt-4">Submit</button>
                 
                   
                    
                </div>
                <div class="source-code hidden">
                    <button data-target="#copy-vertical-form" class="copy-code button button--sm border flex items-center text-gray-700 dark:border-dark-5 dark:text-gray-300"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                    <div class="overflow-y-auto h-64 mt-3">
                        <pre class="source-preview" id="copy-vertical-form"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTagdivHTMLCloseTag HTMLOpenTaglabelHTMLCloseTagEmailHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;email&quot; class=&quot;input w-full border mt-2&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-3&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagPasswordHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;password&quot; class=&quot;input w-full border mt-2&quot; placeholder=&quot;secret&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;flex items-center text-gray-700 dark:text-gray-500 mt-5&quot;HTMLCloseTag HTMLOpenTaginput type=&quot;checkbox&quot; class=&quot;input border mr-2&quot; id=&quot;vertical-remember-me&quot;HTMLCloseTag HTMLOpenTaglabel class=&quot;cursor-pointer select-none&quot; for=&quot;vertical-remember-me&quot;HTMLCloseTagRemember meHTMLOpenTag/labelHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;button bg-theme-1 text-white mt-5&quot;HTMLCloseTagLoginHTMLOpenTag/buttonHTMLCloseTag </code> </pre>
                    </div>
                </div>
            </div>
            </form>
@endsection
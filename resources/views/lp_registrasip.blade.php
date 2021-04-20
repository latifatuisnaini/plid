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
    
            <div class="p-3">
                <div class="preview">
                    <form action="{{ url('/lp_registrasip/store') }}"  method="post" >
                     @csrf
                        <div class="flex flex-col sm:flex-row items-center mt-3 ">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Jenis Pemohon</label>
                            <select name="jenis_pemohon" class="input border border-gray-500 mt-3 flex-1">
                                @foreach($jenis_pemohon as $jp)
                                <option value="{{ $jp->ID_JENIS_PEMOHON }}">{{ $jp->JENIS_PEMOHON }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center mt-4 ">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Jenis Identitas</label>
                            <select name="jenis_identitas" class="input border border-gray-500 mt-3 flex-1">
                                @foreach($jenis_identitas as $ji)
                                <option value="{{ $ji->ID_JENIS_IDENTITAS }}">{{ $ji->JENIS_IDENTITAS }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center flex-auto mt-4 input-form ">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Nomor Identitas</label>
                            <input type="text" name="nomor_identitas" class="input border border-gray-500 mt-2 flex-1 " value="{{ @old('nomor_identitas') }}"  required >
                        </div>
                            @if($errors->has('nomor_identitas'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Nomor identitas wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center flex-auto mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="input border border-gray-500 mt-2 flex-1" value="{{ @old('nama_lengkap') }}"  required >
                        </div>
                            @if($errors->has('nama_lengkap'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Nama lengkap wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">NPWP</label>
                            <input type="text" name="NPWP" class="input w-full border border-gray-500 mt-2 flex-1" value="{{ @old('NPWP') }}">
                        </div>
                            @if($errors->has('NPWP'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">NPWP wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form @error('email_pemohon') has-error @enderror">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Email *</label>
                            <input type="email" name="email_pemohon" class="input w-full border border-gray-500 mt-2 flex-1" value="{{ @old('email_pemohon') }}"  required>
                        </div>
                            @if($errors->has('email_pemohon'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Email wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="input w-full border border-gray-500 mt-2 flex-1" value="{{ @old('pekerjaan') }}"  required>
                        </div>
                            @if($errors->has('pekerjaan'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Pekerjaan wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Alamat</label>
                            <textarea name="alamat" class="input w-full border border-gray-500 mt-2 flex-1" required> {{@old('alamat')}}</textarea>
                        </div>
                            @if($errors->has('alamat'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Alamat wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">No Telp</label>
                            <input type="number" name="no_tlp" class="input w-full border border-gray-500 mt-2 flex-1" value="{{ @old('no_tlp') }}"  required>
                        </div>
                            @if($errors->has('no_tlp'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Nomor telepon wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">No Fax</label>
                            <input type="number" name="no_fax" class="input w-full border border-gray-500 mt-2 flex-1" value="{{ @old('no_fax') }}"  required>
                        </div>
                            @if($errors->has('no_fax'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Nomor fax wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <div class="flex flex-col sm:flex-row items-center mt-4 input-form">
                            <label class="w-full sm:w-20 sm:text-left sm:mr-12">Password</label>
                            <input type="password" name="password_pemohon" class="input w-full border border-gray-500 mt-2 flex-1" value="{{ @old('password_pemohon') }}"  required>
                        </div>
                            @if($errors->has('password_pemohon'))
                            <div class="flex flex-col sm:flex-row items-center flex-auto mt-1 input-form ">
                                <label class="w-full sm:w-20 sm:text-left sm:mr-12"></label>
                                <small class="text-theme-6">Password wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                        <br>
                        <button type="button" class="button bg-theme-1 text-white mt-4 ">Cancel</button>
                        <button type="submit" class="button bg-theme-1 text-white mt-4">Submit</button>
                    </form>
                    
                </div>
                
            </div>
            
@endsection

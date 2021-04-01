<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Sudah Dikonfirmasi</title>
	<link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/css/app.css'}}" >
    <link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/images/logo-pal.png'}}" >
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<style type="text/css">
        h3 {
            color: black; 
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
        }
        table,tr,th, td{
            border: 1pt solid black;
            border-collapse: collapse;
        }
        th, td{
            padding: 5px;
            font-size: 9pt;
        }
	    th{
            color: black;
            font-size: 10pt;
        } 
	</style>
    
    <img src="{{ public_path('dist/images/logo-pal.png') }}" style="width:8rem;"> 
    <span style="font-size: 20px; color: #03428b; font-family: 'Lato', sans-serif;  display: inline-block; margin-left: 10px; font-weight: 400;">PT. PAL Indonesia (Persero)</span>

    <h3>Daftar Permohonan User yang Sudah Dikonfirmasi</h3>

    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

        <div class="col-span-12 sm:col-span-6 hidden"> 
            <label class="font-semibold text-lg">Nomor Identitas</label>
            <div class="text-base">{{ $user->ID_USER }}</div>
        </div>
        
        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Nomor Identitas</label>
            <div class="text-base">{{ $user->NOMOR_IDENTITAS }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">NPWP</label>
            <div class="text-base">{{ $user->NPWP }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Nama Lengkap</label>
            <div class="text-base">{{ $user->NAMA_LENGKAP }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Email</label>
            <div class="text-base">{{ $user->email }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6">
            <label class="font-semibold text-lg">Pekerjaan</label>
            <div class="text-base">{{ $user->PEKERJAAN }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Alamat</label>
            <div class="text-base">{{ $user->ALAMAT }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6">
            <label class="font-semibold text-lg">No.Telp</label>
            <div class="text-base">{{ $user->NO_TLP }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6">
            <label class="font-semibold text-lg">No.Fax</label>
            <div class="text-base">{{ $user->NO_FAX }}</div>
        </div>
    </div>
 
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>bla bla bla bla</title>
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

    <h3>bla bla bla</h3>

    <div class="container w-full ">
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            @foreach($permohonan as $p)
            
            <div class="col-span-12 sm:col-span-6"> 
                <label class="font-semibold text-lg">Nomor Identitas</label>
                <div class="text-base">{{ $p->user->NOMOR_IDENTITAS }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6"> 
                <label class="font-semibold text-lg">NPWP</label>
                <div class="text-base">{{ $p->user->NPWP }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6"> 
                <label class="font-semibold text-lg">Nama Lengkap</label>
                <div class="text-base">{{ $p->user->NAMA_LENGKAP }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6"> 
                <label class="font-semibold text-lg">Email</label>
                <div class="text-base">{{ $p->user->email }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6">
                <label class="font-semibold text-lg">Pekerjaan</label>
                <div class="text-base">{{ $p->user->PEKERJAAN }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6"> 
                <label class="font-semibold text-lg">Alamat</label>
                <div class="text-base">{{ $p->user->ALAMAT }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6">
                <label class="font-semibold text-lg">No.Telp</label>
                <div class="text-base">{{ $p->user->NO_TLP }}</div>
            </div><br>

            <div class="col-span-12 sm:col-span-6">
                <label class="font-semibold text-lg">No.Fax</label>
                <div class="text-base">{{ $p->user->NO_FAX }}</div>
            </div><br>
            @endforeach
        </div>
    </div>

        <br><br>
    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Nama Dokumen</label>
            <div class="text-base">{{ $p->DOKUMEN_PERMOHONAN }}</div>
        </div><br>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Keterangan Dokumen</label>
            <div class="text-base">{{ $p->KETERANGAN }}</div>
        </div><br>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Status</label>
            @if($p->ID_STATUS == 3)
                <div class="text-base">
                <div class="flex items-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                </div>
            @else
                <div class="text-base">
                <div class="flex items-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                </div>
            @endif
            <!-- <div class="text-base">{{ $p->status->STATUS }}</div> -->
        </div>
    </div>
 
</body>
</html>
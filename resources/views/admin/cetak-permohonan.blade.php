<!DOCTYPE html>
<html>
<head>
	<title>Cetak Permohonan User</title>
	<link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/css/app.css'}}" >
    <link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/images/logo-pal.png'}}" >
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<style type="text/css">
        h3 {
            color: black; 
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 12pt;
        }
        h4 {
            color: black; 
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            text-decoration: underline;
            font-size: 10pt;
            line-height: 1px;
        }
        .foot1 {
            font-size: 9pt;
            text-align: center;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            line-height: 2px;
        }
        .foot2 {
            font-size: 7pt;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            line-height: 2px;
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
        footer{
            position: fixed;
            bottom: 0px; 
            left: 0px; 
            right: 0px;
            height: 40px;
        } 
        header{
            position: fixed;
            top: 0px; 
            left: 0px; 
            right: 0px;
            height: 50px;
        }
	</style>
    
    <header>
        <img src="{{ public_path('dist/images/logo-pal.png') }}" style="width:8rem; float:right"> 
        <img src="{{ public_path('dist/images/logo_bumn.png') }}" style="width:9rem; float:left"> 
    </header>

    <br><br><br>

    <footer>
        <p class="foot1">PT PAL INDONESIA (PERSERO)</p>
        <p class="foot2">Kantor Pusat : UJUNG, SURABAYA 60155, PO BOX 1134 INDONESIA</p>
        <p class="foot2">Telp. : +62-31-3292275 (HUNTING) FAX : +62-31-3292530, 3292493, 3292516 E-mail : headoffice@pal.co.id Web Site : http//www.pal.co.id</p>
        <p class="foot2">Kantor Perwakilan : JL.TANAH ABANG II/27, JAKARTA 10160, PHONE : +62-21-3846833, FAX : +62-21-3843717 E-mail : jakartabranch@pal.co.id</p>
    </footer>

    <main>
        <h3>LEMBAR PERMOHONAN INFORMASI DAN DOKUMEN USER</h3>
        <h4>PUSAT PELAYANAN INFORMASI DAN DOKUMENTASI</h4>
        @foreach($user as $p)
        <div class="container ">
            <div class="row">
                <div class="col-sm-12">
                    
                <div class="col-span-6"> 
                    <label class="font-semibold text-lg">Nomor Identitas</label>
                    <div class="text-base">{{ $p->user->NOMOR_IDENTITAS }}</div>
                </div><br>

                <div class="col-span-6"> 
                    <label class="font-semibold text-lg">NPWP</label>
                    <div class="text-base">{{ $p->user->NPWP }}</div>
                </div><br>

                <div class="col-sm-6"> 
                    <label class="font-semibold text-lg">Nama Lengkap</label>
                    <div class="text-base">{{ $p->user->NAMA_LENGKAP }}</div>
                </div><br>

                <div class="col-sm-6"> 
                    <label class="font-semibold text-lg">Email</label>
                    <div class="text-base">{{ $p->user->email }}</div>
                </div><br>

                <div class="col-sm-6">
                    <label class="font-semibold text-lg">Pekerjaan</label>
                    <div class="text-base">{{ $p->user->PEKERJAAN }}</div>
                </div><br>

                <div class="col-sm-6"> 
                    <label class="font-semibold text-lg">Alamat</label>
                    <div class="text-base">{{ $p->user->ALAMAT }}</div>
                </div><br>

                <div class="col-sm-6">
                    <label class="font-semibold text-lg">No.Telp</label>
                    <div class="text-base">{{ $p->user->NO_TLP }}</div>
                </div><br>

                <div class="col-sm-6">
                    <label class="font-semibold text-lg">No.Fax</label>
                    <div class="text-base">{{ $p->user->NO_FAX }}</div>
                </div><br>

                </div>
                
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
        @endforeach
    </main>

</body>
</html>
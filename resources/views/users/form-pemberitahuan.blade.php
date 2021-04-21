<!DOCTYPE html>
<html>
<head>
	<title>Formulir Permohonan</title>
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
            font-size: 14pt;
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
        .foot3 {
            font-size: 9pt;
            text-align: center;
            font-style: italic;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            line-height: 2px;
        }
        .foot4 {
            font-size: 12pt;
            text-align: right;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
        table,tr,th, td{
            /* border: 1pt solid none; */
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }
        th, td{
            padding: 5px;
            font-size: 12pt;
        }
	    th{
            padding: 5px;
            color: black;
            font-size: 15pt;
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
        <h3>PEMBERITAHUAN TERTULIS</h3>
        <!-- <h4>PUSAT PELAYANAN INFORMASI DAN DOKUMENTASI</h4> -->
        <p class="foot4">Surabaya, {{ date('d F Y',strtotime($pemberitahuan->TANGGAL)) }}</p>

        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <tbody>
                <tr>
                    <td colspan="4">Berdasarkan permohonan Informasi pada tanggal {{ date('d',strtotime($pemberitahuan->TANGGAL)) }} bulan {{ date('F',strtotime($pemberitahuan->TANGGAL)) }} tahun {{ date('Y',strtotime($pemberitahuan->TANGGAL)) }} dengan nomor pendaftaran* {{$pemberitahuan->ID_PERMOHONAN}} Kami menyampaikan kepada Saudara/i</td>
                </tr>
                <tr>
                    <td width="30%" style="font-weight:bold">Nama</td>
                    <td width="2%">:</td>
                    <td colspan="2">{{ $pemberitahuan->user->NAMA_LENGKAP }}</td>
                </tr>
                <tr>
                    <td width="30%" style="font-weight:bold">Alamat</td>
                    <td width="2%">:</td>
                    <td colspan="2">{{ $pemberitahuan->user->ALAMAT }}</td>
                </tr>
                <tr>
                    <td width="30%" style="font-weight:bold">Nomor Telepon/Email</td>
                    <td width="2%">:</td>
                    <td colspan="2">{{ $pemberitahuan->user->NO_TLP }} / {{ $pemberitahuan->user->email }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">Pemberitahuan sebagai berikut:</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-weight: bold;">A. Informasi dapat diberikan</td>
                    <!-- <td width="98%" colspan="3" style="font-weight: bold; text-align:left"></td> -->
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em; border:1pt solid black;">   
            <tbody>
                <tr>
                    <td>No.</td>
                    <td>Hal-hal Terkait Informasi Publik</td>
                    <td colspan="2">Keterangan</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Tanggal Estimasi</td>
                    <td colspan="2">{{ $pemberitahuan->feedback->WAKTU_ESTIMASI }}</td>
                </tr>
            </tbody>
        </table>

    </main>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Formulir Permohonan</title>
	<link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/css/app.css'}}" >
    <link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/images/logo-pal.png'}}" >
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
            font-size: 10pt;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            line-height: 20px;
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
        <h3>FORMULIR PERMOHONAN INFORMASI PUBLIK</h3>
        <h4>PUSAT PELAYANAN INFORMASI DAN DOKUMENTASI</h4>
        <p class="foot4">No. Pendaftaran : {{ $permohonan->NOMOR_URUT }}/E-PPID/{{ date('m',strtotime($permohonan->TANGGAL)) }}/{{ date('Y',strtotime($permohonan->TANGGAL)) }}</p>
        <br>

        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <tbody>
                <tr>
                    <td width="40%">Nama</td>
                    <td width="2%">:</td>
                    <td>{{ $permohonan->user->NAMA_LENGKAP }}</td>
                </tr>
                <tr>
                    <td width="40%">Alamat</td>
                    <td width="2%">:</td>
                    <td>{{ $permohonan->user->ALAMAT }}</td>
                </tr>
                <tr>
                    <td width="40%">Nomor Telepon/Email</td>
                    <td width="2%">:</td>
                    <td>{{ $permohonan->user->NO_TLP }} / {{ $permohonan->user->email }}</td>
                </tr>
                <tr>
                    <td width="40%" style="vertical-align: top;">Rincian Informasi yang Dibutuhkan</td>
                    <td width="2%" style="vertical-align: top;">:</td>
                    <td>{{ $permohonan->DOKUMEN_PERMOHONAN }}</td>
                </tr>
                <tr>
                    <td width="40%" style="vertical-align: top;">Tujuan Penggunaan Informasi</td>
                    <td width="2%" style="vertical-align: top;">:</td>
                    <td>{{ $permohonan->KETERANGAN }}</td>
                </tr>
                <tr>
                    <td width="40%">Cara Memperoleh Informasi</td>
                    <td width="2%">:</td>
                    <td>Mendapatkan salinan informasi berupa softcopy</td>
                </tr>
                <tr>
                    <td width="40%">Cara Mendapatkan Salinan Informasi</td>
                    <td width="2%">:</td>
                    <td style="vertical-align:middle">
                        Melalui Aplikasi E-PPID
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">   
            <tbody>
                <tr>
                    <td colspan="4" style=" font-size: 12pt; text-align:right">Surabaya, {{ date('d F Y',strtotime($permohonan->TANGGAL)) }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center;">Petugas Penerima Permohonan</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">Pemohon Informasi</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><img src="{{ public_path('dist/images/ttd.png') }}" style="width:8rem;"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;"><img src="{{ public_path('dist/images/ttd.png') }}" style="width:8rem;"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">( {{ $idadmin->NAMA_LENGKAP }} )</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">( {{$permohonan->user->NAMA_LENGKAP}} )</td>
                </tr>
                <tr>
                    <td style="text-align: center;">PT. PAL Indonesia (Persero)</td>
                    <td>&nbsp;</td>

                </tr>
            </tbody>
        </table>

    </main>

</body>
</html>
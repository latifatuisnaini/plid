<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pemberitahuan</title>
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
        .square {
            height: 10px;
            width: 10px;
            background-color: none;
            border-color: #555;
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
        .foot4 {
            font-size: 12pt;
            text-align: right;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
        table,tr,th, td{
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

        <p class="foot4">Surabaya, {{ date('d F Y',strtotime($pemberitahuan->TANGGAL)) }}</p>

        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <tbody>
                <tr>
                    <td colspan="4" style="text-align: justify;">Berdasarkan permohonan Informasi pada tanggal {{ date('d',strtotime($pemberitahuan->TANGGAL)) }} bulan {{ date('F',strtotime($pemberitahuan->TANGGAL)) }} tahun {{ date('Y',strtotime($pemberitahuan->TANGGAL)) }} dengan nomor pendaftaran* {{ $pemberitahuan->NOMOR_URUT }}/E-PPID/{{ date('m',strtotime($pemberitahuan->TANGGAL)) }}/{{ date('Y',strtotime($pemberitahuan->TANGGAL)) }} Kami menyampaikan kepada Saudara/i</td>
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
            </tbody>
        </table>

        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">   
            <tbody>             
                <tr>
                    <td colspan="4">Pemberitahuan sebagai berikut:</td>
                </tr>
                
                @if( $pemberitahuan->ID_STATUS == 3 )
                <tr>
                    <td colspan="4" style="font-size:14pt;font-weight: bold;">Informasi dapat diberikan</td>
                </tr>
                <tr style="border: 1pt solid black;">
                    <td style="border: 1pt solid black;text-align:center" width="5%">No.</td>
                    <td style="border: 1pt solid black;text-align:center">Hal-hal Terkait Informasi Publik</td>
                    <td colspan="2" style="border: 1pt solid black;">Keterangan</td>
                </tr>
                <tr style="border: 1pt solid black;">
                    <td style="border: 1pt solid black; text-align:center">1.</td>
                    <td style="border: 1pt solid black;">Penguasaan Informasi Publik</td>
                    <td colspan="2" style="border: 1pt solid black;">{{ $pemberitahuan->feedback->PENGUASAAN_INFORMASI }}</td>
                </tr>
                <tr style="border: 1pt solid black;">
                    <td style="border: 1pt solid black; text-align:center">2.</td>
                    <td style="border: 1pt solid black;">Bentuk fisik yang tersedia</td>
                    <td colspan="2" style="border: 1pt solid black;">Softcopy</td>
                </tr>
                <tr style="border: 1pt solid black;">
                    <td style="border: 1pt solid black; text-align:center">3.</td>
                    <td style="border: 1pt solid black;">Waktu penyediaan</td>
                    <td colspan="2" style="border: 1pt solid black;">
                        {{ $interval->d }} hari
                    </td>
                </tr>
                <tr style="border: 1pt solid black;">
                    <td style="border: 1pt solid black; text-align:center">4.</td>
                    <td colspan="3" style="border: 1pt solid black;">Penjelasan penghitaman/pengaburan Informasi yang dimohon : {{ $pemberitahuan->feedback->KETERANGAN_PENGHITAMAN }} </td>
                </tr>

                @elseif( $pemberitahuan->ID_STATUS == 4 )
                <tr>
                    <td colspan="4" style="font-size:14pt;font-weight: bold;">Informasi tidak dapat diberikan karena</td>
                </tr>
                <tr>
                    <td>{{ $pemberitahuan->feedback->KETERANGAN }}</td>
                </tr>

                @endif
            </tbody>
        </table>

        <br><br>

        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">   
            <tbody>
                <tr>
                    <td colspan="5" style="font-weight: bold; text-align:right">Pejabat Pengelola Informasi dan Dokumentasi</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="font-weight: bold; text-align:center">(PPID)</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><img src="{{ public_path('dist/images/ttd.png') }}" style="width:8rem; float:right"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align:center">( {{ $idadmin->NAMA_LENGKAP }} )</td>
                </tr>
                <!-- <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align:center">Nama & Tanda Tangan</td>
                </tr> -->
            </tbody>
        </table>

    </main>

</body>
</html>
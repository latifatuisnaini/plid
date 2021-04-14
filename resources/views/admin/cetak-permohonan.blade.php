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
        .h4text{
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            text-align: justify;
            font-style: bold;
            font-size: 10pt;
            line-height: 2px;
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
            /* border: 1pt solid none; */
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }
        th, td{
            padding: 5px;
            font-size: 11pt;
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
        <h3>LEMBAR PERMOHONAN INFORMASI DAN DOKUMEN USER</h3>
        <h4>PUSAT PELAYANAN INFORMASI DAN DOKUMENTASI</h4>
        <br>


        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <tbody>
                <tr>
                    <td width="18%">Nomor Identitas</td>
                    <td width="2%">:</td>
                    <td>{{ $permohonan->user->NOMOR_IDENTITAS }}</td>
                
                    <!-- <td>KTP</td> -->
                    <td vertical-align="top"  rowspan="7">
                        <img class="float-right" src="{{ public_path('storage/dokumen/'.$permohonan->user->FILE_KTP)}}" style="vertical-align:top ; float:right ; width: 9cm; height:5cm;">
                    </td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td> {{ $permohonan->user->NAMA_LENGKAP }}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td>{{ $permohonan->user->email }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $permohonan->user->PEKERJAAN }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $permohonan->user->ALAMAT }}</td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td> {{ $permohonan->user->NO_TLP }}</td>
                </tr>
                <tr>
                    <td>Nomor Fax</td>
                    <td>:</td>
                    <td> {{ $permohonan->user->NO_FAX }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">   
            <tbody>
                <tr>
                    <td colspan="3" style="font-style: bold; font-size: 12pt; text-decoration:underline;">Dokumen yang Diminta User</td>
                </tr>
                <tr>
                    <td width="27%">Nama Dokumen</td>
                    <td width="2%">: </td>
                    <td>{{ $permohonan->DOKUMEN_PERMOHONAN }}</td>
                </tr>
                <tr>
                    <td>Keterangan Dokumen</td>
                    <td>:</td>
                    <td> {{ $permohonan->KETERANGAN }}</td>
                </tr>
                <tr>
                    <td>Status Dokumen</td>
                    <td> : </td>
                    @if($permohonan->ID_STATUS == 4)
                    <td style="color:red;"> <button style="background-color:#ffcccc; border-radius:6px; padding:2px 10px; border-color:#ffcccc">  {{ $permohonan->status->STATUS }} </button> </td>
                    @elseif( $permohonan->ID_STATUS == 1 )
                    <td style="color: blue;"> <button style="background-color:#ccd9ff; border-radius:6px; padding:2px 10px; border-color:#ccd9ff">  {{ $permohonan->status->STATUS }} </button></td>
                    @elseif( $permohonan->ID_STATUS == 3 )
                    <td style="color: green;">   <button style="background-color:#e6ffcc; border-radius:6px; padding:2px 10px; border-color:#e6ffcc">  {{ $permohonan->status->STATUS }} </button> </td>
                    @elseif( $permohonan->ID_STATUS == 2 )
                    <td style="color: #e67300;">   <button style="background-color:#ffe6cc; border-radius:6px; padding:2px 10px; border-color:#ffe6cc">  {{ $permohonan->status->STATUS }} </button> </td>
                    @endif
                </tr>
                @if( isset ($permohonan->feedback->KETERANGAN) )
                <tr>
                    <td>Keterangan Permohonan yang Diajukan</td>
                    <td>:</td>
                    <td> 
                    {{ $permohonan->feedback->KETERANGAN }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

    </main>

</body>
</html>
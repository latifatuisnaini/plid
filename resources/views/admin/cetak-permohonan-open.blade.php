<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Belum Dikonfirmasi</title>
	<link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/css/app.css'}}" >
    <link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/images/logo-pal.png'}}" >
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
            font-size: 8pt;
            text-align: center;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            line-height: 2px;
        }
        .foot2 {
            font-size: 6pt;
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
            bottom: -20px; 
            left: 0px; 
            right: 0px;
            height: 40px;
        } 
        /* header{
            position: fixed;
            top: 0px; 
            left: 0px; 
            right: 0px;
            height: 50px;
        } */
	</style>
    
    <!-- <header> -->
        <!-- <img src="{{ public_path('dist/images/logo-pal.png') }}" style="width:8rem; float:right"> 
        <img src="{{ public_path('dist/images/logo_bumn.png') }}" style="width:9rem; float:left">  -->
    <!-- </header> -->

    <footer>
        <p class="foot1">PT PAL INDONESIA (PERSERO)</p>
        <p class="foot2">Kantor Pusat : UJUNG, SURABAYA 60155, PO BOX 1134 INDONESIA</p>
        <p class="foot2">Telp. : +62-31-3292275 (HUNTING) FAX : +62-31-3292530, 3292493, 3292516 E-mail : headoffice@pal.co.id Web Site : http//www.pal.co.id</p>
        <p class="foot2">Kantor Perwakilan : JL.TANAH ABANG II/27, JAKARTA 10160, PHONE : +62-21-3846833, FAX : +62-21-3843717 E-mail : jakartabranch@pal.co.id</p>
    </footer>

    <main>
        <img src="{{ public_path('dist/images/logo-pal.png') }}" style="width:8rem; float:right"> 
        <img src="{{ public_path('dist/images/logo_bumn.png') }}" style="width:9rem; float:left">     
        <br><br><br>
        <h3>LIST DAFTAR PERMOHONAN INFORMASI DAN DOKUMEN USER</h3>
        <h4>PUSAT PELAYANAN INFORMASI DAN DOKUMENTASI</h4>
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1" width="10%">ID Permohonan</th>
                    <th data-priority="2">Nama Dokumen</th>
                    <th data-priority="3" width="40%">Keterangan</th>
                    <th data-priority="4">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            @foreach($permohonans as $u)
                <tr>
                    <td>{{$u->ID_PERMOHONAN}}</td>
                    <td>{{$u->DOKUMEN_PERMOHONAN}}</td>
                    <td>{{$u->KETERANGAN}}</td>
                    <td>{{ date('d F Y',strtotime($u->TANGGAL)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
 
</body>

</html>
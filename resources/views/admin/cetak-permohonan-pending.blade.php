<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Sedang Diproses</title>
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

    <h3>Daftar Permohonan User yang Sedang Diproses</h3>

    <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="1">Nama Dokumen</th>
                <th data-priority="2" width="53%">Keterangan</th>
                <th data-priority="3">Tanggal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permohonan_pending as $pp)
            <tr>
                <td>{{$pp->DOKUMEN_PERMOHONAN}}</td>
                <td>{{$pp->KETERANGAN}}</td>
                <td>{{ date('d F Y',strtotime($pp->TANGGAL)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
 
</body>

</html>
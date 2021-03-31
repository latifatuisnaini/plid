<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Sedang Diproses</title>
	<link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/css/app.css'}}" >
</head>
<body>
	<style type="text/css">
        h5 {color: darkslateblue; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    
    <h5>Daftar Permohonan User yang Sedang Diproses</h4>
    <br>
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
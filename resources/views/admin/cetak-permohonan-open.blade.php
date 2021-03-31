<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Belum Dikonfirmasi</title>
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
    
    <h5>Daftar Permohonan User yang Belum Dikonfirmasi</h4>
    <br>
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
 
</body>

</html>
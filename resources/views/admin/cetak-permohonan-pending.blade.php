<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Sedang Diproses</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
 
<script>
$(document).ready(function() {

    var table = $('#view').DataTable( {
        responsive: true,
    } )
    .columns.adjust()
    .responsive.recalc();
});

</script>
</html>
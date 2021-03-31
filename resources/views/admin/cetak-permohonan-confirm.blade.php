<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Sudah Dikonfirmasi</title>
	<link rel="stylesheet" href="{{$_SERVER['DOCUMENT_ROOT'] . '/public/dist/css/app.css'}}" >
</head>
<body>
	<style type="text/css">
        h5 {color: darkslateblue; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
        table{
            border: 1pt black;
        }

	    th{
            color: black;
            font-size: 10pt;
        } 
        
	</style>
    
    <h5>Daftar Permohonan User yang Sudah Dikonfirmasi</h4>
    <br>
    <table id="view" class=" stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="3" width="12%">Tanggal</th>
                <th data-priority="1" width="12%">Nama Dokumen</th>
                <th data-priority="2" width="30%">Keterangan Dokumen</th>
                <th data-priority="2" width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permohonan_confirm as $p)
            <tr>
                <td>{{ date('d F Y',strtotime($p->TANGGAL)) }}</td>
                <td>{{$p->DOKUMEN_PERMOHONAN}}</td>
                <td>{{$p->KETERANGAN}}</td>
                <td>
                @if($p->ID_STATUS == 3)
                    <!-- <div class="text-center"> -->
                        <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                    <!-- </div> -->
                @else
                    <!-- <div class="text-center"> -->
                        <div class="flex items-center justify-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                    <!-- </div> -->
                @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
 
</body>
</html>
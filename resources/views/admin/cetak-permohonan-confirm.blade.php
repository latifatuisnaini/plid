<!DOCTYPE html>
<html>
<head>
	<title>Permohonan User yang Sudah Dikonfirmasi</title>
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

    <h3>Daftar Permohonan User yang Sudah Dikonfirmasi</h3>

    <table id="view" class=" display" style="width:100%; padding-top: 0.5em;  padding-bottom: 1em;">
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
                <td style="text-align: center;">{{ date('d F Y',strtotime($p->TANGGAL)) }}</td>
                <td>{{$p->DOKUMEN_PERMOHONAN}}</td>
                <td>{{$p->KETERANGAN}}</td>
                <td style="text-align: center;">
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
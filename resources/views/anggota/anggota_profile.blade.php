<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlte/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Data Anggota
      </h1>
        <div class="container">
            @php
        $numOfCols = 1;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
@endphp
<div class="row">
        @foreach($anggota as $p)
        <div class="col-xs-@php echo $bootstrapColWidth; @endphp">
@php
$a = $p->nama 
@endphp
                <h4 >{{ $p->nama }}</h4>
                <div class="col-xs-3"><br><img width="250px" height="200px" src="{{ url('/data_ktp/'.$p->file_ktp) }}"><a href="{{ url('/anggota/editPoto/'.$p->id_anggota) }}">ubah poto</a></div>
                <div class="col-xs-8">
                <table class="table table-striped">
                    <tr>
                        <td>
                        Nama Parent
                        </td>
                        <td>
                        {{ $p->namaParent }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Jabatan
                        </td>
                        <td>
                        {{ $p->nama_jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Email
                        </td>
                        <td>
                        {{ $p->email }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        No Hp
                        </td>
                        <td>
                        {{ $p->no_handphone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Alamat
                        </td>
                        <td>
                        {{ $p->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        No KTP
                        </td>
                        <td>
                        {{ $p->no_ktp }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        No NPWP
                        </td>
                        <td>
                        {{ $p->no_npwp }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Saldo
                        </td>
                        <td>
                        {{ $p->saldo }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Status
                        </td>
                        <td>
                        {{ $p->status }}
                        </td>
                    </tr>
                 <br>
                 </table>
<!--                  
                 $a = {{$p->status}}; 
                 print_r($a); -->
                 @if($p->status=='aktif')
                 <a href="{{url('/anggota/suspend/'.(isset($p) ? $p->id_anggota : ''))}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Suspend</a>
                 @else
                    <a href="{{url('/anggota/aktif/'.(isset($p) ? $p->id_anggota : ''))}}" onclick="return confirm('Are you sure?')" class="btn btn-warning">Aktifkan</a>
                 @endif
                <a href="{{url('/anggota/edit/'.(isset($p) ? $p->id_anggota : ''))}}" class="btn btn-warning">Edit</a>
                <a href="{{url('/anggota/reset/'.(isset($p) ? $p->id_anggota : ''))}}" onclick="return confirm('Are you sure?')" class="btn btn-info">Reset Password</a>
                <a href="{{url('/anggota/hapus/'.(isset($p) ? $p->id_anggota : ''))}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                </div>
            <div id="wrapper">
        @php
        $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

@endphp
@endforeach
</div>
            <div class="card-body">
                    <br><br>
                    Downline 1
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th> 
                                <th>level</th>
                                <th>Nama Parent</th>
                                <!-- <th>Email</th>
                                <th>No Handphone</th>
                                <th>Alamat</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($parent as $q) 
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><a href="../../anggota/profile/{{ $q->id_anggota }}" target="_blank">{{ $q->nama }}</a></td>
                                <td>{{ $q->nama_jabatan }}</td>
                                <td>{{ $q->namaParent }}</td>
                                <!-- <td>{{ $q->email }}</td>
                                <td>{{ $q->no_handphone }}</td>
                                <td>{{ $q->alamat }}</td> -->
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
      
        <div class="card-body">
                    <br/> 
                    Downline 2
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>level</th>
                                <th>Nama Parent</th>
                                <!-- <th>Email</th>
                                <th>No Handphone</th>
                                <th>Alamat</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($anak as $a)
                            @foreach($a as $sas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><a href="../../anggota/profile/{{ $sas->id_anggota }}" target="_blank">{{ $sas->namaParent }}</a></td>
                                <td>{{ $sas->nama_jabatan }}</td>
                                <td>{{$sas->nama}}</td>
                                <!-- <td>{{ $sas->email }}</td>
                                <td>{{ $sas->no_handphone }}</td>
                                <td>{{ $sas->alamat }}</td> -->
                            </tr>
                            @endforeach
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
        </div>
      </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="../../adminlte/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="../../adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../adminlte/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../adminlte/js/demo.js"></script>
</body>
</html>
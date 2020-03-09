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
        Daftar Produk
      </h1>
        <div class="container">
        <br>
        <br>
            <form action="{{url('produkCari')}}" method="GET" class="form-horizontal">
            <div class="form-group">
            <div class="col-md-2">
                <select name="select" class="form-control">
                    <option value="id_produk">ID Produk</option>
                    <option value="nama_produk">Nama Produk</option>
                </select>
            </div>
                <div class="col-md-4">
                    <input type="text" name="cari" class="form-control" placeholder="Cari .." value="{{ old('cari') }}">
                </div>    
                    <input type="submit" value="CARI">
                    <input type="hidden" name="_method" value="get">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
            </div>
            </div>
            <div class="card mt-3">
            <!-- <a href="{{url('produk/tambah')}}" class="btn btn-primary">Input Produk Baru</a> -->
                <div class="card-body">
                    @php
                    $numOfCols = 3;
                    $rowCount = 0;
                    $bootstrapColWidth = 12 / $numOfCols;
                    @endphp
                        @foreach($produk as $p)
                        <div class="col-xs-@php echo $bootstrapColWidth; @endphp">
                        @php
                         $a = $p->nama_produk 
                        @endphp
                        <br>
                        <!--
                        <h4 >{{ $p->nama_produk }}</h4>
                        <div class="col-xs-4 row-xs-2"><img width="270px" height="200px" src="{{ url('/data_banner/'.$p->file_banner) }}" ></div>
                        <div class="card-body"><h4 >{{ $p->nama_produk }}</h4> -->
                        <div class="card" style="width: 18rem;">
                        <img width="270px" height="200px" src="{{ url('/data_banner/'.$p->file_banner) }}" >
                        <input type="hidden" value="{{$p->id_produk}}">
                        <h4 class="card-title ">{{ $p->nama_produk }}</h4>
                        <p class="card-text">Terjual {{ $p->terjual }}.<br>
                        Sisa {{ $p->sisa }}<br>
                        {{ $p->keterangan }}</p>
                        <a href="produkDetail/{{ $p->id_produk }}" class="btn btn-primary">Lihat Detail</a>

                        <!-- <div class="col-xs-3">Tanggal Keberangkatan {{ $p->jumlah }}<br>
                        Tanggal Expired {{ $p->jumlah }}<br>
                    
                        <a href="{{ url('/produkanggotainput/'.(isset($p) ? $p->id_produk : '')) }}" class="btn btn-primary">Pilih</a>
                        <input data-id="{{ $p->nama_produk }}" data-todo="{{ $p->id_produk }}" data-target="#editTodoDialog" class="open-EditTodo btn btn-warning" data-toggle="modal" type="submit" value="submit"/></div>
                        <div class="col-xs-4">Tanggal Keberangkatan {{ $p->jumlah }}
                            <td>
                                <a href="produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
                                <a href="produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </div> -->
                        </div>
                        <div id="wrapper">
                    </div>
                    
                </div>
            
            @php
        $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

@endphp
@endforeach
<div>
            <!-- <div id="wrapper"> -->
                    <!-- <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Sisa</th>
                                <th>Terjual</th>
                                <th>Harga</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->sisa }}</td>
                                <td>{{ $p->terjual }}</td>
                                <td>{{ $p->harga }}</td>
                                <td>
                                    <a href="produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
                                    <a href="produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> -->
            </div>
        </div>
       
</div>
</div>
<div class="text-center">{{ $produk->links() }}</div>
  <!-- /.content-wrapper -->
@include('layouts.footer')
 </div>
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="adminlte/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="adminlte/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/js/demo.js"></script>
</body>
</html>
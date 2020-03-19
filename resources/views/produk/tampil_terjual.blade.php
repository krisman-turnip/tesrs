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
        Daftar Penjualan Produk
      </h1>
        <div class="container">

        <form action="{{url('exporttransaksi')}}" method="GET">
        <br>
        <br>
        <div class="form-group">
        <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <select name="select" class="form-control" value="{{ old('select') }}">
                    <option value="nama">Nama Anggota</option>
                    <option value="nama_produk">Nama Produk</option>
                    <option value="nama_customer">Nama customer</option>
                    <option value="ktp_customer">KTP Customer</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="cari" class="form-control" placeholder="Cari .." value="{{ old('cari') }}">
            </div>
            <div class="col-md-2">
                <input type="submit" value="CARI">
                <input type="hidden" name="_method" value="get">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
            <div class="col-md-3.5">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Report</button>
            </div>
            </div>
        </form>
                    <br/>
                    <br/>
                    <div class="table-responsive">          
                    <table class="table table-sm table-dark table-hover table-striped">
                    <!-- <table class="table table-bordered table-hover table-striped"> -->
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">KTP Customer</th>
                                <th scope="col">Approval</th>
                                <th scope="col">Tanggal Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->nama_customer }}</td>
                                <td>{{ $p->ktp_customer }}</td>
                                <td>{{ $p->admin }}</td>
                                <td>{{ $p->created_at }}</td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            {{ $produk->links() }}
        </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-xl">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Report Transaksi Sukses</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <form action="{{url('exportpenjualan')}}" method="GET">
                    <br>
                    <br>
                        <div class="form-group row">
                        <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Tanggal Awal</label>
                            <div class="col-md-6">
                            <input type="text" name="nama" id="datepicker1" class="form-control" required placeholder="Tanggal Awal .." >
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Tanggal Akhir</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_jabatan" id="datepicker2" class="form-control" required placeholder="Tanggal Akhir .." >
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="Submit">
                            <input type="hidden" name="_method" value="get">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </div>
                        </div>
                        <!-- <div class="col-md-3.5">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Report</button>
                        </div> -->
                    </div>
                    </form>
                    <!-- <a href= class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->
				
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>

<script>
  $( function() {
    $("#datepicker2").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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
<script src="{{url('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dminlte/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/js/demo.js"></script>
</body>
</html>
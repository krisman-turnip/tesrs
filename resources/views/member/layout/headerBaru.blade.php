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
  <link rel="stylesheet" href="{{url('adminlte/css/animate.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/style.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/gijgo.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/slicknav.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/themify-icons.css')}}">
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
  <script src="{{url('adminlte/bower_components/jquery/dist/jquery.js')}}"></script>
  <script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.js')}}"></script>
	<link rel="stylesheet"  href="{{url('adminlte/bower_components/jquery-ui/jquery-ui.css')}}">
  <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<style>
.navbar-default{
 background-color:  lightgreen;
}
</style>
<body>

<header>
        
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">				
                <li><a href="{{ url('homeanggota') }}">Home</a></li>
                <li><a href="{{ url('beranda') }}">Profile</a></li>
                <li><a href="{{ url('materianggota') }}">Materi</a></li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Produk
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
                        <li><a href="{{ url('produkanggota') }}">Produk</a></li>
                        <li><a href="{{ url('produkanggota/pengajuan') }}">Pengajuan</a></li>
                        <li><a href="{{ url('produkanggota/diterima') }}">Penjualan</a></li>
                        <li><a href="{{ url('produkanggota/ditolak') }}">DI Tolak</a></li>
					</ul>
				</li>
                <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Komisi
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
                        <li><a href="{{ url('komisianggota') }}">Komisi</a></li>
                        <li><a href="{{ url('pembayaran') }}">Pembayaran</a></li>
					</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{url('proseslogoutanggota')}}"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
      <!-- <h2 class="text-center"> What's on Indah Wisata</h2> -->

          </header>
    <!-- header-start -->
   
    <!-- header-end -->
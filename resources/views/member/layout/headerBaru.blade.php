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
  <link rel="stylesheet" href="{{url('adminlte/css/font-awesome.min.css')}}">
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
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body>

<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ url('homeanggota') }}">Home</a></li>
                                        <li><a href="{{ url('beranda') }}">Profile</a></li>
                                        <li><a href="{{ url('materianggota') }}">Materi</a></li>
                                        <li><a href="#">Produk <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('produkanggota') }}">Produk</a></li>
                                                <li><a href="{{ url('produkanggota/pengajuan') }}">Pengajuan</a></li>
                                                <li><a href="{{ url('produkanggota/diterima') }}">Penjualan</a></li>
                                                <li><a href="{{ url('produkanggota/ditolak') }}">DI Tolak</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Komisi <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('komisianggota') }}">Komisi</a></li>
                                                <li><a href="{{ url('pembayaran') }}">Pembayaran</a></li>
                                                <!-- <li><a href="{{ url('produkanggota/diterima') }}">Penjualan</a></li>
                                                <li><a href="{{ url('produkanggota/ditolak') }}">DI Tolak</a></li> -->
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div> -->
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <!-- <div class="book_room">
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Book A Room</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        
      </h1>
      </section>

      <div class="row">
      <!-- <h2 class="text-center"> What's on Indah Wisata</h2> -->
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                @php $no=1; @endphp
                
                <div class="carousel-inner" role="listbox">
                  @foreach($hl as $p)
                  @if($no==1)
                    <div class="item active"> 
                  @else
                  <div class="item"> 
                  @endif
                  <img  src="{{ url('/image_dash/'.$p->file) }}" alt="Los Angeles" style="width:1400px;">
                    <div class="carousel-caption">
                      <h3 data-animation="animated bounceInLeft">{{ $p->judul }}</h3>
                      <p>{{ $p->deskripsi }}</p>
                    </div>
                  </div>
                  @php $no++ @endphp
                  @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
                </div>
              </div>
            </div>
          </div>
    <!-- header-start -->
   
    <!-- header-end -->
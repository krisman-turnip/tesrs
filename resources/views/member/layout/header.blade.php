<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/css/animate.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/css/style.css')}}">
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

<body class="sidebar-mini skin-green sidebar-collapse" data-gr-c-s-loaded="true" style="height: auto; min-height: 100%;">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header ">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b> </b> </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>@php print_r(session()->get('name')) @endphp </b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        @php $a = session()->get('gbr'); @endphp
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ url('/data_ktp/'.$a) }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
               <span class="hidden-xs"> @php print_r(session()->get('name')) @endphp </span>
            </a>
          </li>
          <!-- <li>
          @php 
        print_r(session()->get('gbr'))
        @endphp
          </li> -->
          <li>
            <a href="{{ url('proseslogoutanggota') }}"> Log Out </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


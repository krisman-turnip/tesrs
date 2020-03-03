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
  <script src="{{url('adminlte/bower_components/jquery/dist/jquery.js')}}"></script>
  <script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.js')}}"></script>
	<link rel="stylesheet"  href="{{url('adminlte/bower_components/jquery-ui/jquery-ui.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="../adminlte/bower_components/jquery/jquery-1.12.4.js"></script>
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  -->
  <script src="../adminlte/bower_components/jquery/jquery-ui.js"></script>
  
    
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
    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <H1>TAMBAH PRODUK</h1> 
                </div>
                <div class="card-body">
                    <a href="../produk" class="btn btn-primary">Kembali</a>
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{url('produk/store')}}" enctype="multipart/form-data" id='inForm'>

                        {{ csrf_field() }}

                        <div class="form-group row">
                        <label for="nama_produk" class="col-md-2 col-form-label text-md-right">Nama Produk</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk ..">

                            @if($errors->has('nama_produk'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_produk')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Jumlah</label>
                        <div class="col-md-6">
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah ..">

                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
                                </div>
                            @endif
                        </div> 
                        </div>

                        <div class="form-group row">
                        <label for="harga" class="col-md-2 col-form-label text-md-right">Harga</label>
                        <div class="col-md-6">
                            <input type="text" name="harga" class="form-control" placeholder="Harga ..">

                            @if($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">File Banner</label>
                            <div class="col-md-6">
                                <input type="file" name="nama_banner">
                            </div>
                        </div>
                        <h3>Upload Materi</h3>
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">File Upload</label>
                            <div class="col-md-6">
                                <input type="file" name="nama_materi">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="keterangan"></textarea>
                            </div>
                        </div>
                        <INPUT type="button" value="Add Row" onClick="addRow('dataTable')" />

                        <form action="" method="post" name="f">  

                        <TABLE width="425" border="1">
                        <thead>
                            <tr>
                                <th width="94">Nama Produk</th>
                                <th width="121">Harga</th>
                                <th width="84">Keterangan</th>
                                <th width="84">opsi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTable">

                        </tbody>
                        </TABLE>
                        <INPUT type="button" value="Add Row" onClick="addRows('dataTables')" />

                        <form action="" method="post" name="f">  

                        <TABLE width="425" border="1">
                        <thead>
                            <tr>
                                <th width="94">Tanggal Keberangkatan</th>
                                <th width="121">Tanggal Expired</th>
                                <th width="84">opsi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTables">

                        </tbody>
                        </TABLE>
              
                        <br> 
                        <div class="form-group row">
                        <!-- <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Keberangkatan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tanggal_berangkat" id="datepicker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Expired</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tanggal_expired" id="datepicker2"/>
                            </div>
                        </div> -->
                            <input type="hidden" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                            <input type="submit" class="btn btn-success" value="Simpan" onClick="">
                        </div>
                        </div>

                    </form>

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
<SCRIPT language="javascript">
     function addRow(tableID) { 

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        // var cell1 = row.insertCell(0);
        // var element1 = document.createElement("input");
        // element1.type = "checkbox";
        // element1.name="chkbox[]";
        // cell1.appendChild(element1);

        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<input type='text' name='nama_sub[]' required>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text'  name='harga_sub[]' required/>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML =  "<input type='text'  name='keterangan_sub[]' required/>";
        var cell4= row.insertCell(3);
        cell4.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)' required/>";
        
        
        }
</SCRIPT>
<SCRIPT language="javascript">
     function addRows(tableIDs) { 

        var table = document.getElementById(tableIDs);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);



        var cell1 = row.insertCell(0);
        cell1.innerHTML = " <input type='text' class='form-control' name='tanggal_berangkat[]' id='datepicker' required/>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' class='form-control' name='tanggal_expired[]' id='datepicker2' required/>";

        var cell3= row.insertCell(2);
        cell3.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)'/>";
        
        
        }

</SCRIPT>
<script>
  $( function() {
    $("#datepicker").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker2" ).datepicker({
        format: 'yyyy-mm-dd'
    });
  } );
  </script>
<script>
  function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
</script>

<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url('adminlte/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('adminlte/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte/js/demo.js')}}"></script>
</body>
</html>
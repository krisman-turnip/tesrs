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
        Update Produk
      </h1>
      <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                <a href="../../produk" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    

                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                    <form method="post" action="{{ url('/produk/update/'.(isset($produk) ? $produk->id_produk : '')) }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}  
                            <input type="hidden" name="id_produk" class="form-control" placeholder="ID Produk  .." value=" {{ $produk->id_produk }}" >

                        <div class="form-group row">
                        <label for="nama" class="col-md-2 col-form-label text-md-right">Nama Produk</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk .." value=" {{ $produk->nama_produk }}">

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
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah .." value=" {{ $produk->jumlah }}">

                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="sisa" class="col-md-2 col-form-label text-md-right">Sisa</label>
                            <div class="col-md-6">
                            <textarea name="sisa" class="form-control" placeholder="Sisa .."> {{ $produk->sisa }} </textarea>

                             @if($errors->has('sisa'))
                                <div class="text-danger">
                                    {{ $errors->first('sisa')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="terjual" class="col-md-2 col-form-label text-md-right">Terjual</label>
                            <div class="col-md-6">
                            <textarea name="terjual" class="form-control" placeholder="Terjual .."> {{ $produk->terjual }} </textarea>

                             @if($errors->has('terjual'))
                                <div class="text-danger">
                                    {{ $errors->first('terjual')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="harga" class="col-md-2 col-form-label text-md-right">Harga</label>
                            <div class="col-md-6">
                            <textarea name="harga" class="form-control" placeholder="Harga .."> {{ $produk->harga }} </textarea>

                             @if($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga')}}
                                </div>
                            @endif
                            </div>
                        </div>
                       
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Sub Produk</label>
                        <div class="col-md-6">
                        
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
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Produk</label>
                        <div class="col-md-6">
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
                        </div>
                        </div>
                        <br> 
                        <div class="form-group row">
 
                        <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
               
                    <br/>
                    <br/>
                    @foreach($sub as $p)
                        {{$p->namaProduk}}
                        @endforeach
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Materi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($materi as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_materi }}</td>
                                <td>{{ $p->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{ url('materi/upload') }}" class="btn btn-primary">Upload</a>
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
        cell1.innerHTML = "<input type='text' name='nama_sub[]' value='{{$p->namaProduk}}' required>";

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
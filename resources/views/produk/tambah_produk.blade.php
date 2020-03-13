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
                    <h3>Tambah Produk</h3> 
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
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk .." required>

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
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah .." required>

                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
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
                                <textarea class="form-control" name="keterangan" require></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Sub Produk</label>
                        <div class="col-md-6">
                        <INPUT type="button" value="Tambah Sub Produk" onClick="addRow('dataTable')" />

                        <form action="" method="post" name="f">  
                        
                            <TABLE width="550" border="1">
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
                            <INPUT type="button" value="Tambah Tanggal" onClick="addRows('dataTables')" />
                            <form action="" method="post" name="f">  
                                <TABLE width="550" border="1">
                                <thead>
                                    <tr>
                                        <th width="94">Tanggal Keberangkatan</th>
                                        <th width="121">Tanggal Expired</th>
                                        <th width="54">opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTables">
                                </tbody>
                                </TABLE>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Skema Komisi Produk</label>
                        <div class="col-md-5">
                        <INPUT type="button" value="Tambah Skema" onClick="addRowq('dataTableskema')" />
                        <form action="" method="post" name="skema">  
                            <TABLE width="550" border="1">
                            <thead>
                                <tr>
                                    <th width="114">Nama Jabatan</th>
                                    <th width="121">Nama Template</th>
                                    <th width="134">Keterangan</th>
                                    <th width="84">opsi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTableskema">
                            <tr>
                                <td>1
                                </td>
                                <td>2
                                </td>
                                <td>3
                                </td>
                                <td>
                                <input type="Button" value="delete" onclick="deleteRow(this)" />;
                                </td>
                                </tr>
                            </tbody>
                            </TABLE>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Lihat Template</button>
                        </div>
                        
                        <div class="col-md-2">
                        
                        </div></div> 
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
                        </div>
                        
                        <div class="form-group row">
                        <label for="template" class="col-md-2 col-form-label text-md-right">Template Komisi Produk</label>
                        <div class="col-md-5">
                        <INPUT type="button" value="Tambah Skema" onClick="addRowT('dataTabletemplate')" />
                        <form action="" method="post" name="template">  
                            <TABLE width="800" border="1">
                            <thead>
                                <tr>
                                    <th width="250">Nama Template</th>
                                    <th width="130">Komisi 1</th>
                                    <th width="130">Komisi 2</th>
                                    <th width="130">Komisi 3</th>
                                    <th width="110">Poin 1</th>
                                    <th width="110">Poin 2</th>
                                    <th width="110">Poin 3</th>
                                    <th width="90">opsi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTabletemplate">
                            </tbody>
                            </TABLE>
                        <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Lihat Template</button> -->
                        </div>
                     </div>
                            <input type="hidden" class="col-md-2" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            </div>
                            <input type="submit" class="btn btn-success" value="Simpan" onClick="">
                      
        <br>
        <br>
                </div>
         
        </div>
        </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')

<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-xl">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center" >Template Komisi</h4>
				</div>
                <a href="{{url('komisiTemplate/tambah')}}" class="btn btn-info" target="_blank">Input Template</a>
             
				<!-- body modal -->
				<div class="modal-body">
                <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Template</th>
                                <th>Komisi Level 1</th>
                                <th>Komisi Level 2</th>
                                <th>Komisi Level 3</th>
                                <th>Poin Level 1</th>
                                <th>Poin Level 2</th>
                                <th>Poin Level 3</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($komisi as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_template }}</td>
                                <td>{{ $p->komisi_1 }}</td>
                                <td>{{ $p->komisi_2 }}</td>
                                <td>{{ $p->komisi_3 }}</td>
                                <td>{{ $p->poin_1 }}</td>
                                <td>{{ $p->poin_2 }}</td>
                                <td>{{ $p->poin_3 }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <a href= class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->
				
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
 
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
     function addRowT(tableIDTemplate) { 

        var table = document.getElementById(tableIDTemplate);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        // var cell1 = row.insertCell(0);
        // var element1 = document.createElement("input");
        // element1.type = "checkbox";
        // element1.name="chkbox[]";
        // cell1.appendChild(element1);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<input type='text'class='form-control' name='nama_template[]' required>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' class='form-control' name='komisi1[]' required/>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML =  "<input type='text' class='form-control' name='komisi2[]' required/>";

        var cell4 = row.insertCell(3);
        cell4.innerHTML =  "<input type='text' class='form-control' name='komisi3[]' required/>";

        var cell5 = row.insertCell(4);
        cell5.innerHTML = "<input type='text' class='form-control' name='poin1[]' required/>";

        var cell6 = row.insertCell(5);
        cell6.innerHTML =  "<input type='text' class='form-control' name='poin2[]' required/>";

        var cell7 = row.insertCell(6);
        cell7.innerHTML =  "<input type='text' class='form-control' name='poin3[]' required/>";
        
        var cell8= row.insertCell(7);
        cell8.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)' required/>";
        
        
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

<SCRIPT language="javascript">
     function addRowq(tableIDskema) { 

        var table = document.getElementById(tableIDskema);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);



        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<select class='form-control select2' name='nama_jabatan[]' id='' required/><option value=''>pilih jabatan</option>@foreach($jabatan as $d)<option value='{{$d->id_jabatan}}'>{{$d->nama_jabatan}}</option>@endforeach</select>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<select class='form-control select2' name='nama_skema[]' id='' required/><option value=''>pilih template</option>@foreach($skema as $d)<option value='{{$d->id_template_komisi}}'>{{$d->nama_template}}</option>@endforeach</select>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML = "<input type='text' class='form-control' name='keterangan_skema[]' id='' required/>";

        var cell4= row.insertCell(3);
        cell4.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)'/>";
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
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

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
  <br/>
  <div class="col-md-8">
  <!-- <select class="form-control select2" style="width:500px;" name="cari" id="cari"></select> -->
  </div>
</div>
    <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH ANGGOTA</strong> 
                </div>
                <div class="card-body">
                    <a href="../home" class="btn btn-primary">Kembali</a>
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{url('anggota/store')}}">

                        {{ csrf_field() }}

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">ID Anggota</label>
                            <div class="col-md-6">
                            <input type="text" name="id_anggota" class="form-control" placeholder="ID Anggota ..">

                            @if($errors->has('id_anggota'))
                                <div class="text-danger">
                                    {{ $errors->first('id_anggota')}}
                                </div>
                            @endif
                            </div>
                        </div>


                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">ID Parent</label>
                            <div class="col-md-6">
                            <!-- <input type="text" name="id_parent" class="form-control" placeholder="ID Parent .."> -->
                            <select class="form-control select2" name="id_parent" id="cari">
                            <option></option>
                            @foreach($data as $d)
                            <option value="{{$d->id_anggota}}">{{$d->nama}}</option>
                            @endforeach
                            </select>
                            @if($errors->has('id_parent'))
                                <div class="text-danger">
                                    {{ $errors->first('id_parent')}}
                                </div>
                            @endif
                            </div>
                        </div>
   
                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">ID Jabatan</label>
                        <div class="col-md-6">
                            <!-- <input type="text" name="id_jabatan" class="form-control" placeholder="ID Jabatan .."> -->
                            <select class="form-control select2" name="id_jabatan" id="carijabatan">
                            <option></option>
                            @foreach($pilihan as $value)
                                <option value="{{ $value->id_jabatan }}">{{$value->nama_jabatan}}
                                </option>
                            @endforeach</select>
                            @if($errors->has('id_jabatan'))
                                <div class="text-danger">
                                    {{ $errors->first('id_jabatan')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Nama Anggota</label>
                        <div class="col-md-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Anggota ..">

                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control" placeholder="Email ..">

                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Alamat Anggota</label>
                        <div class="col-md-6">
                            <textarea name="alamat" class="form-control" placeholder="Alamat Anggota .."></textarea>

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Handphone</label>
                        <div class="col-md-6">
                            <input type="text" name="no_handphone" class="form-control" placeholder="Handphone ..">

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('no_handphone')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password ..">

                             @if($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password')}}
                                </div>
                                
                            @endif
                            </div>
                        </div>
                        <br>
                            <input type="hidden" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input type="submit" class="btn btn-success" value="Simpan">
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
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
   $(function(){
    $('#cari1').select2({
        minimumInputLength: 1,
        ajax: {
                url: '{{ url("/cari") }}',
                dataType: 'json',
                data: function (params) {
                    console.log(params)
                    return {
                        q: $.trim(params.term),
                        type: 'public'
                    };
                },
                processResults: function (data, page) {
                        console.log(data);
                        return {
                            results: data,
                            id : data.id_jabatan,
                            text : data.nama_jabatan
                        };
                    },
            }
        }).on('select2:select', function (evt) {
                    var data = $(".select2 option:selected").text();
                });
});

</script>

<script type="text/javascript">
$("#cari").select2({
    placeholder:'select parent',
    allowClear:true
})

</script>

<script type="text/javascript">
$("#carijabatan").select2({
    placeholder:'select jabatan',
    allowClear:true
})

</script>

<!-- jQuery 3 -->

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
<!-- <script src="{{url('adminlte/bower_components/morris.js/morris.min.js')}}"></script> -->
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
<!-- <script src="{{url('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script> -->
<!-- AdminLTE App -->
<script src="{{url('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{url('adminlte/js/pages/dashboard.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte/js/demo.js')}}"></script>


</body>
</html>
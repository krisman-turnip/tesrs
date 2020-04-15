<!DOCTYPE html>
<html>
<!-- <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> -->

  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Penerimaan Barang
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- <a href="{{url('satuan/tambah')}}" class="btn btn-primary">Input Pemesanan Barang Baru</a> -->
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <form>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Supplier</label>
                                        <div class="col-md-10">
                                            <div class="col-md-3">
                                                <select name="select" class="form-control" value="{{ old('select') }}">
                                                    <option value="ktp_customer"></option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                            <label for="email" class="col-md-2 col-form-label text-md-right">Tanggal Terima</label>
                                            <div class="col-md-3">
                                                <input id="datepicker1" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input id="" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <!-- <div class="col-md-3">
                                                   
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">No Surat Jalan</label>
                                        <div class="col-md-10">
                                            <div class="col-md-3">
                                                <input id="" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                            <label for="email" class="col-md-2 col-form-label text-md-right">No PO</label>
                                            <div class="col-md-3">
                                                <select name="select" class="form-control" value="{{ old('select') }}">
                                                    <option value="ktp_customer">Unit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" >
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Keterangan</th>
                                                    <th>Jumlah PO</th>
                                                    <th>Di terima</th>
                                                    <th>Ditolak</th>
                                                    <th>Sisa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><input id="" type="text" class="form-control" name="fullname" required></td>
                                                    <td><input id="" type="text" class="form-control" name="fullname" required></td>
                                                    <td><input id="" type="text" class="form-control" name="fullname" required></td>
                                                    <td><input id="" type="text" class="form-control" name="fullname" required></td>
                                                    <td><input id="" type="text" class="form-control" name="fullname" required></td>
                                                    <td><input id="" type="text" class="form-control" name="fullname" required></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Memo</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <div class="col-md-5">
                                                <input id="" type="text" class="form-control" name="fullname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="col-md-11">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <input type="submit" class="btn btn-primary" value="Simpan"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
  $( function() {
    $("#datepicker").datepicker({ format: 'yyyy-mm-dd' });
  } );
</script>

<script>
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
</script>


 
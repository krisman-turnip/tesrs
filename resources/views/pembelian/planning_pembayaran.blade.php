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
        Planning Pembayaran
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
                                    <div class="form-group row">
                                        <form>
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Periode Pembuatan</label>
                                        <div class="col-md-10">
                                            <div class="col-md-3">
                                                <input id="datepicker" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <label for="email" class="col-md-1 col-form-label text-md-right">S/D</label>
                                            <div class="col-md-3">
                                                <input id="datepicker1" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <input type="submit" class="btn btn-primary" value="Search">    
                                            </div>
                                            <div class="col-md-3">
                                                <input id="" type="text" class="form-control" name="fullname" required>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" >
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Invoice</th>
                                                    <th>No Invoice</th>
                                                    <th>Supplier</th>
                                                    <th>Top</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Belum Bayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
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


 
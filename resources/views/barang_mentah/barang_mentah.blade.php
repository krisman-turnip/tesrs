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
        Daftar Bahan Mentah
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{url('barang_mentah/tambah')}}" class="btn btn-primary">Input Barang Mentah Baru</a>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Keterangan</th>
                                                    <th>Satuan Terkecil</th>
                                                    <th>Suplier</th>
                                                    <th>OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>kayu</td>
                                                    <td>kayu</td>
                                                    <td>cm</td>
                                                    <td>kayu sejahtera</td>
                                                    <td></td>
                                                    <td> 
                                                        <a href="satuan/edit/" class="btn btn-warning">Edit</a>
                                                        <a href="satuan/hapus/" class="btn btn-danger">Hapus</a>
                                                    </td>
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



 
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
        Daftar Barang Jadi
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{url('barang_jadi/tambah')}}" class="btn btn-primary">Input Barang Jadi Baru</a>
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
                                                    <th>Harga</th>
                                                    <th>OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                            @foreach($bj as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->nama_barang }}</td>
                                                    <td>{{ $p->keterangan }}</td>
                                                    <td>{{ $p->satuan_terkecil }}</td>
                                                    <td>{{ $p->harga_jual }}</td>
                                                    <td>
                                                        <a href="barang_jadi/edit/{{ $p->jadi_id }}" class="btn btn-warning">Edit</a>
                                                        <a href="barang_jadi/hapus/{{ $p->jadi_id }}" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                                @endforeach
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



 
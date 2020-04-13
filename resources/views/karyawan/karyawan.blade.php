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
        Daftar Karyawan
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{url('karyawan/tambah')}}" class="btn btn-primary">Input Karyawan Baru</a>
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
                                                    <th>Full Name</th>
                                                    <th>No HP</th>
                                                    <th>No KTP</th>
                                                    <th>Alamat</th>
                                                    <th>Bagian</th>
                                                    <th>Join Date</th>
                                                    <th>OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                @foreach($karyawan as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->fullname }}</td>
                                                    <td>{{ $p->no_hp }}</td>
                                                    <td>{{ $p->no_ktp }}</td>
                                                    <td>{{ $p->alamat }}</td>
                                                    <td>{{ $p->bagian }}</td>
                                                    <td>{{ $p->join_date }}</td>
                                                    <td> 
                                                        <a href="karyawan/edit/{{ $p->karyawan_id}}" class="btn btn-warning">Edit</a>
                                                        <a href="karyawan/hapus/{{ $p->karyawan_id }}" class="btn btn-danger">Hapus</a>
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



 
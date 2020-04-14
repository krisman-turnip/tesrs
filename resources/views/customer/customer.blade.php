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
        Daftar Customer
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{url('customer/tambah')}}" class="btn btn-primary">Input Customer Baru</a>
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
                                                    <th>Nama Customer</th>
                                                    <th>Alamat</th>
                                                    <th>No Telepon</th>
                                                    <th>Fax</th>
                                                    <th>Email</th>
                                                    <th>NPWP</th>
                                                    <th>Contact Person</th>
                                                    <th>OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                @foreach($customer as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->nama_customer }}</td>
                                                    <td>{{ $p->alamat }}</td>
                                                    <td>{{ $p->telepon }}</td>
                                                    <td>{{ $p->fax }}</td>
                                                    <td>{{ $p->email }}</td>
                                                    <td>{{ $p->npwp }}</td>
                                                    <td>{{ $p->contact_person }}</td>
                                                    <td> 
                                                        <a href="customer/edit/{{ $p->customer_id}}" class="btn btn-warning">Edit</a>
                                                        <a href="customer/hapus/{{ $p->customer_id }}" class="btn btn-danger">Hapus</a>
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



 
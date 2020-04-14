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
        Daftar Supplier
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{url('supplier/tambah')}}" class="btn btn-primary">Input Supplier Baru</a>
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
                                                    <th>Supplier Name</th>
                                                    <th>Contact Person</th>
                                                    <th>Address</th>
                                                    <th>Telpon</th>
                                                    <th>Fac</th>
                                                    <th>EmailDate</th>
                                                    <th>Cabang</th>
                                                    <th>Top Person</th>
                                                    <th>Bank</th>
                                                    <th>Bank Name</th>
                                                    <th>Bank No</th>
                                                    <th>Suplier Tax</th>
                                                    <th>Utang</th>
                                                    <th>Diskon No</th>
                                                    <th>DP</th>
                                                    <th>OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                @foreach($supplier as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->supplier_name }}</td>
                                                    <td>{{ $p->contact_person }}</td>
                                                    <td>{{ $p->address }}</td>
                                                    <td>{{ $p->telp }}</td>
                                                    <td>{{ $p->fax }}</td>
                                                    <td>{{ $p->email }}</td>
                                                    <td>{{ $p->cabang }}</td>
                                                    <td>{{ $p->top }}</td>
                                                    <td>{{ $p->bank }}</td>
                                                    <td>{{ $p->bank_name }}</td>
                                                    <td>{{ $p->bank_no }}</td>
                                                    <td>{{ $p->supplier_tax }}</td>
                                                    <td>{{ $p->utang_acc_id }}</td>
                                                    <td>{{ $p->diskon_acc_id }}</td>
                                                    <td>{{ $p->dp_acc_id }}</td>
                                                    <td> 
                                                        <a href="supplier/edit/{{ $p->supplier_id}}" class="btn btn-warning">Edit</a>
                                                        <a href="supplier/hapus/{{ $p->supplier_id }}" class="btn btn-danger">Hapus</a>
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



 
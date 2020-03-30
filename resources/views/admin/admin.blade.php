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
        Daftar Admin
      </h1>
    <section>
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="admin/tambah" class="btn btn-primary">Input Admin Baru</a>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Level</th>
                                                    <th>OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                @foreach($admin as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->name }}</td>
                                                    <td>{{ $p->email }}</td>
                                                    <td>{{ $p->level }}</td>
                                                    <td> 
                                                        <a href="admin/edit/{{ $p->id}}" class="btn btn-warning">Edit</a>
                                                        <a href="admin/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
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
            <div class="text-center">
            {{ $admin->links() }}
            </div>
        </div>
        
        </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
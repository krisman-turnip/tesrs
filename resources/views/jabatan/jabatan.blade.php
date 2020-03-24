<!DOCTYPE html>
<html>
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
    <section class="content-header">
      <h1 class="text-center">
        Daftar Level Jabatan
      </h1>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- <a href="jabatan/tambah" class="btn btn-primary">Input Level Baru</a> -->
                    <br/>
                    <br/>
                    <div class="row">
                    <div class="col-md-11">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Level</th>
                                <th>Keterangan</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($jabatan as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_jabatan }}</td>
                                <td>{{ $p->keterangan }}</td>
                                <td>
                                    <a href="jabatan/edit/{{ $p->id_jabatan }}" class="btn btn-warning">Edit</a>
                                    <a href="jabatan/hapus/{{ $p->id_jabatan }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
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
                <div class="text-center">
            {{ $jabatan->links() }}
            </div>
        </div>
        </div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
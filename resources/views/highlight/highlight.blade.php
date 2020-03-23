<!DOCTYPE html>
<html>
<head>
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
        Daftar Highlight
      </h1>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- <a href="admin/tambah" class="btn btn-primary">Input Admin Baru</a> -->
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Keterangan</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($hl as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ $p->keterangan }}</td>
                                <td> 
                                    <a href="highlight/nonaktif/{{ $p->id_highlight}}" class="btn btn-warning">Non Aktif</a>
                                    <!-- <a href="admin/hapus/{{ $p->id_highlight }}" class="btn btn-danger">Hapus</a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $hl->links() }}
        </div>
        
        </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
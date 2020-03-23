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
        Daftar Pembayaran Komisi
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
                                <th>Nama Anggota</th>
                                <th>Komisi</th>
                                <th>Approval </th>
                                <th>Tanggal Pembayaran</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($komisi as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->komisi }}</td>
                                <td>{{ $p->approval }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>
                                    <a href="komisi/download/{{ $p->id_komisi }}" class="btn btn-warning">Download</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $komisi->links() }}
        </div>
        
        </div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
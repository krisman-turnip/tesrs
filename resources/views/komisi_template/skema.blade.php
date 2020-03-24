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
        Daftar Skema Komisi
      </h1>
        <div class="container">
            <div class="card mt-2">
                <div class="card-body">
                    <a href="{{ url('komisiTemplate/skema') }}" class="btn btn-primary">Input Skema Baru</a>
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
                                <th>Nama jabatan</th>
                                <th>Nama Produk</th>
                                <th>Nama Template</th>
                                <th>Keterangan</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($komisi as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->namaJabatan }}</td>
                                <td>{{ $p->namaProduk }}</td>
                                <td>{{ $p->namaTemplate }}</td>
                                <td>{{ $p->keterangan }}</td>
                                <td> 
                                    <a href="komisiTemplate/skemaedit/{{ $p->id_komisi_template_trx}}" class="btn btn-warning">Edit</a>
                                    <a href="komisiTemplate/skemadelete/{{ $p->id_komisi_template_trx }}" class="btn btn-danger">Hapus</a>
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
            {{ $komisi->links() }}
        </div>
        
        </div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
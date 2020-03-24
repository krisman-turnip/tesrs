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
        Daftar Materi
      </h1>
        <div class="container">
           <br>
           <form action="{{url('materiCari')}}" method="GET">
        <br>
        <br>
        <div class="form-group">
          <div class="col-md-2">
          </div>          
            <div class="col-md-2">
                <select name="select" class="form-control" value="{{ old('select') }}">
                <option value="nama_materi">Nama Materi</option>
                    <option value="nama_produk">Nama Produk</option>
                </select>
            </div>
                <div class="col-md-3">
                <input type="text" name="cari" class="form-control" placeholder="Cari .." value="{{ old('cari') }}">
                </div>
                <input type="submit" value="CARI">
                <input type="hidden" name="_method" value="get">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            
        </form>
        </div>
           <div class="card mt-5">
                <div class="card-body">
     
            <!-- <a href="materi/upload" class="btn btn-primary">Input Materi Baru</a> -->
        
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
                        <th>Nama Materi</th>
                        <th>Produk</th>
                        <th>Keterangan</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($materi as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->nama_materi }}</td>
                        <td>{{ $p->nama_produk }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td>
                            <a href="materi/download/{{ $p->id_materi }}" class="btn btn-warning">Download</a>
                            <a href="materi/hapus/{{ $p->id_materi }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
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
          {{ $materi->links() }}
        </div>
    </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
<!DOCTYPE html>
<html>
  @include('member.layout.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('member.layout.sidebar')
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
        Pengajuan Produk
      </h1>
        <div class="container">
        <form action="{{url('produkanggota/pengajuanCari')}}" method="GET">
        <br>
        <br>
        <div class="form-group">
        <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <select name="select" class="form-control" value="{{ old('select') }}">
                    <option value="ktp_customer">KTP Customer</option>
                    <option value="nama_customer">Nama Customer</option>
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
                                <th>Nama Produk</th>
                                <th>Nama Customer</th>
                                <th>No KTP</th>
                                <th>Sisa</th>
                                <th>Tanggal Berangkat</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp  
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->nama_customer }}</td>
                                <td>{{ $p->ktp_customer }}</td>
                                <td>{{ $p->sisa }}</td>
                                <td>{{ $p->tanggal_berangkat }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>
                                    <a href="batal/{{ $p->id_transaksi_detail }}"  onclick="return confirm('Are you sure?')" class="btn btn-warning">Batal</a>
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
            {{ $produk->links() }}
            </div>
        </div>
        </div>
        

  <!-- /.content-wrapper -->
@include('member.layout.footer')

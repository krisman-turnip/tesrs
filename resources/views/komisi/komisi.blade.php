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
        Daftar Komisi Anggota
      </h1>
    </section>
        <div class="content">
            <form action="{{url('komisiCari')}}" method="GET">
            <br>
            <br>
            <div class="form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <select name="select" class="form-control" value="{{ old('select') }}">
                        <option value="id_anggota">ID Anggota</option>
                        <option value="nama">Nama Anggota</option>
                        <option value="nama_jabatan">Nama Jabatan</option>
                        <option value="no_handphone">No Hp</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="cari" class="form-control" placeholder="Cari .." value="{{ old('cari') }}">
                </div>
                <div class="col-md-1">
                    <input type="submit" value="CARI">
                </div>
                    <input type="hidden" name="_method" value="get">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
        </form>
            <div class="card mt-5">
                    <!-- <a href="jabatan/tambah" class="btn btn-primary">Input </a> -->
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
                                                <th>Nama Anggota</th>
                                                <th>Email</th>
                                                <th>No Hp</th> 
                                                <th>Jabatan</th>
                                                <th>Komisi</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no=1; @endphp
                                            @foreach($anggota as $p)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->no_handphone }}</td>
                                                <td>{{ $p->nama_jabatan }}</td>
                                                <td>{{ $p->saldo }}</td>
                                                <td>
                                                    <a href="pembayaran/{{ $p->id_anggota }}" class="btn btn-warning">Pembayaran</a>
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
            {{ $anggota->links() }}
        </div>
    </div>
</div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
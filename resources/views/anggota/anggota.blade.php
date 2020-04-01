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
        Daftar Anggota
      </h1>
    </section>
    <section class="content">
            <form action="{{url('anggotaCari')}}" method="GET">
            <br>
            <br>
            <div class="form-group">
                <div class="col-md-2">
                </div>
            <div class="col-md-2">
                <select name="select" class="form-control">
                    <option value="id_anggota">ID Anggota</option>
                    <option value="nama">Nama Anggota</option>
                    <option value="nama_jabatan">Nama Jabatan</option>
                    <option value="no_handphone">No Hp</option>
                </select>
            </div>
                <div class="col-md-3">
                    <input type="text" name="cari" class="form-control" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
                </div>
                <div class="col-md-2">
                <input type="submit" value="CARI">
            </div>
                <input type="hidden" name="_method" value="get">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            
        </form>
        </div>
        <br>
        <br>
        <div class="row">
                <div class="card-body">
                <div class="col-md-12">
                    <div class="box">
                    <!-- <a href="anggota/tambah" class="btn btn-primary">Input Anggota Baru</a> -->
                    <br/>
                    <br/>
                    
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>level</th>
                                            <th>Nama Parent</th>
                                            <th>Email</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1; @endphp
                                        @foreach($anggota as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->nama_jabatan }}</td>
                                            <td>{{ $p->namaParent }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td>
                                                <a href="anggota/profile/{{ $p->id_anggota }}" class="btn btn-warning">Profile</a>
                                                <!-- <a href="anggota/edit/{{ $p->id_anggota }}" class="btn btn-warning">Edit</a>
                                                <a href="anggota/hapus/{{ $p->id_anggota }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a> -->
                                                <!-- <a href="anggota/reset/{{ $p->id_anggota }}" onclick="return confirm('Are you sure?')" class="btn btn-warning">Reset Password</a> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 
<!DOCTYPE html>
<html>
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           
                        </div>
                    @endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h3>Tambah Karyawan</h3> 
                </div>
                <a href="{{url('karyawan')}}" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('karyawan/prosestambah')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Full Name</label>

                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control" name="fullname" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">No HP</label>

                                        <div class="col-md-6">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="no_hp" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">No KTP</label>

                                        <div class="col-md-6">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="no_ktp" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-4 col-form-label text-md-right">Alamat</label>

                                        <div class="col-md-6">
                                            <input id="menu" type="text" class="form-control @error('password') is-invalid @enderror" name="alamat" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-4 col-form-label text-md-right">Bagian</label>

                                        <div class="col-md-6">
                                            <input id="menu" type="text" class="form-control @error('password') is-invalid @enderror" name="bagian" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-4 col-form-label text-md-right">Join Date</label>

                                        <div class="col-md-6">
                                            <input id="datepicker1" type="text" class="form-control @error('password') is-invalid @enderror" name="join_date" >

                                        </div>
                                    </div>

                                    <input type="hidden" name="_method" value="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                            <input type="submit" class="btn btn-primary" value="Simpan">
                                        
                                        </div>
                                    </div>
                                </form>
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
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>
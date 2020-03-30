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
                    <strong>TAMBAH ADMIN</strong> 
                </div>
                <a href="../admin" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('admin/store')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Level</label>

                                        <div class="col-md-6">
                                            <select id="email" type="text" class="form-control" name="level" >
                                            <option value="admin">Admin</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="finance">Finance</option>
                                            <option value="akunting">Akunting</option>
                                            <option value="multiAdmin">MultiAdmin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

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
 
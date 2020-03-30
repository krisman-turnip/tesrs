<!DOCTYPE html>
<html>
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Update Produk
      </h1>
    </section>
    <br>
    <div class="content">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <a href="{{url('admin')}}" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                                    <form method="post" action="{{ url('/admin/update/'.(isset($admin) ? $admin->id : '')) }}">

                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}  

                                        <div class="form-group row">
                                        <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>
                                            <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Name .." value=" {{ $admin->name }}" >

                                            @if($errors->has('name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('name')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                            <input type="text" name="email" class="form-control" placeholder="Email .." value=" {{ $admin->email }}">

                                            @if($errors->has('email'))
                                                <div class="text-danger">
                                                    {{ $errors->first('email')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-2 col-form-label text-md-right">Level</label>

                                            <div class="col-md-6">
                                                <select id="email" type="text" class="form-control" name="level" >
                                                <option value="admin">Admin</option>
                                                <option value="marketing">Marketing</option>
                                                <option value="finance">Finance</option>
                                                <option value="akunting">Akunting</option>
                                                <option value="multiadmin">MultiAdmin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>
                                            <div class="col-md-6">
                                            <input type="password" name="password" class="form-control" placeholder="Password .." value=" {{ $admin->password }}">

                                            @if($errors->has('password'))
                                                <div class="text-danger">
                                                    {{ $errors->first('password')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        <input type="hidden" name="_method" value="put">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
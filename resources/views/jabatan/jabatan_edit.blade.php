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
        Update Jabatan
      </h1>
      <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                <a href="../../jabatan" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <div class="row">
                    <div class="col-md-11">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">
                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                    <form method="post" action="{{ url('/jabatan/update/'.(isset($jabatan) ? $jabatan->id_jabatan : '')) }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}  
                            <input type="hidden" name="id_jabatan" class="form-control" placeholder="ID Level  .." value=" {{ $jabatan->id_jabatan }}" disabled>

                        <div class="form-group row">
                        <label for="nama_jabatan" class="col-md-2 col-form-label text-md-right">Nama Level</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Level .." value=" {{ $jabatan->nama_jabatan }}">

                            @if($errors->has('nama_jabatan'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_jabatan')}}
                                </div>
                            @endif
                            </div>
                        </div>


                        <div class="form-group row">
                        <label for="keterangan" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                            <textarea name="keterangan" class="form-control" placeholder="keterangan .."> {{ $jabatan->keterangan }} </textarea>

                             @if($errors->has('keterangan'))
                                <div class="text-danger">
                                    {{ $errors->first('keterangan')}}
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
        </div>
        </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
 
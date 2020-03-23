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
    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <strong>Kirim Email</strong> 
                </div>
                <div class="card-body">
                    <!-- <a href="../admin" class="btn btn-primary">Kembali</a> -->
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    
                    <form method="POST" action="{{url('email/kirim')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <select id="cek" type="text" class="form-control selected2" name="email" multiple="multiple" >
                                    <option></option>
                                    @foreach($jabatan as $value)
                                    <option value="{{ $value->id_jabatan }}">{{$value->nama_jabatan}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <st rong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">Judul</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <st rong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isi" class="col-md-4 col-form-label text-md-right">Isi</label>

                            <div class="col-md-6">
                                <textarea id="summary-ckeditor" type="text" class="form-control " name="email_body" ></textarea>

                            </div>
                        </div>
                        <input type="hidden" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Kirim">
                             
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->

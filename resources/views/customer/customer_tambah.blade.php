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
                    <h3>Tambah Customer</h3> 
                </div>
                <a href="{{url('customer')}}" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('customer/prosestambah')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Nama Customer </label>

                                        <div class="col-md-4">
                                            <input id="email" type="text" class="form-control" name="nama_customer" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Alamat</label>

                                        <div class="col-md-4">
                                            <input id="alamat" type="text" class="form-control @error('password') is-invalid @enderror" name="alamat" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Telepon</label>

                                        <div class="col-md-4">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="telepon" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Email</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control @error('password') is-invalid @enderror" name="email" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">NPWP</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control @error('password') is-invalid @enderror" name="npwp" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Fax</label>

                                        <div class="col-md-4">
                                            <input id="" type="text" class="form-control @error('password') is-invalid @enderror" name="fax" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Contact Person</label>

                                        <div class="col-md-4">
                                            <input id="" type="text" class="form-control @error('password') is-invalid @enderror" name="contact_person" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                           
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
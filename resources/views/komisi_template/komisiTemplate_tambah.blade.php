<!DOCTYPE html>
<html>
<head>
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
                    <h3>Tambah Template</h3> 
                </div>
                <div class="card-body">
                    <a href="{{url('komisiTemplate')}}" class="btn btn-primary">Kembali</a>
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    <div class="row">
                    <div class="col-md-12">
                    <div class="box">
                    <div class="box-body">
                    <form method="POST" action="{{url('komisiTemplate/store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Nama Template</label>

                            <div class="col-md-5">
                                <input id="name" type="text" name="nama" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Komisi Level 1</label>

                            <div class="col-md-5">
                                <input id="email" type="text" class="form-control" name="komisi1" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="komisi2" class="col-md-2 col-form-label text-md-right">Komisi Level 2</label>

                            <div class="col-md-5">
                            <input id="name" type="text" name="komisi2" class="form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Komisi Level 3</label>

                            <div class="col-md-5">
                                <input id="komisi3" type="text" class="form-control" name="komisi3" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Poin Level 1</label>

                            <div class="col-md-5">
                                <input id="komisi3" type="text" class="form-control" name="poin1" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Poin Level 2</label>

                            <div class="col-md-5">
                                <input id="komisi3" type="text" class="form-control" name="poin2" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Poin Level 3</label>

                            <div class="col-md-5">
                                <input id="komisi3" type="text" class="form-control" name="poin3" required>

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
        </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
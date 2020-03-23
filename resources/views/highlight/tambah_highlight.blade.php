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
        <div class="container">
           
        <div class="card mt-3">
                <div class="card-header text-center">
                    <H3>Tambah Highlight</h3> 
                    <br>
                    <br>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{url('highlight/prosesupload')}}">
                
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Judul Highlight</label>
                        <div class="col-md-6">
                        <input type="text" name="judul_hl" class="form-control"/> 
                        </div>
                </div>
                    <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">File Upload</label>
                        <div class="col-md-6">
                            <input type="file" name="file_hl">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Deskripsi</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="deskripsi" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>
                </div>

        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
  <!-- /.content-wrapper -->
@include('layouts.footer')

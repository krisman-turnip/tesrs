<!DOCTYPE html>
<html>
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content">    
        <div class="card mt-3">
            <div class="card-header text-center">
                <H3>Tambah Highlight</h3> 
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
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
            </div>
        </div>
    </div>
</div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- /.content-wrapper -->
@include('layouts.footer')

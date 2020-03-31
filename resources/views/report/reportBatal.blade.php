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
                    <strong>Report Komisi Batal</strong> 
                </div>
                <a href="../admin" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form action="{{url('exportBatal')}}" method="GET">
                                    <br>
                                    <br>
                                        <div class="form-group row">
                                        <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Tanggal Awal</label>
                                            <div class="col-md-6">
                                            <input type="text" name="nama" id="datepicker1" class="form-control" required placeholder="Tanggal Awal .." >
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Tanggal Akhir</label>
                                            <div class="col-md-6">
                                            <input type="text" name="nama_jabatan" id="datepicker2" class="form-control" required placeholder="Tanggal Akhir .." >
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="submit" value="Submit">
                                            <input type="hidden" name="_method" value="get">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        </div>
                                        </div>
                                        <!-- <div class="col-md-3.5">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Report</button>
                                        </div> -->
                                    </div>
                                </form>
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

<script>
  $( function() {
    $("#datepicker2").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>

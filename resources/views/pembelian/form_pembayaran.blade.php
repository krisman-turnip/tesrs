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
                    <h3>Form Pembayaran</h3> 
                </div>
                <!-- <a href="{{url('satuan')}}" class="btn btn-primary">Kembali</a> -->
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('satuan/prosestambah')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <div col-md-12>
                                            <label for="name" class="col-md-1 col-form-label text-md-right">No Invoice</label>
                                            <div class="col-md-3">
                                                <input id="username" type="text" class="form-control" name="nama_satuan" value="" required>
                                            </div>
                                            <label for="name" class="col-md-1 col-form-label text-md-right">Jatuh Tempo</label>
                                            <div class="col-md-3">
                                                <input id="username" type="text" class="form-control" name="nama_satuan" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-1 col-form-label text-md-right">Supplier</label>
                                        <div class="col-md-3">
                                            <input id="username" type="text" class="form-control" name="nama_satuan" value="" required autocomplete="name" autofocus>
                                        </div>
                                        <label for="name" class="col-md-1 col-form-label text-md-right">Akun Pembayaran</label>
                                        <div class="col-md-3">
                                            <input id="username" type="text" class="form-control" name="nama_satuan" value="" required >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-1 col-form-label text-md-right">Tanggal</label>
                                        <div class="col-md-3">
                                            <input id="username" type="text" class="form-control" name="nama_satuan" value="" required >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-1 col-form-label text-md-right">Pembayaran</label>
                                        <div class="col-md-3">
                                            <input id="username" type="text" class="form-control" name="nama_satuan" value="" required >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-1 col-form-label text-md-right">Sisa Tagihan</label>
                                        <div class="col-md-3">
                                            <textarea id="username" type="text" class="form-control" name="nama_satuan" value="" ></textarea>
                                        </div>
                                    </div>

                                    <input type="hidden" name="_method" value="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                            <input type="submit" class="btn btn-primary" value="Pay">
                                        
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
    $("#datepicker").datepicker({ format: 'yyyy-mm-dd' });
  } );
</script>
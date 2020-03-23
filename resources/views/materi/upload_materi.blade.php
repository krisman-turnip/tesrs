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
                    <H1>TAMBAH MATERI</h1> 
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{url('materi/prosesupload')}}">
                
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Nama materi</label>
                        <div class="col-md-6">
                        <select class="form-control select2" name="cari" id="cari" required>
                            <option></option>
                            @foreach($pilihan as $value)
                                <option value="{{ $value->id_produk }}">{{$value->nama_produk}}
                                </option>
                            @endforeach</select>
                        </div>
                </div>
                    <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">File Upload</label>
                        <div class="col-md-6">
                            <input type="file" name="nama_materi">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="keterangan" required></textarea>
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
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$("#cari").select2({
    placeholder:'select produk',
    allowClear:true
})
</script>
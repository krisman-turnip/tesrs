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
      <h3 class="text-center">
        Edit Foto Anggota
      </h3>
      <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                <a href="{{url('anggota/profile/'.(isset($anggota) ? $anggota->id_anggota : ''))}}" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    

                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                    <form method="post" action="{{ url('/updatePoto') }}" enctype="multipart/form-data">
                    <input type="hidden" name="id_anggota" value="{{ $anggota->id_anggota }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                    <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Upload Foto</label>
                        <div class="col-md-6">
                            <input type="text" name="" value="{{ $anggota->file_ktp }}">
                            <input type="file" name="file_ktp" value="{{ $anggota->file_ktp }}">
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
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div> 
<!-- ./wrapper -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
$("#cari").select2({
    placeholder:'select nama',
    allowClear:true
})

</script>

<script type="text/javascript">
$("#carijabatan").select2({
    placeholder:'select jabatan',
    allowClear:true
})

</script>

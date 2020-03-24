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
        Edit Anggota
      </h1>
      <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                <a href="{{url('anggota/profile/'.(isset($anggota) ? $anggota->id_anggota : ''))}}" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    <div class="row">
                    <div class="col-md-11">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">

                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                    <form method="post" action="{{ url('/update/'.(isset($anggota) ? $anggota->id_anggota : '')) }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}  

                        <div class="form-group row"> 
                        <label for="id_parent" class="col-md-2 col-form-label text-md-right">ID Parent</label>
                            <div class="col-md-6">
                            <!-- <input type="text" name="id_parent" class="form-control" placeholder="ID Parent  .." value=" {{ $anggota->id_parent }}"> -->
                            <select class="form-control select2" name="id_parent" id="cari" value=" ">
                            <option value="{{$anggota->id_parent}}">{{$anggota->namaParent}}</option>
                            @foreach($data as $d)
                            <option value="{{$d->id_anggota}}">{{$d->nama}}</option>
                            @endforeach
                            </select>
                            @if($errors->has('id_parent'))
                                <div class="text-danger">
                                    {{ $errors->first('id_parent')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="id_jabatan" class="col-md-2 col-form-label text-md-right">ID Jabatan</label>
                            <div class="col-md-6">
                            <!-- <input type="text" name="id_jabatan" class="form-control" placeholder="ID Jabatan  .." value=" {{ $anggota->id_jabatan }}"> -->
                            <select class="form-control select2" name="id_jabatan" id="carijabatan" value=" ">
                            <option value=" {{ $anggota->id_jabatan }}">{{ $anggota->nama_jabatan }}</option>
                            @foreach($pilihan as $value)
                            <option value="{{ $value->id_jabatan }}">{{$value->nama_jabatan}}
                                </option>
                            @endforeach</select>
                            @if($errors->has('id_jabatan'))
                                <div class="text-danger">
                                    {{ $errors->first('id_jabatan')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="nama" class="col-md-2 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama .." value=" {{ $anggota->nama }}">

                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                            <input type="text" name="email" class="form-control" placeholder="Email .." value=" {{ $anggota->email }}">

                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat</label>
                            <div class="col-md-6">
                            <input name="alamat" class="form-control" placeholder="Alamat .." value="{{ $anggota->alamat }} ">

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="handphone" class="col-md-2 col-form-label text-md-right">Handphone</label>
                            <div class="col-md-6">
                            <input name="no_handphone" class="form-control" placeholder="No Handphone .." value="{{ $anggota->no_handphone }}">

                             @if($errors->has('no_handphone'))
                                <div class="text-danger">
                                    {{ $errors->first('no_handphone')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="no_ktp" class="col-md-2 col-form-label text-md-right">No KTP</label>
                        <div class="col-md-6">
                            <input type="text" name="no_ktp" class="form-control" value="{{ $anggota->no_ktp }}">

                             @if($errors->has('no_ktp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_ktp')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="no_npwp" class="col-md-2 col-form-label text-md-right">No NPWP</label>
                        <div class="col-md-6">
                            <input type="text" name="no_npwp" class="form-control" value="{{ $anggota->no_npwp }}">

                             @if($errors->has('no_npwp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_npwp')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                    <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Upload Foto</label>
                        <div class="col-md-6">
                            <input type="text" name="" value="{{ $anggota->file_ktp }}">
                            <input type="file" name="file_ktp" value="{{ $anggota->file_ktp }}">
                        </div>
                    </div> -->

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

<!DOCTYPE html>
<html>
<head>
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  <div class="content-wrapper">
<section class="content-header">
    <h1 class="text-center">
    Pembayaran Komisi
    </h1>
</section>
    <div class="content">
        <div class="card mt-5">
            <div class="card-header text-center">
                </div>
                <div class="card-body">
                    <a href="{{ url('komisi') }}" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                                    <form method="post" action="{{ url('/bayar/'.(isset($anggota) ? $anggota->id_anggota : '')) }}"  enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}  
                                        <input type="hidden" name="id_anggota" class="form-control" placeholder="Nama .." value=" {{ $anggota->id_anggota }}" >
                                        <div class="form-group row">
                                        <label for="nama" class="col-md-2 col-form-label text-md-right">Nama</label>
                                            <div class="col-md-6">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama .." value=" {{ $anggota->nama }}" disabled>

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
                                            <input type="text" name="email" class="form-control" placeholder="Email .." value=" {{ $anggota->email }}" disabled>

                                            @if($errors->has('email'))
                                                <div class="text-danger">
                                                    {{ $errors->first('email')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label for="handphone" class="col-md-2 col-form-label text-md-right">Handphone</label>
                                            <div class="col-md-6">
                                            <input name="no_handphone" class="form-control" placeholder="No Handphone .." value=" {{ $anggota->no_handphone }} " disabled>

                                            @if($errors->has('no_handphone'))
                                                <div class="text-danger">
                                                    {{ $errors->first('no_handphone')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label for="saldo" class="col-md-2 col-form-label text-md-right">Saldo</label>
                                            <div class="col-md-6">
                                            <input name="saldo" class="form-control" placeholder="Saldo .." value=" {{ $anggota->saldo }}" >

                                            @if($errors->has('saldo'))
                                                <div class="text-danger">
                                                    {{ $errors->first('saldo')}}
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label for="pembayaran" class="col-md-2 col-form-label text-md-right">Jumlah Pembayaran</label>
                                            <div class="col-md-6">
                                            <input name="pembayaran" class="form-control" placeholder="Pembayaran .." required> 

                                            @if($errors->has('pembayaran'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pembayaran')}}
                                                </div> 
                                            @endif
                                            </div>
                                        </div>

                                        <h3>Bukti Bayar</h3>
                                        <div class="form-group row">
                                        <label for="pembayaran" class="col-md-2 col-form-label text-md-right">Upload Bukti Bayar </label>
                                            <div class="col-md-6">
                                                <input type="file" name="bukti_transfer">
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
                </div>
            </div>
        </div>
</div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
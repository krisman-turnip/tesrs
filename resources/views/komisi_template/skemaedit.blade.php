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
    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <strong>TAMBAH ADMIN</strong> 
                </div>
                <div class="card-body">
                    <a href="{{url('tampilSkema')}}" class="btn btn-primary">Kembali</a>
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    
                    <form method="POST" action="{{ url('/komisiTemplate/skemaupdate/'.(isset($komisi) ? $komisi->id_komisi_template_trx : '')) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Jabatan</label>

                            <div class="col-md-5">
                                <select class="form-control select2" name="jabatan" id="carijabatan" value=" ">
                                    <option value="{{ $komisi->id_jabatan}}">{{$komisi->namaJabatan}}</option>
                                    @foreach($jabatan as $d)
                                    <option value="{{$d->id_jabatan}}">{{$d->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Produk</label>

                            <div class="col-md-5">
                                <select class="form-control select2" name="produk" id="cariproduk" value=" ">
                                    <option value="{{ $komisi->id_produk}}">{{$komisi->namaProduk}}</option>
                                    @foreach($produk as $d)
                                    <option value="{{$d->id_produk}}">{{$d->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Template</label>

                            <div class="col-md-5">
                                <select class="form-control select2" name="template" id="caritemplate" value=" ">
                                    <option value="{{ $komisi->id_template_komisi}}">{{$komisi->namaTemplate}}</option>
                                    @foreach($skema as $d)
                                    <option value="{{$d->id_template_komisi}}">{{$d->nama_template}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Keterangan</label>

                            <div class="col-md-5">
                                <input id="" type="text" class="form-control" name="keterangan" value="{{$komisi->keterangan}}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$("#cariproduk").select2({
    placeholder:'select produk',
    allowClear:true
})
</script>

<script type="text/javascript">
$("#carijabatan").select2({
    placeholder:'select jabatan',
    allowClear:true
})
</script>
<script type="text/javascript">
$("#caritemplate").select2({
    placeholder:'select template',
    allowClear:true
})
</script>

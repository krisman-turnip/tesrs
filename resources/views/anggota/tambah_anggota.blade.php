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
  <br/>
  <div class="col-md-8">
  <!-- <select class="form-control select2" style="width:500px;" name="cari" id="cari"></select> -->
  </div>
</div>
    <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH ANGGOTA</strong> 
                </div>
                <div class="card-body">
                    <a href="../home" class="btn btn-primary">Kembali</a>
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{url('anggota/store')}}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">ID Anggota</label>
                            <div class="col-md-6">
                            <input type="text" name="id_anggota" class="form-control" placeholder="ID Anggota .." required>

                            @if($errors->has('id_anggota'))
                                <div class="text-danger">
                                    {{ $errors->first('id_anggota')}}
                                </div>
                            @endif
                            </div>
                        </div>


                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">ID Parent</label>
                            <div class="col-md-6">
                            <!-- <input type="text" name="id_parent" class="form-control" placeholder="ID Parent .."> -->
                            <select class="form-control select2" name="id_parent" id="cari">
                            <option value=""></option>
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
                        <label for="email" class="col-md-2 col-form-label text-md-right">ID Jabatan</label>
                        <div class="col-md-6">
                            <!-- <input type="text" name="id_jabatan" class="form-control" placeholder="ID Jabatan .."> -->
                            <select class="form-control select2" name="id_jabatan" id="carijabatan">
                            <option value=""></option>
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
                            <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Upload Foto</label>
                            <div class="col-md-6">
                                <input type="file" name="file_ktp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Nama Anggota</label>
                        <div class="col-md-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Anggota .." required>

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
                            <input type="email" name="email" class="form-control" placeholder="Email .." required>

                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Alamat Anggota</label>
                        <div class="col-md-6">
                            <textarea name="alamat" class="form-control" placeholder="Alamat Anggota .." required></textarea>

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Handphone</label>
                        <div class="col-md-6">
                            <input type="text" name="no_handphone" class="form-control" placeholder="Handphone .." required>

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('no_handphone')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="no_ktp" class="col-md-2 col-form-label text-md-right">No KTP</label>
                        <div class="col-md-6">
                            <input type="text" name="no_ktp" class="form-control" placeholder="No KTP .." required>

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
                            <input type="text" name="no_npwp" class="form-control" placeholder="No NPWP ..">

                             @if($errors->has('no_npwp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_npwp')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <br>
                            <input type="hidden" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input type="submit" class="btn btn-success" value="Simpan">
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
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
   $(function(){
    $('#cari1').select2({
        minimumInputLength: 1,
        ajax: {
                url: '{{ url("/cari") }}',
                dataType: 'json',
                data: function (params) {
                    console.log(params)
                    return {
                        q: $.trim(params.term),
                        type: 'public'
                    };
                },
                processResults: function (data, page) {
                        console.log(data);
                        return {
                            results: data,
                            id : data.id_jabatan,
                            text : data.nama_jabatan
                        };
                    },
            }
        }).on('select2:select', function (evt) {
                    var data = $(".select2 option:selected").text();
                });
});

</script>

<script type="text/javascript">
$("#cari").select2({
    placeholder:'select parent',
    allowClear:true
})

</script>

<script type="text/javascript">
$("#carijabatan").select2({
    placeholder:'select jabatan',
    allowClear:true
})

</script>

<!-- jQuery 3 -->

</body>
</html>
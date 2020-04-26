<!DOCTYPE html>
<html>
<!-- <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> -->

  @include('layouts.headerBaru')
  <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Header (Page header) -->
    <section class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- <a href="{{url('user/tambah')}}" class="btn btn-primary">Input User Baru</a> -->
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                <h2>MASTER PRODUK</h2>
                            <br>
                                <div class="col-md-12">
                                    <a href="">MASTER TEMA</a> | <a href="{{url('user')}}">ADDITIONAL OPTIONS</a> | <a href="">IMPORTANT NOTE</a>
                                </div>
                                <br>
                                <br>
                                Buat Master Additional Option
                                <hr>
                                <form method="POST" action="{{url('user/prosestambah')}}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name" class="col-md col-form-label text-md-right">ID Additional Option</label>

                                        <div class="col-md">
                                            <input id="produk_id" type="text" class="form-control" name="produk_id" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md col-form-label text-md-right">Nama Produk Additional Option</label>

                                        <div class="col-md">
                                            <input id="nama_produk" type="text" class="form-control" name="nama_produk" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md col-form-label text-md-right">Harga Pokok Porduk(HPP)</label>

                                        <div class="col-md">
                                            <input id="harga_pokok" type="text" class="form-control" name="harga_pokok" >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md col-form-label text-md-right">Harga Jual</label>

                                        <div class="col-md">
                                            <input id="harga_jual" type="text" class="form-control" name="harga_jual" >

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
                                <br>
                                Data Master Additional Option
                                <hr>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" >
                                            <thead>
                                                
                                            </thead>
                                            <tbody>
                                            @php $no=1; @endphp
                                                @foreach($user as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->produk_id }}</td>
                                                    <td>{{ $p->nama_produk }}</td>
                                                    <td>{{ $p->harga_pokok }}</td>
                                                    <td>{{ $p->harga_jual }}</td>
                                                    <td> 
                                                        <a href="user/edit/{{ $p->produk_id}}" class="btn btn-warning">Detail</a>
                                                        <a href="user/edit/{{ $p->produk_id}}" class="btn btn-warning">Edit</a>
                                                        <a href="user/hapus/{{ $p->produk_id }}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="text-center">
                                            <img src="img_login/sidoarjo.png" height="20%" width="20%"> 
                                        </div>
                                    <br>
                                    <a href="">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                                            <div class="info-box-content">
                                            <span class="info-box-number">Dashboard</span>
                                            <span class="info-box-text">Merupakan preview dari aktifitas bisnis yang adna lakukan</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                                            <div class="info-box-content">
                                            <span class="info-box-number">TRANSAKSI</span>
                                            <span class="info-box-text">Melihat seluruh aktifitas transaksi yang telah dilakukan</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                                            <div class="info-box-content">
                                            <span class="info-box-number"> PRODUK</span>
                                            <span class="info-box-text">Menambahkan produk beserta komponen dari produk</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                    <a href="">

                                        <div class="info-box">
                                            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                                            <div class="info-box-content">
                                            <span class="info-box-number">MEMBER</span>
                                            <span class="info-box-text">Data member dan aktifitas transaksi yang dilakukan</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                    <a href="">

                                        <div class="info-box">
                                            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                                            <div class="info-box-content">
                                            <span class="info-box-number">LAPORAN</span>
                                            <span class="info-box-text">Laporan bisnis untuk membantu evaluasi dan analisa bisnis</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
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
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



 
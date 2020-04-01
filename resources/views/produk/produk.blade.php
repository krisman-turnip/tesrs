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
        Daftar Produk
      </h1>
    </section>
    <section class="content">
        <br>
        <br>
        <form action="{{url('produkCari')}}" method="GET" class="form-horizontal">
            <div class="form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <select name="select" class="form-control">
                        <option value="nama_produk">Nama Produk</option>
                        <option value="id_produk">ID Produk</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="cari" class="form-control" placeholder="Cari .." value="{{ old('cari') }}">
                </div>  
                <div class="col-md-3">  
                    <input type="submit" value="CARI">
                </div>
                    <input type="hidden" name="_method" value="get">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
            </div>
            <!-- <a href="{{url('produk/tambah')}}" class="btn btn-primary">Input Produk Baru</a> -->
            <!-- <div class="row">
                <div class="box">
                    <div class="box-body">
                @foreach($produk as $p)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                
                     /.info-box-content -->
                            <!-- </div> -->
                <!-- /.info-box -->
                        <!-- </div> -->
                <!-- /.col -->
                <!-- @endforeach -->
                    <!-- </div> -->
                <!-- </div>
            </div>  -->
            <div class="content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            @foreach($produk as $p) 
                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-body">
                                        <h4 >{{ $p->nama_produk }}</h4>
                                        <div class="col-sm-4"><img width="100%" height="100%" src="{{ url('/data_banner/'.$p->file_banner) }}" ></div>
                                            <div class="col-sm-5">
                                                <!-- @foreach($subproduk as $ppp) {{ $ppp->namaSubProduk }} Harga {{ $ppp->HargaSub }}<br> @endforeach  <br> -->
                                                
                                                <!-- <a href="{{ url('/produkanggotainput/'.(isset($p) ? $p->id_produk : '')) }}" class="btn btn-primary">Edit</a> -->
                                                <!-- <input data-id="{{ $p->nama_produk }}" data-todo="{{ $p->id_produk }}" data-target="#editTodoDialog" class="open-EditTodo btn btn-warning" data-toggle="modal" type="submit" value="submit"/></div> -->
                                                    <!-- <div class="col-sm-4">Tanggal Keberangkatan {{ $p->tanggal_berangkat }}    
                                                    </div> -->
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                            Nama
                                                            </td>
                                                            <td>
                                                            Tanggal Expired
                                                            </td>
                                                            <td>
                                                            Opsi
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            {{ $p->namaSProduk}}
                                                            </td>
                                                            <td>
                                                            {{ $p->tanggal_expired }}
                                                            </td>
                                                            <td>
                                                            <a href="produkS/hapus/{{ $p->id_sub_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                            Tanggal Keberangkatan
                                                            </td>
                                                            <td>
                                                            Tanggal Expired
                                                            </td>
                                                            <td>
                                                            Opsi
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            {{ $p->tanggal_berangkat }}
                                                            </td>
                                                            <td>
                                                            {{ $p->tanggal_expired }}
                                                            </td>
                                                            <td>
                                                            <a href="produkT/hapus/{{ $p->idProduk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <a href="produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
                                                <a href="produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                  
                                </div>   
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        <div class="text-center">
            {{ $produk->links() }}
        </div>
    </div>
</div>
        
                <!-- </div>
                </div> -->
            <!-- </div> -->
           
        <!-- </div> -->
        
  <!-- /.content-wrapper -->
@include('layouts.footer')







                <!-- <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            @php
                            $numOfCols = 3;
                            $rowCount = 0;
                            $bootstrapColWidth = 12 / $numOfCols;
                            @endphp
                            @foreach($produk as $p)
                                <div class="col-xs-@php echo $bootstrapColWidth; @endphp">
                            @php
                                $a = $p->nama_produk 
                            @endphp
                            <br> -->
                        <!--
                        <h4 >{{ $p->nama_produk }}</h4>
                        
                        <div id="wrapper">
                    </div>
                    
                </div> -->
            
            <!-- @php
        $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

@endphp
@endforeach
<div> -->



            
  
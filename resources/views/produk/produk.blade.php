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
        <div class="container">
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
                    <input type="submit" value="CARI">
                    <input type="hidden" name="_method" value="get">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
            </div>
            </div>
            <div class="card mt-3">
            <!-- <a href="{{url('produk/tambah')}}" class="btn btn-primary">Input Produk Baru</a> -->
                <div class="card-body">
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
                        <br>
                        <!--
                        <h4 >{{ $p->nama_produk }}</h4>
                        <div class="col-xs-4 row-xs-2"><img width="270px" height="200px" src="{{ url('/data_banner/'.$p->file_banner) }}" ></div>
                        <div class="card-body"><h4 >{{ $p->nama_produk }}</h4> -->
                        <div class="card" style="width: 18rem;">
                        <img width="270px" height="200px" src="{{ url('/data_banner/'.$p->file_banner) }}" >
                        <input type="hidden" value="{{$p->id_produk}}">
                        <h4 class="card-title ">{{ $p->nama_produk }}</h4>
                        <p class="card-text">Terjual {{ $p->terjual }}.<br>
                        Sisa {{ $p->sisa }}<br>
                        {{ $p->keterangan }}</p>
                        <a href="produkDetail/{{ $p->id_produk }}" class="btn btn-primary">Lihat Detail</a>

                        <!-- <div class="col-xs-3">Tanggal Keberangkatan {{ $p->jumlah }}<br>
                        Tanggal Expired {{ $p->jumlah }}<br>
                    
                        <a href="{{ url('/produkanggotainput/'.(isset($p) ? $p->id_produk : '')) }}" class="btn btn-primary">Pilih</a>
                        <input data-id="{{ $p->nama_produk }}" data-todo="{{ $p->id_produk }}" data-target="#editTodoDialog" class="open-EditTodo btn btn-warning" data-toggle="modal" type="submit" value="submit"/></div>
                        <div class="col-xs-4">Tanggal Keberangkatan {{ $p->jumlah }}
                            <td>
                                <a href="produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
                                <a href="produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </div> -->
                        </div>
                        <div id="wrapper">
                    </div>
                    
                </div>
            
            @php
        $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

@endphp
@endforeach
<div>

            <!-- <div id="wrapper"> -->
                    <!-- <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Sisa</th>
                                <th>Terjual</th>
                                <th>Harga</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->sisa }}</td>
                                <td>{{ $p->terjual }}</td>
                                <td>{{ $p->harga }}</td>
                                <td>
                                    <a href="produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
                                    <a href="produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> -->
            </div>
            </div>
          
            </div>
            {{ $produk->links() }}
        </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
 
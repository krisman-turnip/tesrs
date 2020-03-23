<!DOCTYPE html>
<html>
<head>
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
        Daftar Transaksi Produk
      </h1>
        <div class="container">

        <form action="{{url('reportCari')}}" method="GET">
        <br>
        <br>
        <div class="form-group">
        <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <select name="select" class="form-control" value="{{ old('select') }}">
                    <option value="nama">Nama Anggota</option>
                    <option value="nama_produk">Nama Produk</option>
                    <option value="nama_customer">Nama customer</option>
                    <option value="ktp_customer">KTP Customer</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="cari" class="form-control" placeholder="Cari .." value="{{ old('cari') }}">
            </div>
            <div class="col-md-2">
                <input type="submit" value="CARI">
                <input type="hidden" name="_method" value="get">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
            <div class="col-md-3.5">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Report</button>
            </div>
            </div>
        </form>
                
                    <br/>
                    <br/>
                    <div class="table-responsive">          
                    <table class="table table-lg table-dark table-hover table-striped">
                    <!-- <table class="table table-bordered table-hover table-striped"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Nama Produk</th>
                                <th>Nama Customer</th>
                                <th>KTP Customer</th>
                                <th>Approval</th>
                                <th>Tanggal Approve</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->nama_customer }}</td>
                                <td>{{ $p->ktp_customer }}</td>
                                <td>{{ $p->admin }}</td>
                                <td>{{ $p->date }}</td>
                                <td> 
                                    <a href="reportBatal/{{ $p->id_transaksi_detail}}"  onclick="return confirm('Are you sure?')" class="btn btn-warning">Batal</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
            {{ $produk->links() }}
        </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-xl">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Report Transaksi Sukses</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <form action="{{url('exporttransaksi')}}" method="GET">
                    <br>
                    <br>
                        <div class="form-group row">
                        <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Tanggal Awal</label>
                            <div class="col-md-6">
                            <input type="text" name="nama" id="datepicker1" class="form-control" required placeholder="Tanggal Awal .." >
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="file_ktp" class="col-md-2 col-form-label text-md-right"> Tanggal Akhir</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_jabatan" id="datepicker2" class="form-control" required placeholder="Tanggal Akhir .." >
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="Submit">
                            <input type="hidden" name="_method" value="get">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </div>
                        </div>
                        <!-- <div class="col-md-3.5">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Report</button>
                        </div> -->
                    </div>
                    </form>
                    <!-- <a href= class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->
				
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
        </div>

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
<script>
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>

<script>
  $( function() {
    $("#datepicker2").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>
<!DOCTYPE html>
<html>
  @include('member.layout.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('member.layout.sidebar')
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
        Daftar Komisi
      </h1>
        <div class="container">
           <br>
           <div class="card mt-5">
                <div class="card-body">
 
            <br/>
            <br/>
            <div class="row">
            <div class="col-md-11">
            <div class="box">
            <div class="box-body">
            <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Nama Customer</th>
                        <th>KTP Customer</th>
                        <th>Komisi</th>
                        <th>Jumlah Produk</th>
                        <th>Tanggal Approval</th>
                    </tr>
                </thead>
                <tbody>
                @php $no=1; @endphp
                    @foreach($komisi as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->nama_produk }}</td>
                        <td>{{ $p->nama_customer }}</td>
                        <td>{{ $p->ktp_customer }}</td>
                        <td>{{ $p->komisi }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>{{ $p->created_at }}</td>
                       
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          <div class="text-center">
          {{ $komisi->links() }}
        </div>
        </div>
    </div>
        
  <!-- /.content-wrapper -->
@include('member.layout.footer')
 
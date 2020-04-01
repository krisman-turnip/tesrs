<!DOCTYPE html>
<html>
  @include('member.layout.headerBaru')
  <!-- Content Wrapper. Contains page content -->
<br>
<br>
    <!-- Content Header (Page header) -->
    <div class="container">
  <section class="content-header">
    <h1 class="text-center">
      Daftar Materi
    </h1>
  <section>
    <br>
    <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
      <div class="row">
        <div class="box">
          <div class="box-header with-border">
        <br>
            <div class="card-body">

        <br/>
        <br/>
        <div style="overflow-x:auto;">
        <table class="table table-bordered table-hover table-striped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Materi</th>
                  <th>Produk</th>
                  <th>Keterangan</th>
                  <th>OPSI</th>
              </tr>
          </thead>
          <tbody>
            @php $no=1; @endphp
                @foreach($materi as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama_materi }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>
                        <a href="materi/download/{{ $p->id_materi }}" class="btn btn-danger">Download</a>
                    </td>
                </tr>
                @endforeach 
          </tbody>
        </table>
      </div>
      </div>
      </div>
      </div>
    </div>
  {{ $materi->links() }}
  </div>
</div>
</div>
  <!-- /.content-wrapper -->
@include('member.layout.footer')
 
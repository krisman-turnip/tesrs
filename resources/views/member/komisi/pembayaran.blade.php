<!DOCTYPE html>
<html>
  @include('member.layout.headerBaru')
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1 class="text-center">
    Daftar Pembayaran Komisi
  </h1>
</section>
<br>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
      <br/>
      <br/>
      <div class="content">
      <div class="row">
        <div class="col-md-11">
          <div class="box">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="example">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Komisi</th>
                          <th>Bukti Transfer</th>
                          <th>Tanggal Pembayaran</th>
                          <th>OPSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no=1; @endphp
                        @foreach($komisi as $p)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $p->komisi }}</td>
                          <td>{{ $p->bukti_transfer }}</td>
                          <td>{{ $p->created_at }}</td>
                          <td>
                              <a href="pembayaran/download/{{ $p->id_komisi }}" class="btn btn-danger">Download</a>
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
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@include('member.layout.footer')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script> 
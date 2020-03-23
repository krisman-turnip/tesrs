<!DOCTYPE html>
<html>

  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Daftar Email
      </h1>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="email" class="btn btn-primary">Kirim Email Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Body</th>
                                <th>Waktu</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($email as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->body }}</td>
                                <td>{{ $p->created_at }}</td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $email->links() }}
        </div>
        </div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 

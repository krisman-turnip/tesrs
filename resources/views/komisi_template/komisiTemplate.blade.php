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
        Daftar Template Komisi
      </h1>
        <div class="container">
            <div class="card mt-2">
                <div class="card-body">
                    <a href="{{ url('komisiTemplate/tambah') }}" class="btn btn-primary">Input Template Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Template</th>
                                <th>Komisi Level 1</th>
                                <th>Komisi Level 2</th>
                                <th>Komisi Level 3</th>
                                <th>Poin Level 1</th>
                                <th>Poin Level 2</th>
                                <th>Poin Level 3</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($komisi as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_template }}</td>
                                <td>{{ $p->komisi_1 }}</td>
                                <td>{{ $p->komisi_2 }}</td>
                                <td>{{ $p->komisi_3 }}</td>
                                <td>{{ $p->poin_1 }}</td>
                                <td>{{ $p->poin_2 }}</td>
                                <td>{{ $p->poin_3 }}</td>
                                <td> 
                                    <a href="komisiTemplate/edit/{{ $p->id_template_komisi}}" class="btn btn-warning">Edit</a>
                                    <a href="komisiTemplate/delete/{{ $p->id_template_komisi }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $komisi->links() }}
        </div>
        
        </div>
        

  <!-- /.content-wrapper -->
@include('layouts.footer')
 
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
        Daftar Anggota 
      </h1>
      <br>
      <div class="container">
      <div class="row">
      <div class="col-md-11">
            <div class="box">
            <div class="box-body">
            <div class="row">
            <div class="col-md-12">
            <div class="col-md-1">
            @foreach($anggota as $p)
            <h4 >{{ $p->nama }}</h4>
            </div>
      @php
        $numOfCols = 1;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
@endphp
<div class="row">
        
        <div class="col-xs-@php echo $bootstrapColWidth; @endphp">
@php
$a = $p->nama 
@endphp
               
                <div class="col-xs-3"><br><img width="250px" height="200px" src="{{ url('/data_ktp/'.$p->file_ktp) }}"></div>
                <div class="col-xs-8">
                <table class="table table-striped">
                    <tr>
                        <td>
                        Nama Parent
                        </td>
                        <td>
                        {{ $p->namaParent }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Jabatan
                        </td>
                        <td>
                        {{ $p->nama_jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Email
                        </td>
                        <td>
                        {{ $p->email }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        No Hp
                        </td>
                        <td>
                        {{ $p->no_handphone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Alamat
                        </td>
                        <td>
                        {{ $p->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        No KTP
                        </td>
                        <td>
                        {{ $p->no_ktp }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        No NPWP
                        </td>
                        <td>
                        {{ $p->no_npwp }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Saldo
                        </td>
                        <td>
                        {{ $p->saldo }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Status
                        </td>
                        <td color="red">
                        {{ $p->status }}
                        </td>
                    </tr>
                 <br>
                 </table>
               
                </div>
            <div id="wrapper">
        @php
        $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

@endphp
@endforeach

</div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
</div>
            <div class="card mt-5">
                <!-- <div class="card-body">
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Parent</th>
                                <th>level</th>
                                <th>Nama</th>
                                <th>Email</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggota as $p)
                            <tr>
                                <td>{{ $p->namaParent }}</td>
                                <td>{{ $p->nama_jabatan }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->email }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div> -->
            </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="box">
                        <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="box-header with-border">
                            <h3 class="box-title">Downline 1</h3>

                            <div class="box-tools pull-right">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse"><i class="fa fa-minus"></i></a>
                                    </h4>
                                </div>
                            </div>
                            </div>
                            <!-- /.box-header -->
                            <div id="collapse" class="panel-collapse collapse">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">  
                                                <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>level</th>
                                                <th>Nama Parent</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                        @php $no=1; @endphp
                                        @foreach($parent as $q)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><a href="{{ url('beranda/'.(isset($q) ? $q->id_anggota : '')) }}" target="_blank">{{ $q->nama }}</a></td>
                                                <td>{{ $q->nama_jabatan }}</td>
                                                <td>{{ $q->namaParent }}</td>
                                                <td>{{ $q->email }}</td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <!-- ./box-body -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-11">
                        <div class="box">
                        <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="box-header with-border">
                            <h3 class="box-title">Downline 2</h3>

                            <div class="box-tools pull-right">
                            <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1"><i class="fa fa-minus"></i></a>
                                    </h4>
                                </div>
                            </div>
                            </div>
                            <!-- /.box-header -->
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">  
                                            <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>level</th>
                                                    <th>Nama Parent</th>
                                                    <th>Email</th>
                                                    <th>No Handphone</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                            @php $no=1; @endphp
                                            @foreach($anak as $q)
                                                @foreach($q as $a)
                                                <tr>
                                                    <td>{{ $no++ }} </td>
                                                    <td><a href="{{ url('/beranda/'.(isset($q) ? $a->id_anggota : '')) }}" target="_blank">{{ $a->namaParent}}</a></td>
                                                    <td>{{ $a->nama_jabatan }}</td>
                                                    <td>{{ $a->nama }}</td>
                                                    <td>{{ $a->email }}</td>
                                                    <td>{{ $a->no_handphone }}</td>
                                                    <td>{{ $a->alamat }}</td>
                                                </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <!-- ./box-body -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    </div>
                    </div>
            </div>
        </div>
        
        </div>
        
  <!-- /.content-wrapper -->
@include('member.layout.footer')
 
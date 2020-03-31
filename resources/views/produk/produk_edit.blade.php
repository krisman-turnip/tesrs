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
        Update Produk
      </h1>
      <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                </div>
                <div class="card-body">
                <a href="../../produk" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    <div class="row">
                    <div class="col-md-11">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">
                    <!-- <form method="post" action="{{url('pegawai/update/$pegawai->id' )}}"> -->
                    <form method="post" action="{{ url('/produk/update/'.(isset($produk) ? $produk->id_produk : '')) }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}  
                            <input type="hidden" name="id_produk" class="form-control" placeholder="ID Produk  .." value=" {{ $produk->id_produk }}" >

                        <div class="form-group row">
                        <label for="nama" class="col-md-2 col-form-label text-md-right">Nama Produk</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk .." value=" {{ $produk->nama_produk }}">

                            @if($errors->has('nama_produk'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_produk')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Jumlah</label>
                            <div class="col-md-6">
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah .." value=" {{ $produk->jumlah }}">

                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="sisa" class="col-md-2 col-form-label text-md-right">Sisa</label>
                            <div class="col-md-6">
                            <textarea name="sisa" class="form-control" placeholder="Sisa .."> {{ $produk->sisa }} </textarea>

                             @if($errors->has('sisa'))
                                <div class="text-danger">
                                    {{ $errors->first('sisa')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="terjual" class="col-md-2 col-form-label text-md-right">Terjual</label>
                            <div class="col-md-6">
                            <textarea name="terjual" class="form-control" placeholder="Terjual .."> {{ $produk->terjual }} </textarea>

                             @if($errors->has('terjual'))
                                <div class="text-danger">
                                    {{ $errors->first('terjual')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="harga" class="col-md-2 col-form-label text-md-right">Harga</label>
                            <div class="col-md-6">
                            <textarea name="harga" class="form-control" placeholder="Harga .."> {{ $produk->harga }} </textarea>

                             @if($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga')}}
                                </div>
                            @endif
                            </div>
                        </div>
                       
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Sub Produk</label>
                        <div class="col-md-6">
                        
                        <INPUT type="button" value="Add Row" onClick="addRow('dataTable')" />
                        
                        <form action="" method="post" name="f">  
                        
                            <TABLE width="425" border="1">
                            <thead>
                                <tr>
                                    <th width="94">Nama Produk</th>
                                    <th width="121">Harga</th>
                                    <th width="84">Keterangan</th>
                                    <th width="84">opsi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTable">
                            @foreach($sub as $p)
                            <tr>
                            <td><input type='text' name='nama_sub[]' value="{{$p->namaProduk}}" required></td>
                            <td><input type='text' name='harga_sub[]' value="{{$p->harga}}" required></td>
                            <td><input type='text' name='keterangan_sub[]' value="{{$p->keterangan}}" required></td>
                                <td><input type="Button" value="delete" onclick="deleteRow(this)" />
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </TABLE>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Produk</label>
                        <div class="col-md-6">
                        <INPUT type="button" value="Add Row" onClick="addRows('dataTables')" />
                       
                        <form action="" method="post" name="f">  

                        <TABLE width="425" border="1">
                        <thead>
                            <tr>
                                <th width="94">Tanggal Keberangkatan</th>
                                <th width="121">Tanggal Expired</th>
                                <th width="84">opsi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTables">
                        @foreach($tanggal as $p)
                            <tr>
                                <td><input type='text' name='tanggal_berangkat[]' value="{{$p->tanggal_berangkat}}"  id="datepicker" required></td>
                                <td><input type='text' name='tanggal_expired[]' value="{{$p->tanggal_expired}}" required></td>
                                <td><input type="Button" value="delete" onclick="deleteRow(this)" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </TABLE>
                        </div>
                        </div>
                        <br> 
                        <div class="form-group row">
 
                        <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group col-md-2 text-md-right">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
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
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<SCRIPT language="javascript">
     function addRow(tableID) { 
        
        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        // var cell1 = row.insertCell(0);
        // var element1 = document.createElement("input");
        // element1.type = "checkbox";
        // element1.name="chkbox[]";
        // cell1.appendChild(element1);
        
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<input type='text' name='nama_sub[]' required>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text'  name='harga_sub[]' required/>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML =  "<input type='text'  name='keterangan_sub[]' required/>";
        var cell4= row.insertCell(3);
        cell4.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)' required/>";
        
        
        }
</SCRIPT>
<SCRIPT language="javascript">
     function addRows(tableIDs) { 

        var table = document.getElementById(tableIDs);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);



        var cell1 = row.insertCell(0);
        cell1.innerHTML = " <input type='text' class='form-control' name='tanggal_berangkat[]' id='datepicker' required/>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' class='form-control' name='tanggal_expired[]' id='datepicker2' required/>";

        var cell3= row.insertCell(2);
        cell3.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)'/>";
        
        
        }

</SCRIPT>
<script>
  $( function() {
    $("#datepicker").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker2" ).datepicker({
        format: 'yyyy-mm-dd'
    });
  } );
  </script>
<script>
  function deleteRow(btn) {
    var result = confirm("Are you sure you want to delete this item?");
if (result) {
    var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
    //Logic to delete the item
}
else{
    return false;
}
}
</script>

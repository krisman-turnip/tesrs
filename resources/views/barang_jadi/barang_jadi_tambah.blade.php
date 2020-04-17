<!DOCTYPE html>
<html>
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           
                        </div>
                    @endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h3>Tambah Barang Jadi</h3> 
                </div>
                <a href="{{url('barang_jadi')}}" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('barang_jadi/prosestambah')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Nama Barang</label>

                                        <div class="col-md-3">
                                            <input id="email" type="text" class="form-control" name="nama_barang" required autocomplete="email">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Keterangan</label>

                                        <div class="col-md-3">
                                            <textarea id="password" type="text" class="form-control" name="keterangan" ></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label">Satuan Terkecil</label>

                                        <div class="col-md-10">
                                            <div class="col-md-2">
                                                <select class="form-control" name="satuan_terkecil">
                                                    <option value="unit">Unit</option>
                                                    <option value="kg">KG</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="menu" class="col-md-1 col-form-label text-md-right" style="padding-left:0">Harga</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="email" type="text" class="form-control" name="harga_jual" required autocomplete="email">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Satuan Lain</label>
                                        <div class="col-md-10">
                                            <div class="col-md-1">
                                                <input id="menu" type="text" class="form-control @error('password') is-invalid @enderror" name="bagian" >

                                            </div>
                                            <div class="col-md-2">
                                                <select name="select" class="form-control" value="{{ old('select') }}">
                                                    <option value="ktp_customer">Unit</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1" style="width:10px;">
                                                <label for="menu">=</label>
                                            </div>
                                            <div class="col-md-1">
                                                <input id="menu" type="text" class="form-control @error('password') is-invalid @enderror" name="bagian" >
                                            </div>
                                            <div class="col-md-2">
                                                <select name="select" class="form-control" value="{{ old('select') }}">
                                                    <option value="ktp_customer">Unit</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-5">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Harga</label>
                                        <div class="col-md-6">
                                            <input id="menu" type="text" class="form-control " name="join_date" >
                                        </div>
                                            <INPUT type="button" value="Add Row"  onClick="addRows('dataTables')" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive">  
                                                <TABLE width="500" class="table table-striped table-bordered no-footer">
                                                    <thead>
                                                        <tr>
                                                            <th width="200">Satuan</th>
                                                            <th width="200">Price</th>
                                                            <th width="200">Qty</th>
                                                            <!-- <th width="100">Jumlah Customer</th> -->
                                                            <th width="400">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dataTables">
                                                    </tbody>
                                                </TABLE>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
<SCRIPT language="javascript">
     function addRows(tableIDs) { 

        var table = document.getElementById(tableIDs);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);


        // "<input type='text' class='form-control' name='tipe_kamar[]' id='' required/>";
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<input type='text' class='form-control' name='nama_customer[]' id='' required/>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' class='form-control' name='nama_customer[]' id='' required/>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML = "<input type='text' class='form-control' name='ktp_customer[]' id='' required/>";

        // var cell4 = row.insertCell(3);
        // cell4.innerHTML = "<input type='text' class='form-control' name='jumlah_customer[]' id='' required/>";

        var cell4= row.insertCell(3);
        cell4.innerHTML =  "<input type='Button' value='delete'onclick='deleteRow(this)' required/>";
        
        
        }

</SCRIPT>

<script>
  function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
</script>
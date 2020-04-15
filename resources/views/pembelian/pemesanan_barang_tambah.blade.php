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
                    <h3>Form Pemesanan</h3> 
                </div>
                <a href="{{url('pembelian')}}" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('karyawan/prosestambah')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Nama Barang</label>

                                        <div class="col-md-10">
                                            <div class="col-md-3">
                                                <input id="email" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="email" class="col-md-3 ">Tanggal Pemesanan</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="datepicker1" class="form-control" name="tanggal_pemesanan" required placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Supplier</label>

                                        <div class="col-md-10">
                                            <div class="col-md-3">
                                                <input id="email" type="text" class="form-control" name="fullname" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="email" class="col-md-3 ">Jatuh Tempo (hari)</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="" class="form-control" name="tanggal_pemesanan" required placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Nama Barang</label>
                                        <div class="col-md-10">
                                            <div class="col-md-2">
                                                <select name="select" class="form-control" value="{{ old('select') }}">
                                                    <option value="ktp_customer">Nama Barang</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="menu" class="col-md-1">Jumlah</label>
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
                                        <label for="" class="col-md-2 ">Harga</label>
                                        <div class="col-md-2">
                                            <input id="menu" type="text" class="form-control " name="join_date" >
                                        </div>
                                            <INPUT type="button" value="Tambah Barang"  onClick="addRows('dataTables')" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <div class="table-responsive">  
                                                <TABLE width="2000" class="table table-striped table-bordered no-footer">
                                                    <thead>
                                                        <tr>
                                                            <th width="700">Nama Barang</th>
                                                            <th width="600">Keterangan</th>
                                                            <th width="500">Jumlah</th>
                                                            <!-- <th width="100">Jumlah Customer</th> -->
                                                            <th width="500">Harga</th>
                                                            <th width="500">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dataTables">
                                                    </tbody>
                                                </TABLE>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-5 col-form-label text-md-right">Memo</label>
                                    
                                        <label for="password" class="col-md-1 col-form-label text-md-right">Total</label>
                                        <div class="col-md-3">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="no_hp" >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <input id="password" type="text" class="form-control" name="no_hp" ></input>
                                        </div>
                                        <label for="password" class="col-md-1 col-form-label text-md-right">Discount</label>
                                        <div class="col-md-3">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="no_hp" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-5">
                                        </div>
                                        <label for="password" class="col-md-1 col-form-label text-md-right">Pajak</label>
                                        <div class="col-md-3">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="no_hp" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-5">
                                        </div>
                                        <label for="password" class="col-md-1 col-form-label text-md-right">Grand Total</label>
                                        <div class="col-md-3">
                                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="no_hp" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-3">
                                        <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="submit" class="btn btn-primary" value="Simpan">    

                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                            
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                            </div>
                                        </div>
                                    </div> -->
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
        cell4.innerHTML =  "<input type='text' class='form-control' name='ktp_customer[]' id='' required/>";

        var cell5 = row.insertCell(4);
        cell5.innerHTML = "<input type='text' class='form-control' name='ktp_customer[]' id='' required/>";
        
        
        }

</SCRIPT>

<script>
  function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
</script>

<script>
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>
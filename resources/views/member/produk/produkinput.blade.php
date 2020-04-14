<!DOCTYPE html>
<html>
  @include('member.layout.headerBaru')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3 class="text-center">
        Tambah Produk
      </h3>
    </section>
    <div class="content">
    <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
      <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
        <!-- <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Tersedia</th>
                                <th>Jumlah pengajuan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp 
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->sisa }}</td>
                                <td>
                                <form method="post" action="{{ url('/produkanggota/tambah/'.(isset($p) ? $p->id_produk : '')) }}">
                                 <input type="text" name="jumlah"></td> 
                                 <input type="hidden" name="_method" value="post">
                                <td>
                                <input type="submit" class="btn btn-success" value="Ambil">
                                </td>  </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $produk->links() }}
        </div> -->
                                @php
                                $numOfCols = 1;
                                $rowCount = 0;
                                $bootstrapColWidth = 12 / $numOfCols;
                                @endphp
                                <div class="row">
                                    <div class="col-sm-@php echo $bootstrapColWidth; @endphp">
                                        <h4 >{{ $p->nama_produk }}</h4>
                                        <div class="col-sm-4" class="responsive"><img width="100%" height="100%" src="{{ url('/data_banner/'.$p->file_banner) }}" class="responsive" ></div>
                                        <div class="col-sm-3">Tanggal Keberangkatan {{ $p->tanggal_berangkat }}<br>
                                        Tanggal Expired {{ $p->tanggal_expired }}<br>
                                        @foreach($subproduk as $ppp) {{ $ppp->namaSubProduk }} Harga {{ $ppp->HargaSub }}<br> @endforeach  <br>
                                        <!-- <a href="{{ url('/produkanggota/input/'.(isset($p) ? $p->id_produk : '')) }}" class="btn btn-primary">Pilih</a>
                                        <input data-id="{{ $p->nama_produk }}" data-todo="{{ $p->id_produk }}" data-target="#editTodoDialog" class="open-EditTodo btn btn-warning" data-toggle="modal" type="submit" value="submit"/>-->
                                        </div>
                                        <div class="col-sm-4">Tanggal Keberangkatan {{ $p->tanggal_berangkat }}  
                                        </div>
                                    </div>
           
                                    @php
                                    $rowCount++;
                                    if($rowCount % $numOfCols == 0) echo '
                                </div>
                                <div class="row">';
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="box">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <form method="post" action="{{ url('/produkanggota/tambah/'.(isset($p) ? $p->id_produk : '')) }}">
                                                <div class="form-group row">
                                                    <input type="hidden" name="nama_produk" class="form-control col-md-2" placeholder="Nama Produk .." value="{{ $p->id_produk }}">
                                                    <label for="customer" class="col-md-2 col-form-label text-md-right">Tanggal</label>   
                                                    <div class="col-md-6">
                                                        <select class="form-control select2" name="tanggal" id="cari"  required>
                                                            <option value=""></option>
                                                            @foreach($tanggal as $d)
                                                            <option value="{{$d->tanggal_berangkat}}">{{$d->tanggal_berangkat}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('id_parent'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('id_parent')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="customer" class="col-md-2 col-form-label text-md-right">Tambah Customer</label>
                                                    <div class="col-md-8">
                                                        <INPUT type="button" value="Add Row"  onClick="addRows('dataTables')" />
                                                        <br>
                                                        <div class="table-responsive">  
                                                            <TABLE width="650" border="1">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="300">Tipe Kamar</th>
                                                                        <th width="500">Nama Customer</th>
                                                                        <th width="500">No KTP Customer</th>
                                                                        <!-- <th width="100">Jumlah Customer</th> -->
                                                                        <th width="100">opsi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="dataTables">
                                                                </tbody>
                                                            </TABLE>
                                                        </div>
                                                        <input type="hidden" name="_method" value="post">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                        <br>
                                                        <input type="submit" class="btn btn-success" value="Simpan" onClick="">
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
            </div>
        </div>
    </div>
</div>
        <SCRIPT language="javascript">
     function addRows(tableIDs) { 

        var table = document.getElementById(tableIDs);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);


        // "<input type='text' class='form-control' name='tipe_kamar[]' id='' required/>";
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<select class='form-control select2' name='id_sub[]' id='' required/><option value=''>pilih kamar</option>@foreach($subproduk as $d)<option value='{{$d->id_sub_produk}}'>{{$d->namaSubProduk}}</option>@endforeach</select>";

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
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>

<script>
  function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
</script>
</div>

  <!-- /.content-wrapper -->
@include('member.layout.footer')
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$("#cari").select2({
    placeholder:'select tanggal',
    allowClear:true
})
</script>
<script type="text/javascript">
$("#cari1").select2({
    placeholder:'select kamar',
    allowClear:true
})
</script>

<!-- <script>
//   $(document).on("click", ".open-homeEvents", function () {
//      var eventId = $(this).data('id');
//      $('#idHolder').html( eventId );
// });
// </script>  -->

<!-- // $(document).on("click", ".open-EditTodo", function () {
//     var todoId = $(this).data('id');

// var todoName = $(this).data('todo');
//     $(".modal-body #todoId").val( todoName );
//     $(".modal-body #todoName").val( todoId );
// }); -->
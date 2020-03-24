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
        Daftar Produk
      </h1>
      <br>
      <div class="row">
                    <div class="col-md-11">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">
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
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
        @foreach($produk as $p)
        <div class="col-xs-@php echo $bootstrapColWidth; @endphp">
            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
            <!-- @php
            for ($c='A'; $c!="AD"; $c++) 
            echo "$c ";
            $abs=$rowCount;
@endphp --> 
@php
$a = $p->nama_produk 
@endphp
                <h4 >{{ $p->nama_produk }}</h4>
                <div class="col-xs-4"><img width="320px" height="200px" src="{{ url('/data_banner/'.$p->file_banner) }}" ></div>
                <div class="col-xs-3">Tanggal Keberangkatan {{ $p->tanggal_berangkat }}<br>
                Tanggal Expired {{ $p->tanggal_expired }}<br>
                @foreach($subproduk as $ppp) {{ $ppp->namaSubProduk }} Harga {{ $ppp->HargaSub }}<br> @endforeach  <br>
                <a href="{{ url('/produkanggotainput/'.(isset($p) ? $p->id_produk : '')) }}" class="btn btn-primary">Pilih</a>
                <input data-id="{{ $p->nama_produk }}" data-todo="{{ $p->id_produk }}" data-target="#editTodoDialog" class="open-EditTodo btn btn-warning" data-toggle="modal" type="submit" value="submit"/></div>
                <div class="col-xs-4">Tanggal Keberangkatan {{ $p->tanggal_berangkat }}
                
                </div>
            </div>
            <div id="wrapper">
            <!-- @php
            echo "$c";
            echo $rowCount;

            @endphp -->
            <!-- <input class="open-homeEvents btn btn-primary" data-id="{{ $p->nama_produk }}"  data-toggle="modal" data-target="#modalHomeEvents" type="submit" value="submit"/>	 -->
            
        <!-- <form name="@php echo $rowCount; @endphp"id="@php echo $rowCount; @endphp" hidden>
        <tr>
            <td>{{ $p->nama_produk }}
            </td>
            <td>minum
            </td>
            <td>
            <input onclick="click()" class="btn btn-primary" type="submit" value="submit"/>
            </td>
        </tr>
        </from> -->
        </div>
        <!-- <script type="text/javascript">
            function @php echo $c;echo $rowCount; @endphp() 
            {
                var form = document.getElementById("@php echo $rowCount; @endphp");
            form.style.display = "block";
            return false;
            }
        </script>
        <script type="text/javascript">
            function click() 
            {
                var form = document.getElementById("regForm");
                form.style.display = "none";
            }
        </script> -->

        @php
        $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

@endphp
@endforeach
<div class="modal fade" tabindex="-1" role="dialog"  id="editTodoDialog">
        <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Submit</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="tambahkaryawan.php">
                        <div class="form-group row">
                        <input type="hidden" name="todoId" id="todoId" value="" class="form-control" style="width: 230px;">
                          <label for="jumlah" class="col-md-2 col-form-label text-md-right">Nama Produk</label>
                            <div class="col-md-6">
                            <input type="text" name="todoName" id="todoName" value="" class="form-control" style="width: 230px;">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="customer" class="col-md-2 col-form-label text-md-right">Tanggal</label>
                            <div class="col-md-6">
                              <input type='text' class='form-control' name='tanggal_berangkat[]' id='datepicker' required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                              <INPUT type="button" value="Add Row" onClick="addRows('dataTables')" />
                            </div>
                        </div>
                          <form action="" method="post" name="f">  

                          <TABLE width="425" border="1">
                          <thead>
                              <tr>
                                  <th width="94">Tipe Kamar</th>
                                  <th width="220">Nama Customer</th>
                                  <th width="94">Jumlah Customer</th>
                                  <th width="84">opsi</th>
                              </tr>
                          </thead>
                          <tbody id="dataTables">

                          </tbody>
                          </TABLE>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <input type="submit" class="btn btn-success" value="Simpan" onClick="">
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
<div class="text-center">
{{$produk->links()}}
</div>
</div>
</div>

        <!-- @foreach($produk as $p)
        <div class="container">
            <h1>Hello World!</h1>
            
            <div class="row">
                <div class="col-sm-3" style="">
                <p>ini adalah</p>
                </div>
                <div class="col-sm-6" style="">
                <table>
                <tr>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->sisa }}</td>
                </tr>
                </table>
                </div>
            </div>
            
        </div> 
        @endforeach -->
        </div>
        </div>
        <SCRIPT language="javascript">
     function addRows(tableIDs) { 

        var table = document.getElementById(tableIDs);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);



        var cell1 = row.insertCell(0);
        cell1.innerHTML = " <input type='text' class='form-control' name='tipe_kamar[]' id='todoName' required/>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' class='form-control' name='nama_customer[]' id='datepicker2' required/>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML = "<input type='text' class='form-control' name='jumlah_customer[]' id='datepicker2' required/>";

        var cell4= row.insertCell(3);
        cell4.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)' required/>";
        
        
        }

</SCRIPT>
<script>
  $( function() {
    $("#datepicker").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>

<script>
  function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
</script>



  <!-- /.content-wrapper -->
@include('member.layout.footer')
 
<script>
$(document).on("click", ".open-EditTodo", function () {
    var todoId = $(this).data('id');

var todoName = $(this).data('todo');
    $(".modal-body #todoId").val( todoName );
    $(".modal-body #todoName").val( todoId );
});
</script>
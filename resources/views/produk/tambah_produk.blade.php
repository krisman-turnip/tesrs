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
    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h3>Tambah Produk</h3> 
                </div>
                <div class="card-body">
                    <a href="../produk" class="btn btn-primary">Kembali</a>
                    <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                    <br/>
                    <br/>
                    <div class="row">
                    <div class="col-md-11">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                    <div class="col-md-12">
                    <form method="post" action="{{url('produk/store')}}" enctype="multipart/form-data" id='inForm'>

                        {{ csrf_field() }}

                        <div class="form-group row">
                        <label for="nama_produk" class="col-md-2 col-form-label text-md-right">Nama Produk</label>
                            <div class="col-md-6">
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk .." required>

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
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah .." required>

                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
                                </div>
                            @endif
                        </div> 
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">File Banner</label>
                            <div class="col-md-6">
                                <input type="file" name="nama_banner">
                            </div>
                        </div>
                        <h3>Upload Materi</h3>
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">File Upload</label>
                            <div class="col-md-6">
                                <input type="file" name="nama_materi">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="keterangan" require></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Sub Produk</label>
                        <div class="col-md-6">
                        <INPUT type="button" value="Tambah Sub Produk" onClick="addRow('dataTable')" />

                        <form action="" method="post" name="f">  
                        
                            <TABLE width="550" border="1">
                            <thead>
                                <tr>
                                    <th width="94">Nama Produk</th>
                                    <th width="121">Harga</th>
                                    <th width="84">Keterangan</th>
                                    <th width="84">opsi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTable">

                            </tbody>
                            </TABLE>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Produk</label>
                        <div class="col-md-6">
                            <INPUT type="button" value="Tambah Tanggal" onClick="addRows('dataTables')" />
                            <br>
                            <form action="" method="post" name="f">  
                                <TABLE width="550" border="1">
                                <thead>
                                    <tr>
                                        <th width="94">Tanggal Keberangkatan</th>
                                        <th width="121">Tanggal Expired</th>
                                        <th width="54">opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTables">
                                </tbody>
                                </TABLE>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Skema Komisi Produk</label>
                        <div class="col-md-5">
                        <INPUT type="button" value="Tambah Skema" onClick="addRowq('dataTableskema')" />
                        <br>
                        <form action="" method="post" name="skema">  
                            <TABLE width="550" border="1">
                            <thead>
                                <tr>
                                    <th width="114">Nama Jabatan</th>
                                    <th width="121">Nama Template</th>
                                    <th width="134">Keterangan</th>
                                    <th width="84">opsi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTableskema">
                            <!-- <tr>
                                <td>1
                                </td>
                                <td>2
                                </td>
                                <td>3
                                </td>
                                <td>
                                <input type="Button" value="delete" onclick="deleteRow(this)" />;
                                </td>
                                </tr> -->
                            </tbody>
                            </TABLE>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Lihat Template</button>
                        </div>
                        
                        <div class="col-md-2">
                        
                        </div></div> 
                        <!-- <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Keberangkatan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tanggal_berangkat" id="datepicker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="jumlah" class="col-md-2 col-form-label text-md-right">Tanggal Expired</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tanggal_expired" id="datepicker2"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="template" class="col-md-2 col-form-label text-md-right">Template Komisi Produk</label>
                        <div class="col-md-5">
                        <INPUT type="button" value="Tambah Skema" onClick="addRowT('dataTabletemplate')" />
                        <form action="" method="post" name="template">  
                            <TABLE width="800" border="1">
                            <thead>
                                <tr>
                                    <th width="250">Nama Template</th>
                                    <th width="130">Komisi 1</th>
                                    <th width="130">Komisi 2</th>
                                    <th width="130">Komisi 3</th>
                                    <th width="110">Poin 1</th>
                                    <th width="110">Poin 2</th>
                                    <th width="110">Poin 3</th>
                                    <th width="90">opsi</th>
                                </tr>
                            </thead>
                            <tbody id="dataTabletemplate">
                            </tbody>
                            </TABLE>
                       <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Lihat Template</button> -->
                        </div>
                     </div>
                            <input type="hidden" class="col-md-2" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            </div>
                            <div class="col-md-2">
                            <input type="submit" class="btn btn-success" value="Simpan" onClick="">
                            </div>
        <br>
        <br>
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


<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-xl">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center" >Template Komisi</h4>
				</div>
                <a href="{{url('komisiTemplate/tambah')}}" class="btn btn-info" target="_blank">Input Template</a>
             
				<!-- body modal -->
				<div class="modal-body">
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
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <a href= class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->
				
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->

<!-- ./wrapper -->
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
     function addRowT(tableIDTemplate) { 

        var table = document.getElementById(tableIDTemplate);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        // var cell1 = row.insertCell(0);
        // var element1 = document.createElement("input");
        // element1.type = "checkbox";
        // element1.name="chkbox[]";
        // cell1.appendChild(element1);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<input type='text'class='form-control' name='nama_template[]' required>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' class='form-control' name='komisi1[]' required/>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML =  "<input type='text' class='form-control' name='komisi2[]' required/>";

        var cell4 = row.insertCell(3);
        cell4.innerHTML =  "<input type='text' class='form-control' name='komisi3[]' required/>";

        var cell5 = row.insertCell(4);
        cell5.innerHTML = "<input type='text' class='form-control' name='poin1[]' required/>";

        var cell6 = row.insertCell(5);
        cell6.innerHTML =  "<input type='text' class='form-control' name='poin2[]' required/>";

        var cell7 = row.insertCell(6);
        cell7.innerHTML =  "<input type='text' class='form-control' name='poin3[]' required/>";
        
        var cell8= row.insertCell(7);
        cell8.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)' required/>";
        
        
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

<SCRIPT language="javascript">
     function addRowq(tableIDskema) { 

        var table = document.getElementById(tableIDskema);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);



        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<select class='form-control select2' name='nama_jabatan[]' id='' required/><option value=''>pilih jabatan</option>@foreach($jabatan as $d)<option value='{{$d->id_jabatan}}'>{{$d->nama_jabatan}}</option>@endforeach</select>";

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<select class='form-control select2' name='nama_skema[]' id='' required/><option value=''>pilih template</option>@foreach($skema as $d)<option value='{{$d->id_template_komisi}}'>{{$d->nama_template}}</option>@endforeach</select>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML = "<input type='text' class='form-control' name='keterangan_skema[]' id='' required/>";

        var cell4= row.insertCell(3);
        cell4.innerHTML =  "<input type='Button'value='delete'onclick='deleteRow(this)'/>";
        }k

</SCRIPT>
<script>
 $( function() {
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: "dd-M-yyyy",
                daysOfWeekDisabled: [0, 7],
                autoclose: true
            });

            //Alternativ way
            $('#datepicker').datepicker({
                format: "dd-M-yyyy"
            }).on('change', function(){
                $('.datepicker').hide();
            });

        });
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
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
</script>
@include('layouts.footer')
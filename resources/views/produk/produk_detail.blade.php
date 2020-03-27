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
      Detail Produk
    </h1>
  </section>
  <section class="content">
    <a href="{{url('produk')}}" class="btn btn-primary">Kembali</a>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            @php
            $numOfCols = 1;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            @endphp
            @foreach($produk as $p)
              <div class="col-sm-@php echo $bootstrapColWidth; @endphp">
                @php
                $a = $p->nama_produk 
                @endphp
                <h4 >{{ $p->nama_produk }}</h4>
                <div class="col-sm-4"><img width="100%" height="100%" src="{{ url('/data_banner/'.$p->file_banner) }}" ></div>
                  <div class="col-sm-3">
                    Tanggal Keberangkatan @foreach($tanggal as $pp){{ $pp->tanggal_berangkat }} || @endforeach<br>
                    Tanggal Expired     @foreach($tanggal as $ppe){{ $ppe->tanggal_expired }} || @endforeach<br>
                    Produk Terjual  {{ $p->terjual }}<br>
                    Produk Sisa   {{ $p->sisa }}<br>
                    @foreach($subproduk as $ppp) {{ $ppp->namaSubProduk }} Harga {{ $ppp->HargaSub }}<br> @endforeach  <br>
                  </div>
                
                <div id="wrapper">
                  @php
                  $rowCount++;
                  if($rowCount % $numOfCols == 0) echo '</div><div class="row">';

                  @endphp
                  @endforeach
                </div>
              </div>
              <br>
              <div class="col-sm-4 ">
              </div>
              <div class="col-sm-4 ">
              <br>
              <a href="../produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
              <a href="../produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
            </div>
            </div>
           
          </div>
        </div>
  </div>
</div>
        
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
        </div>
        </div>
<!-- <script>
  $(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
});
</script>  -->

<script>
$(document).on("click", ".open-EditTodo", function () {
    var todoId = $(this).data('id');

var todoName = $(this).data('todo');
    $(".modal-body #todoId").val( todoName );
    $(".modal-body #todoName").val( todoId );
});
</script>
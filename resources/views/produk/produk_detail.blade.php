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
      <a href="{{url('produk')}}" class="btn btn-primary">Kembali</a>
      <br>
      <div class="card-body">
      <div class="row">
      <div class="col-md-12">
      <div class="box">
      <div class="box-body">
      <div class="row">
        @php
        $numOfCols = 1;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        @endphp
                @foreach($produk as $p)
                <div class="col-xs-@php echo $bootstrapColWidth; @endphp">
        @php
        $a = $p->nama_produk 
        @endphp
                <h4 >{{ $p->nama_produk }}</h4>
                <div class="col-xs-4"><img width="320px" height="200px" src="{{ url('/data_banner/'.$p->file_banner) }}" ></div>
                <div class="col-xs-3">
                Tanggal Keberangkatan<br>
                Tanggal Expired<br>
                Produk Terjual<br>
                Produk Sisa<br>
                @foreach($subproduk as $ppp) {{ $ppp->namaSubProduk }} Harga {{ $ppp->HargaSub }}<br> @endforeach  <br>
                <a href="../produk/edit/{{ $p->id_produk }}" class="btn btn-warning">Edit</a>
                <a href="../produk/hapus/{{ $p->id_produk }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                </div>
                <div class="col-xs-4">
                @foreach($tanggal as $pp){{ $pp->tanggal_berangkat }} || @endforeach<br>
                @foreach($tanggal as $ppe){{ $ppe->tanggal_expired }} || @endforeach<br>
                {{ $p->terjual }}<br>
                {{ $p->sisa }}<br>
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
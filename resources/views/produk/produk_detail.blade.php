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
        @php
        $numOfCols = 1;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
@endphp
<div class="row">
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
        
  <!-- /.content-wrapper -->
@include('member.layout.footer')
 
 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="adminlte/bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte/js/demo.js')}}"></script>
</body>
</html>
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
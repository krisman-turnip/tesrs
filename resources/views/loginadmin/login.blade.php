<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
<link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<script src="{{url('adminlte/js/popper.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{url('adminlte/style.css')}}">
<body>
<div class="content">
        <div class="modal-dialog modal-xl">
			<!-- konten modal-->
            <div class="card-body">
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Login Admin</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <form method="POST" action="{{url('prosesloginadmin')}}">
                @csrf
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Username" name="email">
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
                    <!-- <a href= class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->
				
				<!-- footer modal -->
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div> -->
			</div>
		</div>
</body>
</html>

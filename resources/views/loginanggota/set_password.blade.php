<!-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">set password</div>

                    <div class="card-body">
                    <form method="POST" action="{{url('loginanggota/reset')}}">
                        @csrf
             
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password Check</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="passwordcheck" >

                            </div>
                        </div>
                        <input type="hidden" name="_method" value="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                             
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
</html> -->

<!-- <html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
<link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<script src="{{url('adminlte/js/popper.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{url('adminlte/style.css')}}">
<body>

  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="{{ url('/img_login/face.png') }}">
        </div>

        <div class="col-12 form-input">
          <form method="POST" action="{{url('prosesloginanggota')}}">
          @csrf
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html> -->

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
					<h4 class="modal-title">Login Anggota</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <form method="POST" action="{{url('prosesloginanggota')}}">
                @csrf
                    <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="passwordcheck" placeholder="Re enter Password" >
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


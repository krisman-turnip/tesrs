<html>
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
</html>

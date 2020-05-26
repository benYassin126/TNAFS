
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>التسجيل في تنافس</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet"  href="{{url('/')}}/design/AdminLTE/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet"  href="{{url('/')}}/design/AdminLTE/dist/css/custom-style.css">
</head>
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
          <b>تنافس</b>
      </div>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">حياك مشرفنا العزيز</p>

          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="input-group mb-3">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="اسمك">
                <div class="input-group-append">
                    <span class="fa fa-user input-group-text"></span>
                </div>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>


              <div class="input-group mb-3">
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="ايميلك">
                <div class="input-group-append">
                    <span class="fa fa-envelope input-group-text"></span>
                </div>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>


              <div class="input-group mb-3">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="الرقم السري">
                <div class="input-group-append">
                     <span class="fa fa-lock input-group-text"></span>
                </div>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

              <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation"  required placeholder="اعادة الرقم السري">
                <div class="input-group-append">
                     <span class="fa fa-lock input-group-text"></span>
                </div>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

    <button type="submit" class="btn btn-primary btn-block btn-flat mb-4">تسجيل</button>

</form>



<a href="{{ route('login') }}" class="text-center mb-4">عندك حساب ؟</a>
</div>
<!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{url('/')}}/design/AdminLTE/plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script  src="{{url('/')}}/design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script  src="{{url('/')}}/design/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
  })
})
</script>
</body>
</html>

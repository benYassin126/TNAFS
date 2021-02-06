@extends('layouts.landingPage')
@section('content')
<div id="home" class="header-hero bg_cover" style="background:#61bab8;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="header-hero-content text-center">
          <div class="login-box">
            <div>

            </div>
            <!-- /.login-logo -->
            <div class="card">
              <div class="card-body login-card-body">
                <h4 class="text-center  " style="color: #b4a882">حساب جديد في تنافس</h4>
                <p class="mb-4 mt-2">خطوة اخيرة وينور تنافس بتسجيلك</p>

          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="input-group mb-3">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="اسم الجهة">
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

    <button type="submit" class="btn btn-tnafs btn-block btn-flat mb-4">تسجيل</button>

</form>
              </div>
              <!-- /.login-card-body -->
            </div>
          </div>
          </div> <!-- header hero content -->
        </div>
        </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
            </div> <!-- header hero -->
            @endsection

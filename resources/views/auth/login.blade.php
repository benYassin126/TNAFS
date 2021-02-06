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
                <h4 class="text-center mb-4 " style="color: #b4a882">تسجيل الدخول</h4>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="input-group mb-3">
                    <input  id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="ايميلك"  value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <input  id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="الرقم السري"  value="" required autofocus>
                    <div class="input-group-append">
                      <span class=" input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                    <!-- /.col -->
                    <div class="div-center">
                      <button type="submit" class="btn btn-tnafs btn-block">دخول</button>
                    </div>
                </form>
                <p class="mb-0 mt-2">
                  <a href="{{ route('register') }}">ماعندي حساب</a>
                </p>
                <p class="mb-0">
                  <a href="{{ url('/password/reset') }}">نسيت كلمة المرور ؟</a>
                </p>
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

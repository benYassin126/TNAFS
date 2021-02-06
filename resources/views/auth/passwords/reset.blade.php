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
                <h4 class="text-center mb-4 " style="color: #b4a882">استعادة كلمة المرور</h4>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mt-4">
                                   تعيين كلمة المرور الجديدة
                                </button>
                            </div>
                        </div>
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

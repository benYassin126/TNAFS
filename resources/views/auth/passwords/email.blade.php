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
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class=" col-form-label">الايميل اللي مسجل فيه</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="tnafs@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">

                                <button type="submit" class="btn btn-block btn-tnafs mt-4">
                                   إرسال رابط إعادة تعيين كلمة المرور
                                </button>

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

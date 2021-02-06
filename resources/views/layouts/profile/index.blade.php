@extends('layouts.adminLTE')
@section('title','الملف الشخصي')
@section('content')
<!-- Strat MSG -->
@if(session()->has('message'))
<div class="alert alert-success green fade show" role="alert" id="display-success">
    <strong>{{ session()->get('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('errors'))
<div class="alert alert-danger fade show" role="alert" id="display-success">
    <strong>{{ session()->get('errors') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- Main content -->
<div class="content pt-4">
    <div class="container-fluid">
        <div class="row text-center ">
            <div class="card">
                <div class="card-footer">
                    <h6 class=" mb-2"><i class="fas fa-edit"></i> تعديل الملف الشخصي</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group LogoUpload">
                            <label class="control-label ml-2">رفع الشعار</label><br>
                            <img src=@if (isset($user) && $user->Logo != null) "{{ url('/') }}/img/storage/logos/{{$user->Logo}}.png" @else "{{ url('/') }}/img/logo.png" @endif class="img-circle elevation-2" width="100" alt="User Image">
                            <div class="mt-4">
                                <input type="file" name="Logo"  accept="image/*" />
                            </div>
                        </div>
                        <hr>
                        <div class="input-group mb-3">
                            <input  type="text" name="name" class="form-control"  value=@if(isset($user)) "{{$user->name}}" @endif
                            required autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input  type="text" name="email" class="form-control" placeholder="ايميلك"  value=@if(isset($user)) "{{$user->email}}" @endif
                            required autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <p class="mt-4">تمكين الطلاب من مشاهدة النتائج عبر الرابط ؟</p>
                            <input type="radio" name="conrtolShow" value="yes" id="yes" @if(isset($user) && $user->WatchResult == 'yes') checked @endif>
                            <label class="ml-4" for="yes">نعم</label>
                            <input type="radio" name="conrtolShow" value="no" id="no" @if(isset($user) && $user->WatchResult == 'no') checked @endif>
                            <label for="no">لا</label>
                        </div>
                        <div class=" mb-3">
                            <p class="mt-4">الرسالة التي تظهر وقت اغلاق صفحة النتائج عند الطلاب </p>
                            <input  type="text" name="BackMsg" class="form-control"   value=@if(isset($user)) "{{$user->BackMsg}}" @endif
                            >
                        </div>
                        <div class="input-group mb-3">
                            <input  id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="الرقم السري" >
                            <div class="input-group-append">
                                <span class=" input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="div-center">
                            <button type="submit" class="btn btn-tnafs btn-block mt-4">حفظ التعديلات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

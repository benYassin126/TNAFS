@extends('layouts.adminLTE')
@section('title','اضافة طالب')

@section('content')

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
   <h3 class="text-center pt-4">اضافة طالب</h3>

<!-- Strat MSG -->
   @if(session()->has('message'))
   <div class="alert alert-success green  fade show" role="alert">
       <strong>{{ session()->get('message') }}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- END MSG -->


<div class="card  mt-4">
   <div class="card-footer">
    <h3 class="card-title">اضف الطلاب من هنا</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="form-horizontal" action="{{ route('student.store') }}" method="post">

    @include('layouts.student._part._studentForm')
    <div class="card-header">
  <button type="submit" class="btn btn-tnafs btn-block">حفظ الطالب</button>

</div>


</form>
</div>
<!-- /.card -->




<!-- Horizontal Form -->




@endsection('content')

@extends('layouts.adminLTE')
@section('title','اضافة طالب')

@section('content')

<!-- Main content -->
<div class="content">
  <div class="container-fluid">

<!-- Strat MSG -->
   @if(session()->has('message'))
   <div class="alert alert-success  fade show" role="alert">
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
    <h3 class="card-title">اضافة المجموعات من هنا</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="form-horizontal" action="{{ route('group.store') }}" method="post">

    @include('layouts.group._part._groupForm')
    <div class="card-header">
  <button type="submit" class="btn btn-tnafs btn-block">حفظ المجموعة</button>

</div>


</form>
</div>
<!-- /.card -->




<!-- Horizontal Form -->




@endsection('content')

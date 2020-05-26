@extends('layouts.adminLTE')
@section('title','تعديل مجموعة')

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


<div class="card card-info mb-4">
   <div class="card-header">
    <h3 class="card-title">تعديل بيانات المجموعة</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="form-horizontal" action="{{route('group.update',$thisGroup)}}" method="post">
    @method('PATCH')
    @include('layouts.group._part._groupForm')
    <div class="card-footer">
  <button type="submit" class="btn btn-success btn-block">حفظ التعديلات</button>

</div>


</form>
</div>
<!-- /.card -->




<!-- Horizontal Form -->




@endsection('content')

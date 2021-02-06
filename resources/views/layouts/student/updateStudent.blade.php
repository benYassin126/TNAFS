@extends('layouts.adminLTE')
@section('title','تعديل طالب')

@section('content')

<!-- Main content -->
<div class="content">
  <div class="container-fluid">

<!-- Strat MSG -->
   @if(session()->has('message'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>{{ session()->get('message') }}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- END MSG -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Strat MSG -->

    <div class="card  mb-4 mt-4">
     <div class="card-footer">
        <h3 class="card-title" style="display: inline-block;">تعديل بينات  [ {{$thisStudent->StudentName}} ]</h3>
                 <form method="Post" action="{{route('student.destroy',$thisStudent->id)}}" style="float: left;">
          @csrf
          @method('DELETE')
          <button onclick="return confirm('{{__('هل انت متاكد ؟')}}')"  href="{{route('student.destroy',$thisStudent->id) }}" class="btn btn-danger "><i class="fas fa-trash-alt"></i>  حذف الطالب </buttn>
          </form>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('student.update',$thisStudent)}}" method="post">
        @method('PATCH')

        @include('layouts.student._part._studentForm')

        <!-- START PLAY -->
        <hr>
<div class="text-center mb-4 pb-4">
    <h4 class="text-center mb-4">اضف نقاط لـ  {{$thisStudent->StudentName}}</h4>
                <input type="number" step="0.01"  name="points" placeholder="0" autofocus> <span class="pl-2">نقطة</span>
                <input type="text" name="id" value="{{$thisStudent->id}}" style="display: none;">
                <button type="submit" name="add" class="btn btn-success"><i class="fas fa-plus fa-sm"></i> اضافة</button>
                <button type="submit" name="dis" class="btn btn-danger"><i class="fas fa-minus fa-sm"></i>  خصم</button>

</div>
<!-- START PLAY -->



<div class="card-header">

    <button type="submit" name="update" class="btn btn-tnafs btn-block"> <i class="fas fa-edit fa-sm"></i> حفظ التعديلات  </button>

</div>


</form>

<!-- /.card-body -->

</div>

<!-- /.card -->




<!-- Horizontal Form -->




@endsection('content')

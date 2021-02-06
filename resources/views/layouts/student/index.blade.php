@extends('layouts.adminLTE')
@section('title','الطلاب')
@section('content')


<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- Strat MSG -->
    <!-- Strat MSG -->
    @if(session()->has('message'))
    <div class="alert alert-success green fade show" role="alert" id="display-success">
     <strong><i class="fas fa-check "></i> {{ session()->get('message') }}</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" id="display-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Strat MSG -->
<div class="row">
    <div class="card mt-4 text-center">
        <div class="card-header">

         <form action="{{route('student.sort')}}" method="post">
            @csrf
            <!-- select -->
            <div class="form-group mb-4">
                <select class="form-control" required name="StudentGroup" >
                    <option value="0">عرض جميع المجموعات</option>
                    @foreach ($allGroups as $group)
                    <option  value="{{$group->id}}"  @if (isset($GroupTitle) && $GroupTitle->GroupName == $group->GroupName) selected @endif >{{$group->GroupName}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-tnafs mt-2">تخصيص المجموعة  <i class="fas fa-search"></i></button>
            </div>
        </form>


        <form action="{{route('student.search')}}" method="post" onsubmit="return false">
            @csrf
            <input class="form-control form-control"  id="search" name="search" type="search" placeholder="بحث عن طالب" aria-label="Search" >
        </form>



        <a href="{{route('student.create')}}" class="btn btn-success btn-block mt-4"><i class="fas fa-user"></i> اضافة طالب  </a>
        <a href="{{route('print')}}" class="btn btn-tnafs btn-block"><i class="fas fa-print"></i> طباعة النتائج</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive-sm">
      <table class="table  table-bordered table-striped">
        <thead>
            <tr>
              <th>#</th>
              <th>اسم الطالب</th>
              <th>مجموعة الطالب</th>
              <th>نقاط الطالب</th>
              <th>التحكم</th>
          </tr>
      </thead>
      <tbody>
        @isset($GroupTitle) <h4 class="mb-4"> [ {{$GroupTitle->GroupName}} ] جميع الطلاب  </h4> @endisset
        @forelse($allStudents as $kay=>$student)


        <tr>
            <td>{{$kay+1}}</td>
            <td>{{$student->StudentName}}</td>
            <td>{{$student->group->GroupName}}</td>
            <td>{{$student->StudentPoints}}</td>
            <td>


                <buttn data-toggle="modal" data-target="#{{$student->id}}" class="btn btn-tnafs mb-2 "><i class="fas fa-plus-circle"></i></buttn>


                <!-- Modal -->
                <div class="modal fade" id="{{$student->id}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">اضافة او خصم نقاط</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('student.points')}}" method="Post">
                        @csrf
                        <input  type="number" step="0.01" class="mb-2"  name="points" placeholder="0" required> <span class="pl-2">نقطة</span>
                        <input  type="text" name="id" value="{{$student->id}}" style="display: none;">
                        <button type="submit" name="add" class="btn btn-success">اضافة</button>
                        <button type="submit" name="dis" class="btn btn-danger">خصم</button>
                    </form>
                </div>

                <button type="button" class="btn" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>









    <a href="{{route('student.edit',$student->id) }}" class="btn btn-tnafs mb-2"><i class="fas fa-edit"></i></a>


    <form method="post" action="{{route('student.destroy',$student->id)}}" style="display: inline-block;">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('{{__('هل انت متاكد ؟')}}')" class="btn mb-2 "><i class="fas fa-trash-alt"></i></buttn>
      </form>
  </td>
</tr>

@empty

    <div class="alert">
     <p>لم تقم باضافة اي طالب بعد</p>
      <a style="text-decoration: none;" href="{{route('student.create')}}" class="btn btn-tnafs mb-4"><i class="fas fa-plus"></i> اضافة طالب </a>
    </div>


@endforelse
</tbody>
<tfoot>

</tfoot>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

@endsection('content')




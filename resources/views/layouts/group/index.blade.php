@extends('layouts.adminLTE')
@section('title','المجموعات')
@section('content')


<!-- Main content -->
<div class="content">
  <div class="container-fluid pt-4">
    <!-- Strat MSG -->
@if(session()->has('message'))
    <div class="alert alert-success green fade show" role="alert" id="display-success">
       <strong><i class="fas fa-check"></i> {{ session()->get('message') }}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('ErorrMsg'))
    <div class="alert alert-danger fade show" role="alert" id="display-success">
       <strong>{{ session()->get('ErorrMsg') }}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert-dismissible  alert alert-danger" id="display-success">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- END MSG -->



<div class="row">
    <div class="card mt-4 text-center">
        <div class="card-header">
        <a href="{{route('print')}}" class="btn btn-tnafs btn-block"><i class="fas fa-print"></i> طباعة النتائج</a>
        <a href="{{route('group.create')}}" class="btn btn-success btn-block mt-4"><i class="fas fa-user"></i> اضافة مجموعة</a>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive-sm">
      <table class="table  table-bordered table-striped">
        <thead>
            <tr>
              <th>#</th>
              <th>اسم  المجموعة</th>
              <th> عدد الطلاب</th>
              <th>نقاط المجموعة</th>
              <th>التحكم</th>
          </tr>
      </thead>
      <tbody>
        @forelse($allGroups as $kay=>$group)
        <tr>
            <td>{{$kay+1}}</td>
            <td>{{$group->GroupName}}</td>
            <td>{{$Students->where('StudentGroup',$group->id)->count()}}</td>
            <td>{{$group->GroupPoints}}</td>
            <td>


                <buttn data-toggle="modal" data-target="#{{$group->id}}" class="btn btn-tnafs mb-2 "><i class="fas fa-plus-circle"></i></buttn>


                <!-- Modal -->
                <div class="modal fade" id="{{$group->id}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">اضافة او خصم نقاط</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('group.points')}}" method="Post">
                        @csrf
                        <input type="number" step="0.01" class="mb-2"  name="points" placeholder="0" required> <span class="pl-2">نقطة</span>
                        <input type="text" name="id" value="{{$group->id}}" style="display: none;">
                        <button type="submit" name="add" class="btn btn-success">اضافة</button>
                        <button type="submit" name="dis" class="btn btn-danger">خصم</button>
                    </form>
                </div>

                <button type="button" class="btn " data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>









    <a href="{{route('group.edit',$group->id) }}" class="btn btn-tnafs mb-2 "><i class="fas fa-edit"></i></a>


     <form method="post" action="{{route('group.destroy',$group->id)}}" style="display: inline-block;">
      @csrf
         @method('DELETE')
        <button onclick="return confirm('{{__('هل انت متاكد ؟')}}')"  class="btn mb-2 "><i class="fas fa-trash-alt"></i></buttn>
      </form>
  </td>
</tr>

@empty

    <div class="alert">
     <p>لم تقم باضافة اي  مجموعة بعد</p>
      <a style="text-decoration: none;" href="{{route('group.create')}}" class="btn btn-tnafs mb-4"><i class="fas fa-plus"></i> اضافة  مجموعة </a>
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



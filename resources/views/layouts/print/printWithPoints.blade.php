<!DOCTYPE html>
<html>
<head>
    <title>طباعة</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet"href="/css/app.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/adminlte.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/custom-style.css">
    <style>
        @media print {
         .noprint {
          visibility: hidden;
      }
  }

</style>
</head>
<div class="text-center">
  <button  onclick="window.print()" class="mt-4 mb-4 btn btn-warning  noprint"><i class="fas fa-print"></i> اطــــــبــــــع</button>
  <button   onclick="window.history.back()" class="mt-4 mb-4 btn btn-primary  noprint"><i class="fas fa-undo-alt"></i> عودة</button>
</div>



<table class="table  table-bordered table-striped">
    <thead>
        <tr>
          <th>#</th>
          <th>اسم الطالب</th>
          <th>مجموعة الطالب</th>
          <th>نقاط الطالب</th>
      </tr>
  </thead>
  <tbody>
     <h4 class="mb-4 text-center"> [ {{$GroupTitle}} ]</h4>
     @forelse($allStudents as $kay=>$student)
     <tr>
        <td>{{$kay+1}}</td>
        <td>{{$student->StudentName}}</td>
        <td>{{$student->group->GroupName}}</td>
        <td>{{$student->StudentPoints}}</td>
    </tr>

    @empty
    ا
    @endforelse
</tbody>
<tfoot>

</tfoot>
</table>


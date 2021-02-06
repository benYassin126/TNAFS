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
  <button  onclick="window.print()" class="mt-4 mb-4 btn btn-tnafs  noprint"><i class="fas fa-print"></i> اطبع</button>
  <button  onclick="window.history.back()" class="mt-4 mb-4 btn btn-tnafs  noprint"><i class="fas fa-undo-alt"></i> عودة</button>
</div>
@if($user->Logo != null)
 <img style="border: 1px solid #3333331a;" class=" print-logo" src="./img/storage/logos/{{$user->email}}.png" width="150">
@endif
<table class="table  table-bordered">
    <thead>
        <tr>
          <th>#</th>
          <th>اسم الطالب</th>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
          <th>المجموع</th>
      </tr>
  </thead>
  <tbody>
    <h4  class="mb-4 text-center"> [ {{$GroupTitle}} ] </h4>
    @forelse($allStudents as $kay=>$student)


    <tr>
        <td>{{$kay+1}}</td>
        <td>{{$student->StudentName}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>

    @empty
    ا
    @endforelse
</tbody>
<tfoot>

</tfoot>
</table>



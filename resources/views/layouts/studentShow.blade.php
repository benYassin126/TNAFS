<!DOCTYPE html>
<html>
<head>
    <title>تنافس</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet"href="/css/app.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/adminlte.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/custom-style.css">
</head>
<body class="StudentBody">
    <div class="container">
        <h3 class="text-center mt-4"></h3>
        <div class="row">
            <div class="col-sm-12">
               <div class="card mt-4 ">

                  <div class="card-footer">
                    <h4 class="text-center"> الصدارة لــ  <span class="win"> @foreach ($topNames as $name) {{$name}} || @endforeach  <i class="fas fa-crown"></i></span></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered studentTable">
                      <thead>
                        <tr>
                            <th scope="col">الترتيب</th>
                          <th scope="col">الأسم</th>
                          <th scope="col">المجموعة</th>
                          <th scope="col">النقاط</th>
                      </tr>
                      @forelse($allStudents as $kay=>$student)

                      @if (in_array($student->StudentName , $topNames))
                      <tr class="topNames">
                        <td>{{$orderArray[$kay]}} </td>
                        <td><i class="fas fa-crown"></i> {{$student->StudentName}}</td>
                        <td>{{$student->group->GroupName}}</td>
                        <td>{{$student->StudentPoints}}</td>
                    </tr>
                    @else
                    <tr>
                        <td>{{$orderArray[$kay]}}</td>
                        <td>{{$student->StudentName}}</td>
                        <td>{{$student->group->GroupName}}</td>
                        <td>{{$student->StudentPoints}}</td>
                    </tr>
                    @endif

                    @empty
                    <p>لا يوجد طلاب</p>
                    @endforelse
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <button  onClick="window.location.reload();" class="btn btn-primary btn-block">تحديث النتائج   <i class="fas fa-sync-alt"></i></button>
        </div>
    </div>
</div>
</div>


<hr>




<h3 class="text-center mt-4">المجموعات</h3>
<div class="row">
    <div class="col-sm-12">
       <div class="card mt-4 ">
          <div class="card-footer">
            <h4 class="text-center"> الصدارة لــ  <span class="win"> @foreach ($topNamesGroup as $name) {{$name}} || @endforeach  <i class="fas fa-crown"></i></span></h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered studentTable">
              <thead>
                <tr>
                  <th scope="col">الترتيب</th>
                  <th scope="col">المجموعة</th>
                  <th scope="col">النقاط</th>
              </tr>
              @forelse($allGroups as $kay=>$group)

              @if (in_array($group->GroupName , $topNamesGroup))
              <tr class="topNames">
                <td>{{$orderArrayGroup[$kay]}} </td>
                <td><i class="fas fa-crown"></i> {{$group->GroupName}}</td>
                <td>{{$group->GroupPoints}}</td>
            </tr>
            @else
            <tr>
                <td>{{$orderArrayGroup[$kay]}}</td>
                <td>{{$group->GroupName}}</td>
                <td>{{$group->GroupPoints}}</td>
            </tr>
            @endif

            @empty
            <p>لا يوجد  مجموعات</p>
            @endforelse
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<div class="card-footer">
    <button  onClick="window.location.reload();" class="btn btn-primary btn-block">تحديث النتائج   <i class="fas fa-sync-alt"></i></button>
</div>
</div>
</div>
</div>





</div>


</body>


<script src="{{url('/')}}/design/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/design/AdminLTE/dist/js/adminlte.js"></script>

</html>

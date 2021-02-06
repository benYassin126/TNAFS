<!DOCTYPE html>
<html>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173944302-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-173944302-2');
    </script>
    <title>تنافس</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/adminlte.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/Chart.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/custom-style.css">
  </head>
  @if ($checkWatch == 'yes')
  <body class="StudentBody">
    <div class="container">
      <div class="header mt-4 text-center">
        @if($user->Logo != null)
        <img class=" print-logo mb-2" src="./img/storage/logos/{{$user->email}}.png" width="200">
        @endif
        <h4 class="text-center mb-4"> في الصدارة <span class="win"> @foreach ($topNames as $name)[  {{$name}} ] || @endforeach  <i class="fas fa-crown"></i></span></h4>
      </div>
      <div class="row ">
        <div class="col-sm-6 mt-4">
          <canvas id="myChart" width="200" height="200"></canvas>
        </div>
        <div class="col-sm-6 mt-4">
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
      </div>
      <hr>
      <div class="header mt-4 text-center">
        <h4 class="text-center mb-4"> في الصدارة <span class="win"> @foreach ($topNamesGroup as $name)[  {{$name}} ] || @endforeach  <i class="fas fa-crown"></i></span></h4>
      </div>
      <div class="row ">
        <div class="col-sm-6 mt-4">
          <canvas id="myChart1" width="200" height="200"></canvas>
        </div>
        <div class="col-sm-6 mt-4">
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
      </div>
    </body>
    @else
    <body class="StudentBody">
      <div class="header mt-4 text-center">
        @if($user->Logo != null)
        <img class=" print-logo mb-2" src="./img/storage/logos/{{$user->email}}.png" width="200">
        @endif
        <h4 style="font-weight: bold;font-size: 35px;" class="text-center mb-4">{{$user->BackMsg}}</h4>
      </div>
    </body>
    @endif
    <script src="{{url('/')}}/design/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/')}}/design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/design/AdminLTE/dist/js/Chart.min.js"></script>
    <script defer src="{{ asset('js/fontawesome.js') }}"></script> <!--load all fontassowme styles -->
    <script src="{{url('/')}}/design/AdminLTE/dist/js/Chart.bundle.min.js"></script>
    <script>
    var ctx = document.getElementById('myChart');
    var sites = {!! json_encode($allGroups->toArray()) !!};
    console.log(sites[0]['id']);
    var allStudents = {!! json_encode($allStudents->toArray()) !!};
    var allStudentsArrayName = [];
    var allStudentsArrayPoints = [];
    var allbackgroundColors = [];
    var allbordersColors = [];
    var backgroundColor = ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'];
    var borderColor = ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'];
    for(i = 0; i < allStudents.length; i++) {
    allStudentsArrayName.push(allStudents[i]['StudentName']);
    allStudentsArrayPoints.push(allStudents[i]['StudentPoints']);
    allbackgroundColors.push(backgroundColor[i]);
    allbordersColors.push(borderColor[i]);
    }
    console.log(allStudentsArrayPoints);
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: allStudentsArrayName,
    datasets: [{
    label: '# عدد النقاط',
    data: allStudentsArrayPoints,
    backgroundColor:allbackgroundColors,
    borderColor: allbordersColors,
    borderWidth: 1
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    var ctx = document.getElementById('myChart1');
    var allGroups = {!! json_encode($allGroups->toArray()) !!};
    var allGroupsArrayName = [];
    var allGroupsArrayPoints = [];
    for(i = 0; i < allGroups.length; i++) {
    allGroupsArrayName.push(allGroups[i]['GroupName']);
    allGroupsArrayPoints.push(allGroups[i]['GroupPoints']);
    allbackgroundColors.push(backgroundColor[i]);
    allbordersColors.push(borderColor[i]);
    }
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: allGroupsArrayName,
    datasets: [{
    label: '# عدد النقاط',
    data: allGroupsArrayPoints,
    backgroundColor:allbackgroundColors,
    borderColor: allbordersColors,
    borderWidth: 1
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
    <!-- AdminLTE App -->
    <script src="{{url('/')}}/design/Landingpage/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{url('/')}}/design/Landingpage/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/design/AdminLTE/dist/js/adminlte.js"></script>
  </html>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">


  <title>{{ config('app.name') }} || @yield('title')</title>

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/custom-style.css">



</head>
<body class="hold-transition sidebar-mini ">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block ml-2">
            <a  href="{{ url('/') }}/{{$StudentLink}}" target="_blank"  class="nav-link btn btn-tnafs"> <i class="fa fa-arrow-circle-left"></i> صفحة الطلاب  </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a  href="https://api.whatsapp.com/send?phone=00966557248468" target="_blank"  class="nav-link  btn btn-tnafs"><i class="fab fa-whatsapp"></i> الدعم الفني  </a>
        </li>
    </ul>



</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link" style="background-color: #1a2d4c">
     {{-- <img src="{{ url('/') }}/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8"> --}}
      <span class="brand-text font-weight-light" >تنافس</span><span class="right badge badge-danger"> <i class="fas fa-rocket"></i> الباقة المجانية</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src=@if (isset($user) && $user->Logo != null) "{{ url('/') }}/img/storage/logos/{{$user->Logo}}.png" @else "{{ url('/') }}/img/logo.png" @endif class="img-circle elevation-2" width="100" alt="User Image">
      </div>
      <div class="info">
          <a href="{{ url('/') }}/{{$StudentLink}}" target="_blank" class="d-block">

            {{ Auth::user()->name }}

        </a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('overView') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>

          <p>
             نظرة عامة
         </p>
     </a>
 </li>

 <li class="nav-item">
    <a href="{{ route('student.index') }}" class="nav-link">
      <i class="nav-icon fas fa-user"></i>

      <p>
         الطلاب

     </p>
 </a>
</li>


<li class="nav-item">
    <a href="{{ route('group.index') }}" class="nav-link">
      <i class="nav-icon fas fa-users"></i>

      <p>
         المجموعات

     </p>
 </a>
</li>


<li class="nav-item">
    <a href="{{ route('print') }}" class="nav-link">
        <i class="fas fa-print"></i>

        <p>
         طباعة واظهار النتائج
     </p>
 </a>
</li>

<li class="nav-item">
    <a href="{{ route('setting') }}" class="nav-link">
        <i class="fas fa-cog"></i>

        <p>
         التحكم بالنقاط
     </p>
 </a>
</li>
<li class="nav-item">
    <a href="{{ route('profile') }}" class="nav-link">
        <i class="fas fa-edit"></i>

        <p>
         الملف الشخصي
     </p>
 </a>
</li>
<li class="nav-item">
    <a class="nav-link"href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <i class="fas fa-power-off"></i>

    <p>تسجيل خروج</p>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</a>
</li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">

    <!-- Content Header (Page header) -->

    @yield('content')

    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->

    <h4 class="text-center">تنافس</h4>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script defer src="{{ asset('js/fontawesome.js') }}"></script> <!--load all fontassowme styles -->
<!-- jQuery -->
<script src="{{url('/')}}/design/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/design/AdminLTE/dist/js/adminlte.js"></script>

<script type="text/javascript">

    $('#display-success').fadeIn().delay(3000).fadeOut();

    //To Save Scroll
    $(function () {
        var pathName = document.location.pathname;
        window.onbeforeunload = function () {
            var scrollPosition = $(document).scrollTop();
            sessionStorage.setItem("scrollPosition_" + pathName, scrollPosition.toString());
        }
        if (sessionStorage["scrollPosition_" + pathName]) {
            $(document).scrollTop(sessionStorage.getItem("scrollPosition_" + pathName));
        }
    });

    /*Copy Value */

    function PasteLinkFunction() {
      /* Get the text field */
      var copyText = document.getElementById("PasteLink");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      /* Copy the text inside the text field */
      document.execCommand("copy");

      alert('تم نسخ الرابط بنجاح ');

  }
    //To Ajax Search
    $('#search').on('keyup',function(){

        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('student.search')}}',
            data:{'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    })


</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

</body>
</html>

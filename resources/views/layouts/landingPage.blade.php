<!doctype html>
<html class="no-js" lang="ar">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>نظام تنافس</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{url('/') }}/design/Landingpage/images/favicon.png" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/animate.css">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/magnific-popup.css">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/slick.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/LineIcons.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/font-awesome.min.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/AdminLTE/dist/css/bootstrap-rtl.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{url('/') }}/design/Landingpage/css/style.css">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <h3 style="color: #fff">تنافس</h3>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">الصفحة الرئيسية</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">مميزات تنافس</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#testimonial">قالوا عن تنافس</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            <div class="navbar-btn d-none d-sm-inline-block ml-2">
                                <a class="main-btn" data-scroll-nav="0"  href="{{ route('login') }} "></i>دخول النظام</a>
                            </div>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" target="_blank" href="https://api.whatsapp.com/send?phone=966557248468"><i class="lni-whatsapp ml-2"></i>0557248468</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->



@yield('content')


    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area pt-4 text-center">
        <div class="container">
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="copyright-content">
                                <h3 style="color: #fff;">تنافس</h3>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{url('/')}}/design/Landingpage/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/popper.min.js"></script>
    <script src="{{url('/')}}/design/Landingpage/js/bootstrap.min.js"></script>

    <!--====== Plugins js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/plugins.js"></script>

    <!--====== Slick js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/slick.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/ajax-contact.js"></script>

    <!--====== Counter Up js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/waypoints.min.js"></script>
    <script src="{{url('/')}}/design/Landingpage/js/jquery.counterup.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/jquery.easing.min.js"></script>
    <script src="{{url('/')}}/design/Landingpage/js/scrolling-nav.js"></script>

    <!--====== wow js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/wow.min.js"></script>

    <!--====== Particles js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/particles.min.js"></script>

    <!--====== Main js ======-->
    <script src="{{url('/')}}/design/Landingpage/js/main.js"></script>

</body>

</html>

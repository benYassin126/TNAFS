@extends('layouts.landingPage')

@section('content')



        <div id="home" class="header-hero bg_cover" style="background:#61bab8;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">هلا حياك في  <span class="text-back">تنافس</span></h3>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">أبسط نظام لإدارة المناشط الطلابية</h2>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">كل مايخص نشاطك التنافسي في صفحة واحدة !</p>
                            <a href="{{ route('overView') }}" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">ابدأ تنافس ! </a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img style="display: none;" src="{{url('/')}}/design/Landingpage/images/header-hero.png" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->




    <!--====== SERVICES PART START ======-->

    <section id="features" class="services-area pt-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <h3 class="title">تنافس سهل المشوار ..&#128525; </h3>
                        <p class="mt-2">كل القروشة اللي كانت تصير حلتها تنافس &#128526;</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{url('/')}}/design/Landingpage/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{url('/')}}/design/Landingpage/images/services-shape-1.svg" alt="shape">
                            <i class="lni lni-mobile"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title">مايحتاج لابتوب !</h4>
                            <p class="text">تنافس صمم بشكل متناسق مع جميع اجهزة الجوال يعني في اي وقت تقدر تدخل النظام وتخلص الشغل </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="{{url('/')}}/design/Landingpage/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{url('/')}}/design/Landingpage/images/services-shape-2.svg" alt="shape">
                            <i class="lni-pizza"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title">اسهل مما تتوقع</h4>
                            <p class="text">فتح حساب في تنافس واضافة الطلاب أسهل من أكل البيتزا</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{url('/')}}/design/Landingpage/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{url('/')}}/design/Landingpage/images/services-shape-3.svg" alt="shape">
                            <i class="lni-invention"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title">أبهر الطلاب</h4>
                            <p class="text">من خلال تنافس راح تحصل على رابط خاص بطلابك فيه درجات كل الطلاب و أفضل طالب و أفضل مجموعة .. مصممة بشكل رهيب والمهم انه خاص بطلابك </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{url('/')}}/design/Landingpage/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{url('/')}}/design/Landingpage/images/services-shape-1.svg" alt="shape">
                            <i class="lni-users"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title">تنافس الفرق</h4>
                            <p class="text">تقدر تضيف عدد لا محدود من الفرق وتسند كل طالب لفريق والشي الرهيب انك تقدر تدمج نقاط الطلاب لمجموعاتهم وقت ماتبي.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{url('/')}}/design/Landingpage/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{url('/')}}/design/Landingpage/images/services-shape-2.svg" alt="shape">
                            <i class="lni-printer"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title">طباعة الكشوف </h4>
                            <p class="text">في حال كنت تحتاج نسخة من اسماء الطلاب للاستخدامات اليدوية .. تنافس ما راح يقصر معك</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{url('/')}}/design/Landingpage/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{url('/')}}/design/Landingpage/images/services-shape-3.svg" alt="shape">
                            <i class="lni-pencil-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title">أكثر من مشرف بحساب واحد</h4>
                            <p class="text">حساب واحد للمنشط .. يعني في حال تعذر عليك دخول النظام أعط الحساب لخويك وازهل .</p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->

    <section id="testimonial" class="testimonial-area pt-120 pb-40" style="direction: ltr">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">اللي جربوا تنافس<span> وش قالوا ؟  </span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row testimonial-active wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.8s">
                <div class="col-lg-4">
                    <div class="single-testimonial">
                        <div class="testimonial-review d-flex align-items-center justify-content-between">
                            <div class="quota">
                                <i class="lni-quotation"></i>
                            </div>
                            <div class="star">
                                <ul>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu.</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-image">
                                <img class="shape" src="{{url('/')}}/design/Landingpage/images/textimonial-shape.svg" alt="shape">
                                <img class="author" src="{{url('/')}}/design/Landingpage/images/author-1.png" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="holder-name">Jenny Deo</h6>
                                <p class="text">CEO, SpaceX</p>
                            </div>
                        </div>
                    </div> <!-- single testimonial -->
                </div>
                <div class="col-lg-4">
                    <div class="single-testimonial">
                        <div class="testimonial-review d-flex align-items-center justify-content-between">
                            <div class="quota">
                                <i class="lni-quotation"></i>
                            </div>
                            <div class="star">
                                <ul>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu.</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-image">
                                <img class="shape" src="{{url('/')}}/design/Landingpage/images/textimonial-shape.svg" alt="shape">
                                <img class="author" src="{{url('/')}}/design/Landingpage/images/author-2.png" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="holder-name">Marjin Otte</h6>
                                <p class="text">UX Specialist, Yoast</p>
                            </div>
                        </div>
                    </div> <!-- single testimonial -->
                </div>
                <div class="col-lg-4">
                    <div class="single-testimonial">
                        <div class="testimonial-review d-flex align-items-center justify-content-between">
                            <div class="quota">
                                <i class="lni-quotation"></i>
                            </div>
                            <div class="star">
                                <ul>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu.</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-image">
                                <img class="shape" src="{{url('/')}}/design/Landingpage/images/textimonial-shape.svg" alt="shape">
                                <img class="author" src="{{url('/')}}/design/Landingpage/images/author-3.png" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="holder-name">David Smith</h6>
                                <p class="text">CTO, Alphabet</p>
                            </div>
                        </div>
                    </div> <!-- single testimonial -->
                </div>
                <div class="col-lg-4">
                    <div class="single-testimonial">
                        <div class="testimonial-review d-flex align-items-center justify-content-between">
                            <div class="quota">
                                <i class="lni-quotation"></i>
                            </div>
                            <div class="star">
                                <ul>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                    <li><i class="lni-star-filled"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu.</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-image">
                                <img class="shape" src="{{url('/')}}/design/Landingpage/images/textimonial-shape.svg" alt="shape">
                                <img class="author" src="{{url('/')}}/design/Landingpage/images/author-2.png" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="holder-name">Fajar Siddiq</h6>
                                <p class="text">COO, MakerFlix</p>
                            </div>
                        </div>
                    </div> <!-- single testimonial -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TESTIMONIAL PART ENDS ======-->


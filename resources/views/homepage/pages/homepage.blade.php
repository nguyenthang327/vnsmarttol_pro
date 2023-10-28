@extends('homepage.layouts.master')

@section('css_page')
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/animate.css">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/magnific-popup.css">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/slick.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/LineIcons.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/font-awesome.min.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/landing_pages/page1/css/style.css">
@endsection

@section('content')
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
                            <a class="navbar-brand" href="index.html">
                                vnsmarttol pro
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">

                                    <li class="nav-item">
                                        <a href="javascript:changeTab('login_widget', true)">Đăng nhập</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:changeTab('register_widget', true)">Đăng ký</a>
                                    </li>


                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover"
            style="background-image: url({{ asset('homepage') }}/assets/landing_pages/page1/images/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h1 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                VNSMARTTOL pro</h1><br>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">

                                vnsmarttol | Nền Tảng Được Tin Cậy Và Phổ Biến Nhất Cho Các Dịch Vụ Truyền Thông Xã Hội
                            </h2>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Công cụ Tiếp thị
                                Truyền thông Xã hội Tất cả Trong Một mà bạn sẽ cần!</p>
                            <a href="javascript:changeTab('login_widget', true)" class="main-btn wow fadeInUp"
                                data-wow-duration="1.3s" data-wow-delay="1.1s">Đăng nhập / Đăng Ký</a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s"
                            data-wow-delay="1.4s">
                            <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/lp1.png" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <div class="mt-5"></div>
    <div class="wow fadeInUp" data-wow-duration="1.0s" data-wow-delay="0.5s">
        <link rel="stylesheet" href="{{ asset('homepage') }}/assets/plugins/font-awesome-v4/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('homepage') }}/assets/css/login_box4c96.css?v=1698339223280" />

        <div class="box-cover">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 block-left text-center">
                        <img src="{{ asset('homepage') }}/assets/landing_pages/page4/images/hero-18-img.png"
                            alt="" />
                    </div>
                    <div class="col-lg-6 col-12 block-right">
                        <div class="card shadow-lg auth-widget" id="login_widget">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt=""
                                        src="{{ asset('homepage') }}/assets/images/logo/default.png">
                                    <h2 class="m-b-0">Đăng nhập</h2>
                                </div>
                                <form action="/">

                                    <div class="form-group">
                                        <label class="font-weight-semibold">Tên đăng nhập:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon fa fa-user-o"></i>
                                            <input type="text" class="form-control text-lower" name="username"
                                                placeholder="Tên đăng nhập" required tabindex="1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold">Mật khẩu:</label>
                                        <a class="float-right font-size-14 text-muted" href="{{route('forgotPassword.index')}}">Quên mật
                                            khẩu?</a>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon fa fa-key"></i>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Mật khẩu" required tabindex="2">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-14 text-muted">
                                                Chưa có tài khoản?
                                                <a href="javascript:changeTab('register_widget')"> Đăng ký</a>
                                            </span>
                                            <button class="btn btn-primary" type="submit" tabindex="3">Đăng
                                                nhập</button>
                                        </div>


                                        {{-- <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-14 text-muted">
                                                Bạn muốn xem thử chức năng?
                                                <a href="#" class="btn-try">Xem thử</a>
                                            </span>
                                        </div> --}}

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card shadow-lg auth-widget" id="register_widget" style="display: none">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt=""
                                        src="{{ asset('homepage') }}/assets/images/logo/default.png">
                                    <h2 class="m-b-0">Đăng ký</h2>
                                </div>
                                <form action="https://vnsmarttol pro/register/">

                                    <div class="form-group">
                                        <label class="font-weight-semibold">Tên đăng nhập:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon fa fa-user-o"></i>
                                            <input type="text" class="form-control text-lower" name="username"
                                                placeholder="Tên đăng nhập" required tabindex="4">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold">Email:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon fa fa-envelope-o"></i>
                                            <input type="text" class="form-control text-lower" name="email"
                                                placeholder="Email" required tabindex="5">
                                        </div>

                                        <button id="generate_email" class="btn btn-primary btn-sm" type="button"
                                            style="margin-top: 5px">Tôi chưa có email</button>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold">SDT/Zalo:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon fa fa-phone"></i>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="SDT/Zalo" required tabindex="6">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold">Mật khẩu:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon fa fa-key"></i>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Mật khẩu" required tabindex="7">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold">Xác nhận Mật khẩu:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon fa fa-key"></i>
                                            <input type="password" class="form-control" name="re_password"
                                                placeholder="Mật khẩu" required tabindex="7">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="font-weight-semibold">Mã giới thiệu:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon fa fa-crosshairs"></i>
                                            <input class="form-control" name="referral_code"
                                                placeholder="Mã giới thiệu (nếu có)" tabindex="8">
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between p-t-15">
                                            <span class="font-size-14 text-muted">
                                                Đã có tài khoản?
                                                <a href="javascript:changeTab('login_widget')"> Đăng nhập</a>
                                            </span>

                                            <button class="btn btn-primary" type="submit" tabindex="9">Đăng
                                                ký</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /*OTP widget*/
            .otp-auth-widget {}

            .otp-auth-widget .otp-label {
                font-size: 17px;
                margin-bottom: 15px;
            }

            .otp-auth-widget .input-container {
                margin-bottom: 15px;
            }

            #otp {
                border: none !important;
                border-radius: 0 !important;
                border-bottom: 1px solid #b2b2b2 !important;
                transition: all .3s;
                outline: none !important;
                box-shadow: none !important;

                display: block;
                padding: .5rem .75rem;
                font-size: 1rem;
                line-height: 1.25;
                color: #495057;
                background-color: #fff;
                background-image: none;
                background-clip: padding-box;
            }

            #otp:focus {
                border-color: #57b846 !important;
            }

            .otp-auth-widget .input-container #otp {
                margin: 0 auto;
                width: 150px;
                max-width: 100%;
                text-align: center;
                font-size: 20px;
                font-weight: 600;
            }

            .otp-auth-widget .btn-confirm-otp {
                font-weight: bold;
                font-size: 16px;
            }
        </style>

        <!--begin::Modal-->
        <div class="modal fade" id="modalOTP" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác thực OTP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="otp-auth-widget">
                            <div class="otp-label">Nhập mã OTP được gửi tới Telegram</div>

                            <div class="input-container">
                                <input class="form-control" id="otp" placeholder="XXXXXX" maxlength="6"
                                    type="tel">
                            </div>

                            <button class="btn btn-success btn-confirm-otp">Xác nhận</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
        <div class="modal-backdrop modal-backdrop-otp fade"></div>



        <script src="{{ asset('homepage') }}/assets/landing_pages/page4/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('homepage') }}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="{{ asset('homepage') }}/assets/js/login_box4c96.js?v=1698339223280"></script>
        <script src="{{ asset('homepage') }}/assets/js/generate_email9f3c.js?t=1698339223280"></script>
        <script src="{{ asset('homepage') }}/assets/js/try_web9f3c.js?t=1698339223280"></script>

    </div>

    <!--====== SERVICES PART START ======-->

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Nhanh chóng và tiện lợi <span> Được đồng bộ hoá hoàn toàn và hỗ trợ rất
                                nhanh</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape"
                                src="{{ asset('homepage') }}/assets/landing_pages/page1/images/services-shape.svg"
                                alt="shape">
                            <img class="shape-1"
                                src="{{ asset('homepage') }}/assets/landing_pages/page1/images/services-shape-1.svg"
                                alt="shape">
                            <i class="lni-baloon"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Nhanh</a></h4>
                            <p class="text">Chúng tôi sử dụng những công cụ tốt nhất để mang đến cho bạn trải nghiệm
                                tuyệt vời nhất.</p>
                            <a class="more" href="javascript:changeTab('login_widget', true)">Tìm Hiểu <i
                                    class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape"
                                src="{{ asset('homepage') }}/assets/landing_pages/page1/images/services-shape.svg"
                                alt="shape">
                            <img class="shape-1"
                                src="{{ asset('homepage') }}/assets/landing_pages/page1/images/services-shape-2.svg"
                                alt="shape">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Giá Tốt</a></h4>
                            <p class="text">Giá của chúng tôi rẻ nhất trên thị trường, bắt đầu từ 1 VND.</p>
                            <a class="more" href="javascript:changeTab('login_widget', true)">Tìm Hiểu <i
                                    class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape"
                                src="{{ asset('homepage') }}/assets/landing_pages/page1/images/services-shape.svg"
                                alt="shape">
                            <img class="shape-1"
                                src="{{ asset('homepage') }}/assets/landing_pages/page1/images/services-shape-3.svg"
                                alt="shape">
                            <i class="lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Hỗ trợ 24/7</a></h4>
                            <p class="text">Chúng tôi luôn cố gắng hỗ trợ bạn nhanh nhất có thể.</p>
                            <a class="more" href="javascript:changeTab('login_widget', true)">Tìm Hiểu <i
                                    class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Dễ dàng <span>sử dụng dịch vụ</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Chỉ cần vài thao tác cơ bản, bạn đã có một tài khoản cho riêng mình để sử dụng
                            dịch vụ</p>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/about1.svg" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/about-shape-1.svg" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section class="about-area pt-70">
        <div class="about-shape-2">
            <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/about-shape-2.svg" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-last">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Giao diện <span> Đơn giản và dễ hiểu</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Giao diện hệ thống được cải tiến liên tục nhằm mang đến trải nghiệm tốt nhất cho
                            người dùng.</p>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/about2.svg" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== ABOUT PART START ======-->

    <section class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Nạp tiền tự động <span>hỗ trợ hầu hết các ngân hàng</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Hệ thống sẽ ghi nhận yêu cầu nhận tiền của bạn rất nhanh, và tiền sẽ vào tài
                            khoản của bạn gần như tức thì.</p>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/about3.svg" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/about-shape-1.svg" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== VIDEO COUNTER PART START ======-->

    <section id="facts" class="video-counter pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="{{ asset('homepage') }}/assets/landing_pages/page1/images/dots.svg"
                            alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <img src="{{ asset('homepage') }}/assets/landing_pages/page1/images/lp5.png"
                                    alt="">
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
                <div class="col-lg-6">
                    <div class="counter-wrapper mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Dịch vụ đa dạng <span> đầy đủ các công cụ bạn cần</span></h3>
                            </div> <!-- section title -->
                            <p class="text">Chúng tôi hỗ trợ các dịch vụ như Facebook, Instagram, TikTok, Youtube,
                                Shopee... nhằm đáp ứng mọi yêu cầu của bạn.</p>
                        </div> <!-- counter content -->
                        <div class="row no-gutters">
                            <div class="col-4">
                                <div
                                    class="single-counter counter-color-1 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">225</span>K</span>
                                        <p class="text">Đơn hàng</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div
                                    class="single-counter counter-color-2 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">87</span>K</span>
                                        <p class="text">Người dùng</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div
                                    class="single-counter counter-color-3 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">100</span>%</span>
                                        <p class="text">Hài lòng</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== VIDEO COUNTER PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="footer-widget pb-50">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-12"></div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="index.html">
                                vnsmarttol pro
                            </a>
                            <p class="text">
                                Với hơn 2 năm kinh nghiệm trong lĩnh vực Social, chúng tôi có đội ngũ kỹ thuật viên giàu
                                kinh nghiệm,
                                thấu hiểu tâm lý khách hàng, từ đó mang đến cho bạn trải nghiệm tốt nhất khi sử dụng dịch vụ
                            </p>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-12"></div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Các dịch vụ của chúng tôi</h4>
                            </div>
                            <ul class="contact">
                                <li>Facebook</li>
                                <li>Instagram</li>
                                <li>TikTok</li>
                                <li>Youtube.</li>
                                <li>Shopee.</li>
                                <li>Instagram.</li>
                            </ul>
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">© Copyright vnsmarttol pro. All Rights Reserved.</p>
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

@endsection

@section('js_page')
    <!--====== Jquery js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/popper.min.js"></script>
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/bootstrap.min.js"></script>

    <!--====== Plugins js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/plugins.js"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/slick.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/ajax-contact.js"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/waypoints.min.js"></script>
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/jquery.counterup.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/jquery.easing.min.js"></script>
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/scrolling-nav.js"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/wow.min.js"></script>

    <!--====== Particles js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/particles.min.js"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('homepage') }}/assets/landing_pages/page1/js/main.js"></script>


@endsection

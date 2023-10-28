@extends('homepage.layouts.master')

@section('css_page')
    <!-- page css -->
    <link href="{{ asset('homepage') }}/assets/css/login9f3c.css?t=1698339223280" rel="stylesheet">

    <!-- Core css -->
    <link href="{{ asset('homepage') }}/assets/css/app.min9f3c.css?t=1698339223280" rel="stylesheet">

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
@endsection

@section('content')
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex"
            style="background-image: url({{ asset('homepage') }}/assets/images/background/default.png)">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt=""
                                            src="{{ asset('homepage') }}/assets/images/logo/default.png">
                                        <h2 class="m-b-0">Đăng nhập</h2>
                                    </div>
                                    <form id="formAuth" action="">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Tên đăng nhập:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon fa fa-user"></i>
                                                <input type="text" class="form-control text-lower" id="userName"
                                                    name="username" placeholder="Tên đăng nhập" tabindex="1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Mật khẩu:</label>
                                            <a class="float-right font-size-13 text-muted"
                                                href="{{ route('forgotPassword.index') }}">Quên mật
                                                khẩu?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon fa fa-key"></i>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Mật khẩu" tabindex="2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Chưa có tài khoản?
                                                    <a href="{{ route('register.index') }}"> Đăng ký</a>
                                                </span>
                                                <button class="btn btn-primary" tabindex="3">Đăng nhập</button>
                                            </div>


                                            {{-- <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Bạn muốn xem thử chức năng?
                                                    <a href="#" class="btn-try">Xem thử</a>
                                                </span>
                                            </div> --}}

                                        </div>

                                        <div class="form-group">

                                            <link rel="stylesheet" type="text/css"
                                                href="{{ asset('homepage') }}/assets/css/auth_common9f3c.css?t=1698339223280">

                                            <div class="translate-wrapper">
                                                <div id="button_translate"></div>
                                            </div>


                                            <script>
                                                function googleTranslate() {
                                                    new google.translate['TranslateElement']({
                                                        pageLanguage: 'vi'
                                                    }, 'button_translate');
                                                }
                                            </script>

                                            <script type="text/javascript" src="../translate.google.com/translate_a/elementdb88.js?cb=googleTranslate"></script>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2021</span>
                </div>
            </div>
        </div>
    </div>

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
                            <input class="form-control" id="otp" placeholder="XXXXXX" maxlength="6" type="tel">
                        </div>

                        <button class="btn btn-success btn-confirm-otp">Xác nhận</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endsection


@section('js_page')
    <!-- Core Vendors JS -->
    <script src="{{ asset('homepage') }}/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="{{ asset('homepage') }}/assets/js/auth9f3c.js?t=1698339223280"></script>
    <script src="{{ asset('homepage') }}/assets/js/try_web9f3c.js?t=1698339223280"></script>
@endsection

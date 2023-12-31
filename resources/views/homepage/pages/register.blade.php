@extends('homepage.layouts.master')

@section('css_page')
    <!-- page css -->
    <link href="{{ asset('homepage/assets/css/login.css') }}" rel="stylesheet">

    <!-- Core css -->
    <link href="{{ asset('homepage/assets/css/app.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex"
            style="background-image: url({{ asset('homepage/assets/images/background/default.png') }})">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt=""
                                            src="{{ asset('homepage/assets/images/logo/default.png') }}">
                                        <h2 class="m-b-0">Đăng ký</h2>
                                    </div>
                                    <form id="formAuth" action="{{route('register')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Tên đăng nhập:</label>
                                            <input type="text" class="form-control text-lower" id="userName"
                                                name="username" placeholder="Tên đăng nhập" required tabindex="1">
                                            @if ($errors->first('username'))
                                                <div class="invalid-alert text-danger">{{ $errors->first('username') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <input type="email" class="form-control text-lower" id="email"
                                                name="email" placeholder="Email" required tabindex="2">
                                            @if ($errors->first('email'))
                                                <div class="invalid-alert text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                            <button id="generate_email" class="btn btn-primary btn-sm" type="button"
                                                style="margin-top: 5px">Tôi chưa có email</button>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label class="font-weight-semibold" for="phone">SDT/Zalo:</label>
                                            <input type="number" class="form-control" id="phone" name="phone"
                                                placeholder="SDT/Zalo" required tabindex="3">
                                        </div> --}}

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Mật khẩu:</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Mật khẩu" required tabindex="4">
                                            @if ($errors->first('password'))
                                                <div class="invalid-alert text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="confirmPassword">Xác nhận mật
                                                khẩu:</label>
                                            <input type="password" class="form-control" id="confirmPassword" name="re_password"
                                                placeholder="Xác nhận mật khẩu" required tabindex="5">
                                                @if ($errors->first('re_password'))
                                                    <div class="invalid-alert text-danger">{{ $errors->first('username') }}</div>
                                                @endif
                                        </div>


                                        {{-- <div class="form-group">
                                            <label class="font-weight-semibold">Mã giới thiệu (nếu có)</label>
                                            <input class="form-control" name="referral_code" placeholder="" tabindex="6">
                                        </div> --}}

                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-15">
                                                <span class="font-size-13 text-muted">
                                                    Đã có tài khoản?
                                                    <a href="{{ route('login.index') }}"> Đăng nhập</a>
                                                </span>
                                                <!--                      <div class="checkbox">-->
                                                <!--                        <input id="checkbox" type="checkbox">-->
                                                <!--                        <label for="checkbox"><span>I have read the <a href="">agreement</a></span></label>-->
                                                <!--                      </div>-->
                                                <button class="btn btn-primary" tabindex="7">Đăng ký</button>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <link rel="stylesheet" type="text/css"
                                                href="{{ asset('homepage/assets/css/auth_common.css') }}">

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

                                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslate"></script>
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
@endsection

@section('js_page')
    <!-- Core Vendors JS -->
    <script src="{{ asset('homepage/assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('homepage/assets/js/auth.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/generate_email.js') }}"></script>
@endsection

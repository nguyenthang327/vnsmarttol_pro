@extends('homepage.layouts.master')

@section('css_page')
    <!-- page css -->
    <link href="{{ asset('homepage') }}/assets/css/login9f3c.css?t=1698339223280" rel="stylesheet">

    <!-- Core css -->
    <link href="{{ asset('homepage') }}/assets/css/app.min9f3c.css?t=1698339223280" rel="stylesheet">
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
                                        <h2 class="m-b-0">Khôi phục mật khẩu</h2>
                                    </div>
                                    <form id="emailForm" action="">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email của bạn:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email của bạn" required>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button class="btn btn-primary">Khôi phục mật khẩu</button>
                                                <a href="{{ route('login.index') }}">Trở lại đăng nhập</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <b class="form-text text-danger font-weight-bold">Gõ đúng Gmail. Có thể thư nằm
                                            trong mục Thư Rác</b>
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
    <div class="modal fade" id="modalChangePass" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="passwordForm" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác thực thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mã OTP nhận được từ email ( Có thể thư nằm trong mục Thư Rác ) </label>
                            <input class="form-control" name="code" minlength="5" maxlength="20" required />
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input class="form-control" type="text" placeholder="Mật khẩu" name="password" minlength="6"
                                maxlength="32" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-primary">Cập Nhật Mật Khẩu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Modal-->
@endsection


@section('js_page')
    <!-- Core Vendors JS -->
    <script src="{{ asset('homepage') }}/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="{{ asset('homepage') }}/assets/js/forgot_pass.js" type="text/javascript"></script>
@endsection

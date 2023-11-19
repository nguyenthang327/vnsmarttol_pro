@extends('admin.layouts.master')

@section('css_page')
    <link href="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <style>
        .form-group p {
            margin-bottom: 5px;
        }

        .card-header[data-toggle="collapse"] {
            cursor: pointer;
            padding: 0.75rem 1.25rem;
            background-color: #e0fbe4;
            border: none;
        }

        .card-header[data-toggle="collapse"] h5 {
            display: inline-block;
        }

        .card-header[data-toggle="collapse"] h5 + i {
            margin-top: 4px;
            float: right;
            transition: all linear .3s;
        }

        .card-header[data-toggle="collapse"]:not(.collapsed) h5 + i {
            transform: rotate(180deg);
        }

        #vcb_browser_id_collapse li {
            font-size: 15px;
        }

        #vcb_browser_id_collapse img {
            max-width: 100%;
        }

        .img-intro {
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .text-intro {
            color: #f50e02;
            font-size: 80%;
            font-weight: 400;
        }

        .alert-big {
            font-size: 120%;
        }

        .pm-collapse .card {
            text-align: center;
        }

        .pm-collapse img {
            width: 600px;
            max-width: 100%;
        }

        i[data-toggle="collapse"] {
            color: #0abb87;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Thiết Lập</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thiết Lập</h4>
            </div>
            <div class="card-body">
                <form class="form-json" method="POST" action="{{ route('admin.setting.update') }}" data-reload="1">
                    <div class="text-success mb-2">Để cấu hình các mục hỗ trợ + Hỏi & Đáp ở trang chủ, vui lòng nhấn vào
                        <a href="{{ route('admin.home_settings.index') }}">đây</a></div>
                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control1"
                             aria-expanded="true">
                            <h5 class="mb-0">Cấu hình giao diện</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control1" class="collapse">
                            <div class="card-body">
                                <p class="text-primary">Cấu hình giao diện cần tối đa 30s để cài đặt có hiệu lực!</p>

                                <div class="alert alert-success">
                                    Website hỗ trợ get link ảnh: <a href="{{ config('constants.domain_upload_image') }}"
                                                                    target="_blank">Tại Đây</a>
                                </div>

                                <div class="form-group">
                                    <label>Logo website</label>
                                    <input type="url" name="logo" class="form-control"
                                           value="{{ old('logo') ?? $settings->logo }}"
                                           placeholder="Vui lòng nhập đường dẫn ảnh">
                                </div>

                                <div class="form-group">
                                    <label>Favicon website (<a target="_blank"
                                                               href="{{ old('favicon') ?? $settings->favicon }}">Xem ảnh
                                            gốc</a>)</label>
                                    <input type="url" name="favicon" class="form-control"
                                           value="{{ old('favicon') ?? $settings->favicon }}"
                                           placeholder="Vui lòng nhập đường dẫn ảnh">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh nền trang đăng ký và đăng nhập</label>
                                    <input type="url" name="background" class="form-control"
                                           value="{{ old('background') ?? $settings->background }}"
                                           placeholder="Vui lòng nhập đường dẫn ảnh">
                                    <div class="small">
                                        Hiện tại chỉ áp dụng ảnh nền bên trên cho giao diện <span class="text-primary">đăng ký / đăng nhập 1</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Màu nền thanh công cụ + nền tiêu đề khung</label>
                                    <input type="color"
                                           class="form-control change-css"
                                           name="css[menu_header_bg]"
                                           data-element=".menu_header"
                                           data-css="background-color"
                                           style="height: 40px"
                                           value="{{ old('css[menu_header_bg]') ?? $settings->menu_header_bg }}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label>Màu menu</label>
                                    <div class="form-inline">
                                        <div class="form-group mr-2">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="menu_color"
                                                           value="default" {{ old('menu_color') == "default" || $settings->menu_color == "default" ? "checked" : "" }}>
                                                    Mặc định
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mr-2">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="menu_color"
                                                           value="dark" {{ old('menu_color') == "dark" || $settings->menu_color == "dark" ? "checked" : "" }}>
                                                    Tối
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-inline ld-container">
                                    <label class="m-r-30">Landing Page</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="landing_page"
                                               {{ old('landing_page') == "none" || $settings->landing_page == "none" ? "checked" : "" }}
                                               id="landing_page_none" value="none"
                                        >
                                        <label class="form-check-label c-pointer" for="landing_page_none">Không</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page1"
                                                {{ old('landing_page') == "page1" || $settings->landing_page == "page1" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('homepage/assets/landing_pages/demo/page1.png') }}"
                                                 alt="image">
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page2"
                                                {{ old('landing_page') == "page2" || $settings->landing_page == "page2" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('homepage/assets/landing_pages/demo/page2.png') }}"
                                                 alt="image">
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page3"
                                                {{ old('landing_page') == "page3" || $settings->landing_page == "page3" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('homepage/assets/landing_pages/demo/page3.png') }}"
                                                 alt="image">
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page4"
                                                {{ old('landing_page') == "page4" || $settings->landing_page == "page4" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('homepage/assets/landing_pages/demo/page4.png') }}"
                                                 alt="image">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page5"
                                                {{ old('landing_page') == "page5" || $settings->landing_page == "page5" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('homepage/assets/landing_pages/demo/page5.png') }}"
                                                 alt="image">
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group form-inline ld-container">
                                    <label class="m-r-30">Giao diện đăng ký / đăng nhập</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="auth_widget" value="1"
                                                {{ old('auth_widget') == "1" || $settings->auth_widget == "1" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('assets/images/demo_images/auth_1.png') }}" alt="">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="auth_widget"
                                                   value="2"
                                                {{ old('auth_widget') == "2" || $settings->auth_widget == "2" ? "checked" : "" }}
                                            >
                                            <img src="{{ asset('assets/images/demo_images/auth_2.png') }}" alt="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control3"
                             aria-expanded="false">
                            <h5 class="mb-0">Danh Mục meta (cho seo) + Google Analytics, Tag Manager</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div id="control3" class="collapse">
                            <div class="card-body">
                                <h4 class="text-success">Chi tiết về các mục og bên dưới vui lòng xem tại <a
                                        target="_blank" href="https://carly.com.vn/blog/the-meta-open-graph/">đây</a>
                                </h4>
                                <div class="form-group">
                                    <label>Tiêu đề web</label>
                                    <input type="text" class="form-control" name="title" autocomplete="off"
                                           value="{{ old('title') ?? $settings->title }}">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả (Các mục Mô tả và meta để áp dụng seo website. Nếu không rành hãy bỏ
                                        qua.)</label>
                                    <input type="text" class="form-control" name="description" autocomplete="off"
                                           value="{{ old('description') ?? $settings->description }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:title</label>
                                    <input type="text" class="form-control" name="og_title" autocomplete="off"
                                           value="{{ old('og_title') ?? $settings->og_title }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:site_name</label>
                                    <input type="text" class="form-control" name="og_site_name" autocomplete="off"
                                           value="{{ old('og_site_name') ?? $settings->og_site_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:description</label>
                                    <input type="text" class="form-control" name="og_description" autocomplete="off"
                                           value="{{ old('og_description') ?? $settings->og_description }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:type</label>
                                    <input type="text" class="form-control" name="og_type" autocomplete="off"
                                           value="{{ old('og_type') ?? $settings->og_type }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:url</label>
                                    <input type="text" class="form-control" name="og_url" autocomplete="off"
                                           value="{{ old('og_url') ?? $settings->og_url }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:keywords</label>
                                    <input type="text" class="form-control" name="og_keywords" autocomplete="off"
                                           value="{{ old('og_keywords') ?? $settings->og_keywords }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:image</label>
                                    <input type="text" class="form-control" name="og_image" autocomplete="off"
                                           value="{{ old('og_image') ?? $settings->og_image }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta: Google-Site-Verification</label>
                                    <input type="text" class="form-control" name="google_site_verification"
                                           autocomplete="off"
                                           value="{{ old('google_site_verification') ?? $settings->google_site_verification }}">
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label>
                                        Google Analytics ID
                                        <span class="badge-question"
                                              data-toggle="collapse"
                                              data-target="#collapse_ga_id"
                                              aria-expanded="false"
                                        >
                                            <span class="fa fa-question"></span>
                                        </span>
                                    </label>
                                    <input class="form-control" type="text" name="ga_id" value="{{ old('ga_id') ?? $settings->ga_id }}"
                                           placeholder="G-XXXXXXX">

                                    <div class="collapse mt-1" id="collapse_ga_id">
                                        <div class="card card-body">
                                            <img
                                                src="https://s3.ap-northeast-1.amazonaws.com/h.files/images/1636281805384_h7LvT7dFaK.png"
                                                alt="" class="img-intro"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>
                                        Google Tag Manager ID
                                        <span class="badge-question"
                                              data-toggle="collapse"
                                              data-target="#collapse_gtag_id"
                                              aria-expanded="false"
                                        >
                                            <span class="fa fa-question"></span>
                                        </span>
                                    </label>
                                    <input class="form-control" type="text" name="data[gtag_id]"
                                           value="{{ old('gtag_id') ?? $settings->gtag_id }}"
                                           placeholder="GTM-XXXXXXX">

                                    <div class="collapse mt-1" id="collapse_gtag_id">
                                        <div class="card card-body">
                                            <p>Hai chỗ này giống nhau, bạn copy chỗ nào cũng được</p>
                                            <img
                                                src="https://s3.ap-northeast-1.amazonaws.com/h.files/images/1684720976546_39b5I2hTTW.png"
                                                alt="" class="img-intro"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control4"
                             aria-expanded="false">
                            <h5 class="mb-0">Liên hệ hỗ trợ</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control4" class="collapse">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>SDT Zalo</label>
                                    <input class="form-control" type="number" name="zalo"
                                           value="{{ old('zalo') ?? $settings->zalo }}">
                                </div>

                                <div class="form-group">
                                    <label>Link FanPage Facebook</label>
                                    <input class="form-control" type="url" name="fanpage" value="{{ old('fanpage') ?? $settings->fanpage }}">
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại Admin (để khách liên hệ)</label>
                                    <input class="form-control" type="tel" name="phone" value="{{ old('phone') ?? $settings->phone }}"
                                           maxlength="11">
                                </div>

                                <div class=form-group>
                                    <label>Link Video hướng dẫn mua tên miền và tạo website</label><br/>
                                    <input class="form-control" name="link_video_1" type="url"
                                           value="{{ old('link_video_1') ?? $settings->link_video_1 }}" placeholder=""
                                           maxlength="200">
                                </div>

                                <div class=form-group>
                                    <label>Video hướng cách thức hoạt động và cấu hình website</label><br/>
                                    <input class="form-control" name="link_video_2" type="url"
                                           value="{{ old('link_video_2') ?? $settings->link_video_2 }}" placeholder=""
                                           maxlength="200">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control5"
                             aria-expanded="false">
                            <h5 class="mb-0">Cấp bậc & cài khuyến mại & kiếm tiền</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div id="control5" class="collapse">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-3">
                                        <div class="card form-group">
                                            <div class="card-header bg-primary text-white">Thành Viên</div>
                                            <div class="card-body">
                                                <button class="btn btn-success btn-edit-level-note text-bold"
                                                        data-level="0" type="button">
                                                    Sửa ghi chú
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3">
                                        <div class="card form-group">
                                            <div class="card-header bg-primary text-white">Cộng tác viên</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Mốc nạp tiền <br/>
                                                        <small class="text-primary">(Tính trên giá trị 1 giao dịch)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="min_charge_lv1"
                                                           value="{{ old('min_charge_lv1') ?? $settings->min_charge_lv1 }}" required
                                                           placeholder="Tính trên giá trị 1 giao dịch">
                                                </div>

                                                <div class="form-group">
                                                    <label>Mốc tích luỹ nâng cấp <br/>
                                                        <small class="text-primary">(Tính trên tổng tiền đã nạp)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="total_charge_lv1"
                                                           value="{{ old('total_charge_lv1') ?? $settings->total_charge_lv1 }}" required
                                                           placeholder="Tính trên tổng tiền đã nạp">
                                                </div>
                                                <button class="btn btn-success btn-edit-level-note text-bold"
                                                        data-level="1" type="button">
                                                    Sửa ghi chú
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-3">
                                        <div class="card form-group">
                                            <div class="card-header bg-primary text-white">Đại lý</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Mốc nạp tiền <br/>
                                                        <small class="text-primary">(Tính trên giá trị 1 giao dịch)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="min_charge_lv2"
                                                           value="{{ old('min_charge_lv2') ?? $settings->min_charge_lv2 }}" required
                                                           placeholder="Tính trên giá trị 1 giao dịch">
                                                </div>

                                                <div class="form-group">
                                                    <label>Mốc tích luỹ nâng cấp <br/>
                                                        <small class="text-primary">(Tính trên tổng tiền đã nạp)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="total_charge_lv2"
                                                           value="{{ old('total_charge_lv2') ?? $settings->total_charge_lv2 }}" required
                                                           placeholder="Tính trên tổng tiền đã nạp">
                                                </div>
                                                <button class="btn btn-success btn-edit-level-note text-bold" data-level="2" type="button">
                                                    Sửa ghi chú
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-lg-3">
                                        <div class="card form-group">
                                            <div class="card-header bg-primary text-white">Nhà phân phối</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Mốc nạp tiền <br/>
                                                        <small class="text-primary">(Tính trên giá trị 1 giao dịch)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="min_charge_lv3"
                                                           value="{{ old('min_charge_lv3') ?? $settings->min_charge_lv3 }}" required
                                                           placeholder="Tính trên giá trị 1 giao dịch">
                                                </div>

                                                <div class="form-group">
                                                    <label>Mốc tích luỹ nâng cấp <br/>
                                                        <small class="text-primary">(Tính trên tổng tiền đã nạp)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="total_charge_lv3"
                                                           value="{{ old('total_charge_lv3') ?? $settings->total_charge_lv3 }}" required
                                                           placeholder="Tính trên tổng tiền đã nạp">
                                                </div>
                                                <button class="btn btn-success btn-edit-level-note text-bold"
                                                        data-level="3" type="button">
                                                    Sửa ghi chú
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phần trăm khuyến mại nạp tiền (Áp dụng tất cả phương thức auto bank trừ cộng
                                        tiền thủ công)</label>
                                    <input type="number" class="form-control" name="offer_percent" autocomplete="off"
                                           value="{{ old('offer_percent') ?? $settings->offer_percent }}">
                                </div>

                                <div class="form-group">
                                    <label>Thời gian áp dụng khuyến mại</label>
                                    <div class="input-daterange">
                                        <input type="text" name="offer_from" class="form-control" value="{{ old('offer_from') ?? $settings->offer_from }}">
                                        <div class="input-group-addon">Đến</div>
                                        <input type="text" name="offer_to" class="form-control" value="{{ old('offer_to') ?? $settings->offer_to }}">
                                        <button class="btn btn-danger btn-delete-range" type="button">
                                            <i class="fas fa-backspace"></i>
                                            Xoá
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Cú pháp nạp tiền (Không tùy ý đổi khi đang sử dụng auto bank)</label>
                                    <input class="form-control" name="bank_prefix" value="naptien" maxlength="50"
                                           placeholder="ví dụ điền: auto. thì ctv chuyển tiền nd auto test123, thì test123 sẽ nhận được tiền tự động.">
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label class="text-danger">Ghi chú trang nạp tiền</label>
                                    <textarea class="form-control" name="payment_note" id="payment_note"
                                              rows="5">
                                        {{ old('payment_note') ?? $settings->payment_note }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="text-danger">Thông báo nổi trang nạp tiền</label>
                                    <textarea class="form-control" name="payment_popup_content"
                                              id="payment_popup_content" rows="5"></textarea>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="show_header" name="show_header" {{ old('show_header') == "on" || $settings->landing_page == "on" ? "checked" : "" }}>
                                            <label for="show_header"></label>
                                        </div>
                                        <label class="ml-2" style="font-size: 17px;font-weight: 600" for="show_header">Hiển
                                            thị thông báo nổi</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control6"
                             aria-expanded="false">
                            <h5 class="mb-0">Auto SubGiaRe (SubGiaRe.Vn) </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div id="control6" class="collapse">
                            <div class="card-body">
                                <h4 class="card-head-title">Cấu hình SubGiaRe</h4>
                                <hr/>
                                <div class=form-group>
                                    <label>Token SubGiaRe</label><br/>
                                    <div class="text-danger text-bold mb-1">Dịch vụ sẽ tắt nếu bạn không điền token</div>
                                    <input class="form-control" name="token_subgiare" value="{{ old('token_subgiare') ?? $settings->token_subgiare }}"
                                           placeholder="Token SubGiaRe" maxlength="500">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control8"
                             aria-expanded="false">
                            <h5 class="mb-0">Auto Card (TheSieuRe.Com) </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div id="control8" class="collapse">
                            <div class="card-body">
                                <h4 class="card-head-title">Cấu hình TheSieuRe</h4>
                                <hr/>
                                <div class="d-flex align-items-center">
                                    <div class="switch switch-setting m-r-10">
                                        <input type="checkbox" id="enable_card_payment" name="enable_card_payment" {{ old('enable_card_payment') == 1 || $settings->landing_page == 1 ? "checked" : "" }}>
                                        <label for="enable_card_payment"></label>
                                    </div>
                                    <label class="ml-2" style="font-size: 17px;font-weight: 600"
                                           for="enable_card_payment">Sử dụng dịch vụ</label>
                                </div>
                                <div class=form-group>
                                    <label>Partner ID TheSieuRe</label><br/>
                                    <div class="text-danger text-bold mb-1">Dịch vụ sẽ tắt nếu bạn không điền key</div>
                                    <input class="form-control" name="card_partner_id" value="{{ old('card_partner_id') ?? $settings->card_partner_id }}"
                                           placeholder="Partner ID TheSieuRe" maxlength="200">
                                </div>
                                <div class=form-group>
                                    <label>Partner Key TheSieuRe</label><br/>
                                    <div class="text-danger text-bold mb-1">Dịch vụ sẽ tắt nếu bạn không điền key</div>
                                    <input class="form-control" name="card_partner_key" value="{{ old('card_partner_key') ?? $settings->card_partner_key }}"
                                           placeholder="Partner Key TheSieuRe" maxlength="200">
                                </div>
                                <div class=form-group>
                                    <label>Phần trăm chiết khấu TheSieuRe (vui lòng nhập số nguyên, vd 25)</label>
                                    <input class="form-control" name="card_discount"
                                           value="{{ old('card_discount') ?? $settings->card_discount }}"
                                           placeholder="Phần trăm chiết khấu" type="number" minlength="0" max="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control9"
                             aria-expanded="false">
                            <h5 class="mb-0">Auto USDT (Fpayment.Co) </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div id="control9" class="collapse">
                            <div class="card-body">
                                <h4 class="card-head-title">Cấu hình Fpayment</h4>
                                <hr/>
                                <div class="d-flex align-items-center">
                                    <div class="switch switch-setting m-r-10">
                                        <input type="checkbox" id="enable_usdt_payment" name="enable_usdt_payment" {{ old('enable_usdt_payment') == 1 || $settings->enable_usdt_payment == 1 ? "checked" : "" }}>
                                        <label for="enable_usdt_payment"></label>
                                    </div>
                                    <label class="ml-2" style="font-size: 17px;font-weight: 600"
                                           for="enable_usdt_payment">Sử dụng dịch vụ</label>
                                </div>
                                <div class=form-group>
                                    <label>Địa chỉ ví Tron nhận tiền</label><br/>
                                    <div class="text-danger text-bold mb-1">Dịch vụ sẽ tắt nếu bạn không điền key</div>
                                    <input class="form-control" name="usdt_address_wallet" value="{{ old('usdt_address_wallet') ?? $settings->usdt_address_wallet }}"
                                           placeholder="Địa chỉ ví Tron nhận tiền" maxlength="200">
                                </div>
                                <div class=form-group>
                                    <label>Token mà hệ thống tạo ra khi thêm ví vào FPAYMENT</label><br/>
                                    <div class="text-danger text-bold mb-1">Dịch vụ sẽ tắt nếu bạn không điền key</div>
                                    <input class="form-control" name="usdt_token_wallet" value="{{ old('usdt_token_wallet') ?? $settings->usdt_token_wallet }}"
                                           placeholder="Token mà hệ thống tạo ra khi thêm ví vào FPAYMENT" maxlength="200">
                                </div>
                                <div class=form-group>
                                    <label>Tỉ giá nạp</label>
                                    <input class="form-control" name="usdt_discount"
                                           {{ old('usdt_discount') ?? $settings->usdt_discount }}
                                           placeholder="Phần trăm chiết khấu" type="number" minlength="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Hoàn Tất</button>
                        <button type="reset" class="btn btn-secondary">Đặt lại</button>
                    </div>
                    <div id="required_area" class="mt-3" style="display:none;">
                        <h4 class="text-danger text-bold">Vui lòng nhập các mục sau trước khi lưu</h4>
                        <ul class="ml-4 pl-2"></ul>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalLevelNote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form-json" action="/qladmin/settings/update_level_note">
                    <input type="hidden" name="level" class="form-control" value=""/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="level_note_content"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hoàn Tất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endsection

@section('js_page')
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('admin/datatable-settings.js')}}"></script>
@endsection

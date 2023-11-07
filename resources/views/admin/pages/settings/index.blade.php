@extends('admin.layouts.master')

@section('css_page')
    <link href="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
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
                <form class="form-json" method="POST" action="/qladmin/settings/" data-reload="1">

                    <div class="text-success mb-2">Để cấu hình các mục hỗ trợ + Hỏi & Đáp ở trang chủ, vui lòng nhấn vào <a href="/qladmin/home_settings">đây</a> </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control1" aria-expanded="true">
                            <h5 class="mb-0">Cấu hình giao diện</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control1" class="collapse">
                            <div class="card-body">
                                <p class="text-primary">Cấu hình giao diện cần tối đa 30s để cài đặt có hiệu lực!</p>

                                <div class="alert alert-success">
                                    Website hỗ trợ get link ảnh: <a href="https://linkanh.xyz/" target="_blank">Tại Đây</a>
                                </div>

                                <div class="form-group">
                                    <label>Logo website</label>
                                    <input type="url" name="logo" class="form-control" value=""
                                           placeholder="Vui lòng nhập đường dẫn ảnh">
                                </div>

                                <div class="form-group">
                                    <label>Favicon website (<a target="_blank" href="/assets/images/favicon.ico">Xem ảnh gốc</a>)</label>
                                    <input type="url" name="favicon" class="form-control"
                                           value=""
                                           placeholder="Vui lòng nhập đường dẫn ảnh">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh nền trang đăng ký và đăng nhập</label>
                                    <input type="url" name="background" class="form-control" value=""
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
                                           value="#ffffff"
                                    />
                                </div>

                                <div class="form-group">
                                    <label>Màu menu</label>

                                    <div class="form-inline">

                                        <div class="form-group mr-2">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="menu_color" value="default" checked>
                                                    Mặc định
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group mr-2">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="menu_color" value="dark" >
                                                    Tối
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group form-inline ld-container">
                                    <label class="m-r-30">Landing Page</label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="landing_page" id="landing_page_none" value="none"
                                        >
                                        <label class="form-check-label c-pointer" for="landing_page_none">Không</label>
                                    </div>


                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page1" checked>
                                            <img src="/assets/landing_pages/demo/page1.png" alt="image">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page2" >
                                            <img src="/assets/landing_pages/demo/page2.png" alt="image">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page3" >
                                            <img src="/assets/landing_pages/demo/page3.png" alt="image">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page4" >
                                            <img src="/assets/landing_pages/demo/page4.png" alt="image">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="landing_page" value="page5" >
                                            <img src="/assets/landing_pages/demo/page5.png" alt="image">
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group form-inline ld-container">
                                    <label class="m-r-30">Giao diện đăng ký / đăng nhập</label>


                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="auth_widget"
                                                   value="1" checked>
                                            <img src="/assets/images/demo_images/auth_1.png" alt="">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="auth_widget"
                                                   value="2" >
                                            <img src="/assets/images/demo_images/auth_2.png" alt="">
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="snow"
                                                   name="snow" checked
                                            >
                                            <label for="snow"></label>
                                        </div>
                                        <label class="ml-2" for="snow">Giao diện Tuyết</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="tet"
                                                   name="tet"
                                            >
                                            <label for="tet"></label>
                                        </div>
                                        <label class="ml-2" for="tet">Giao diện Tết</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="noel"
                                                   name="noel" checked
                                            >
                                            <label for="noel"></label>
                                        </div>
                                        <label class="ml-2" for="noel">Giao diện Noel</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="alert alert-warning">Lưu ý: Không bật đồng thời giao diện Tuyết và Tết</div>
                                </div>

                                <hr />
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="allow_try"
                                                   name="allow_try" checked
                                            >
                                            <label for="allow_try"></label>
                                        </div>
                                        <label class="ml-2" for="allow_try">Cho phép xem thử website</label>
                                    </div>
                                </div>

                                <hr />

                                <div>
                                    <div class="text-danger text-bold mb-2">Vui lòng liên hệ quản trị viên nếu bạn muốn bật/tắt captcha cho trang đăng ký.</div>

                                    <div class="d-flex align-items-center">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="use_captcha" name="use_captcha"  disabled>
                                            <label for="use_captcha"></label>
                                        </div>
                                        <label class="ml-2">Sử dụng captcha</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control_security" aria-expanded="false">
                            <h5 class="mb-0">Bảo mật hệ thống</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control_security" class="collapse">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mật khẩu cấp 2
                                        <span class="text-success"> (chưa thiết lập)</span>
                                    </label>

                                    <p class="text-uppercase text-danger">Chỉ nên bật nếu bạn có nhân viên quản lý tài khoản, để tránh họ cài đặt giá tiền linh tinh</p>

                                    <input type="text" class="form-control" name="password_lv2" autocomplete="off" >
                                </div>

                                <div class="text-danger">Lưu ý: Mật khẩu cấp 2 dùng để truy cập "Thiết lập hệ thống".
                                    Sau khi bạn cài đặt mật khẩu thì nội dung sẽ được mã hoá và không hiển thị lại.<br />
                                    Bạn có thể nhập lại nội dung để cập nhật mật khẩu mới<br />
                                </div>

                                <div>Để xoá mật khẩu cấp 2, vui lòng nhập chữ <span class="text-primary text-bold">null</span> và lưu lại</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control2" aria-expanded="false">
                            <h5 class="mb-0">Token API</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control2" class="collapse">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="token">Token API (Nếu đổi mật khẩu web chính phải cập nhật lại token mới)</label>
                                    <input type="text" class="form-control" id="token" name="token" autocomplete="off"
                                           value="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxODIxNzkxLCJ1c2VybmFtZSI6InRlbWlzdm4iLCJsYXN0X3Bhc3N3b3JkX3RpbWUiOiIyMDIzLTA1LTA4VDA3OjM0OjA1LjAwMFoiLCJ0aW1lIjoiMjAyMy0wNS0xNiAwMDozNTo1MSIsImlhdCI6MTY4NDE3MjE1MSwiZXhwIjoxODQxODUyMTUxfQ.X5S63ftcZKJ56F11cZ3u1jYJYnfN1Y1lcMMQGDSBr8c" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control3" aria-expanded="false">
                            <h5 class="mb-0">Danh Mục meta (cho seo) + Google Analytics, Tag Manager</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control3" class="collapse">
                            <div class="card-body">
                                <h4 class="text-success">Chi tiết về các mục og bên dưới vui lòng xem tại <a target="_blank" href="https://carly.com.vn/blog/the-meta-open-graph/">đây</a></h4>


                                <div class="form-group">
                                    <label>Tiêu đề web</label>
                                    <input type="text" class="form-control" name="title" autocomplete="off"
                                           value="VNSMARTTOL.COM | Hệ thống Seeding hàng đầu Việt Nam">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả (Các mục Mô tả và meta để áp dụng seo website. Nếu không rành hãy bỏ qua.)</label>
                                    <input type="text" class="form-control" name="description" autocomplete="off"
                                           value="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:title</label>
                                    <input type="text" class="form-control" name="og_title" autocomplete="off"
                                           value="VNSMARTTOL.COM HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:site_name</label>
                                    <input type="text" class="form-control" name="og_site_name" autocomplete="off"
                                           value="VNSMARTTOL.COM HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:description</label>
                                    <input type="text" class="form-control" name="og_description" autocomplete="off"
                                           value="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:type</label>
                                    <input type="text" class="form-control" name="og_type" autocomplete="off"
                                           value="services">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:url</label>
                                    <input type="text" class="form-control" name="og_url" autocomplete="off"
                                           value="https://vnsmarttol.com">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:keywords</label>
                                    <input type="text" class="form-control" name="og_keywords" autocomplete="off"
                                           value="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng...">
                                </div>

                                <div class="form-group">
                                    <label>Meta: og:image</label>
                                    <input type="text" class="form-control" name="og_image" autocomplete="off"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label>Meta: Google-Site-Verification</label>
                                    <input type="text" class="form-control" name="google_site_verification" autocomplete="off"
                                           value="">
                                </div>


                                <hr />

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
                                    <input class="form-control" type="text" name="ga_id" value="" placeholder="G-XXXXXXX">

                                    <div class="collapse mt-1" id="collapse_ga_id">
                                        <div class="card card-body">
                                            <img src="https://s3.ap-northeast-1.amazonaws.com/h.files/images/1636281805384_h7LvT7dFaK.png"
                                                 alt="" class="img-intro" />
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
                                           value=""
                                           placeholder="GTM-XXXXXXX">

                                    <div class="collapse mt-1" id="collapse_gtag_id">
                                        <div class="card card-body">
                                            <p>Hai chỗ này giống nhau, bạn copy chỗ nào cũng được</p>
                                            <img src="https://s3.ap-northeast-1.amazonaws.com/h.files/images/1684720976546_39b5I2hTTW.png"
                                                 alt="" class="img-intro" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control4" aria-expanded="false">
                            <h5 class="mb-0">Liên hệ hỗ trợ</h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control4" class="collapse">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>SDT Zalo</label>
                                    <input class="form-control" type="number" name="zalo"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label>Link FanPage Facebook</label>
                                    <input class="form-control" type="url" name="fanpage" value="">
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại Admin (để khách liên hệ)</label>
                                    <input class="form-control" type="tel" name="phone" value="0346999645" maxlength="11">
                                </div>

                                <div class=form-group>
                                    <label>Link Video hướng dẫn mua tên miền và tạo website</label><br/>
                                    <input class="form-control" name="link_video_1" type="url"
                                           value="https://youtu.be/CutJVfDfRiE" placeholder=""
                                           maxlength="200">
                                </div>

                                <div class=form-group>
                                    <label>Video hướng cách thức hoạt động và cấu hình website</label><br/>
                                    <input class="form-control" name="link_video_2" type="url"
                                           value="https://youtu.be/Z5ToDZw8XzA" placeholder=""
                                           maxlength="200">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control5" aria-expanded="false">
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


                                                <button class="btn btn-success btn-edit-level-note text-bold" data-level="0" type="button">
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
                                                    <label>Mốc nạp tiền <br />
                                                        <small class="text-primary">(Tính trên giá trị 1 giao dịch)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="min_charge_lv1"
                                                           value="200000" required
                                                           placeholder="Tính trên giá trị 1 giao dịch">
                                                </div>

                                                <div class="form-group">
                                                    <label>Mốc tích luỹ nâng cấp <br />
                                                        <small class="text-primary">(Tính trên tổng tiền đã nạp)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="total_charge_lv1"
                                                           value="2000000" required
                                                           placeholder="Tính trên tổng tiền đã nạp">
                                                </div>



                                                <button class="btn btn-success btn-edit-level-note text-bold" data-level="1" type="button">
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
                                                    <label>Mốc nạp tiền <br />
                                                        <small class="text-primary">(Tính trên giá trị 1 giao dịch)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="min_charge_lv2"
                                                           value="1000000" required
                                                           placeholder="Tính trên giá trị 1 giao dịch">
                                                </div>

                                                <div class="form-group">
                                                    <label>Mốc tích luỹ nâng cấp <br />
                                                        <small class="text-primary">(Tính trên tổng tiền đã nạp)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="total_charge_lv2"
                                                           value="5000000" required
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
                                                    <label>Mốc nạp tiền <br />
                                                        <small class="text-primary">(Tính trên giá trị 1 giao dịch)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="min_charge_lv3"
                                                           value="5000000" required
                                                           placeholder="Tính trên giá trị 1 giao dịch">
                                                </div>

                                                <div class="form-group">
                                                    <label>Mốc tích luỹ nâng cấp <br />
                                                        <small class="text-primary">(Tính trên tổng tiền đã nạp)</small>
                                                    </label>
                                                    <input class="form-control" type="number" name="total_charge_lv3"
                                                           value="20000000" required
                                                           placeholder="Tính trên tổng tiền đã nạp">
                                                </div>



                                                <button class="btn btn-success btn-edit-level-note text-bold" data-level="3" type="button">
                                                    Sửa ghi chú
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Phần trăm khuyến mại nạp tiền (Áp dụng tất cả phương thức auto bank trừ cộng tiền thủ công)</label>
                                    <input type="number" class="form-control" name="offer_percent" autocomplete="off" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Thời gian áp dụng khuyến mại</label>
                                    <div class="input-daterange">
                                        <input type="text" name="offer_from" class="form-control" value="">
                                        <div class="input-group-addon">Đến</div>
                                        <input type="text" name="offer_to" class="form-control" value="">
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

                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="admin_tele_on_payment"
                                                   name="admin_tele_on_payment" checked>
                                            <label for="admin_tele_on_payment"></label>
                                        </div>
                                        <label class="ml-2" style="font-size: 17px;font-weight: 600" for="admin_tele_on_payment">
                                            Nhận thông báo về Telegram khi người dùng nạp tiền
                                        </label>
                                    </div>

                                    <div class="alert alert-warning mt-1">
                                        Lưu ý: Bạn phải liên kết Telegram trước khi bật tính năng này!<br />
                                        <b>Không nên bật tính năng này. (làm trôi thông báo quan trọng từ admin)</b>
                                    </div>
                                </div>

                                <hr />

                                <h5 class="text-primary mb-2">Tính năng giới thiệu người dùng mới & hưởng hoa hồng</h5>

                                <div class="mb-2">
                                    <ul style="font-size: 15px;padding-left: 30px">
                                        <li>Tính năng sẽ hiển thị sau tối đa 1p từ khi bạn bật.</li>
                                        <li>Người đăng ký nhận % hoa hồng từ lần nạp đầu tiên (áp dụng auto bank)</li>
                                        <li>Người chia sẻ nhận % khi người đăng ký nạp lần thứ 2 (tránh spam ăn hoa hồng).</li>
                                    </ul>
                                </div>

                                <div class="d-flex align-items-center mb-1">
                                    <div class="switch switch-setting m-r-10">
                                        <input type="checkbox" id="enable_referral" name="enable_referral" >
                                        <label for="enable_referral"></label>
                                    </div>
                                    <label class="ml-2" style="font-size: 17px;font-weight: 600" for="enable_referral">Bật tính năng</label>
                                </div>

                                <div class="form-group">
                                    <label>Phần trăm hoa hồng</label>
                                    <input type="number" class="form-control" name="referral_percent" autocomplete="off" value="5">
                                </div>

                                <div class="form-group">
                                    <label>Video hướng dẫn sử dụng</label>
                                    <input class="form-control" name="data[video_referral]"
                                           autocomplete="off"
                                           value="" placeholder="https://www.youtube.com/watch?v=abcxyz">
                                </div>

                                <div class="form-group">
                                    <label class="text-danger">Ghi chú cho người dùng</label>
                                    <textarea class="form-control" name="data[referral_note]" id="referral_note"
                                              rows="5"></textarea>
                                </div>

                                <hr />

                                <div class="form-group">
                                    <label class="text-danger">Ghi chú trang nạp tiền</label>
                                    <textarea class="form-control" name="payment_note" id="payment_note" rows="5"></textarea>
                                </div>


                                <div class="form-group">
                                    <label class="text-danger">Thông báo nổi trang nạp tiền</label>
                                    <textarea class="form-control" name="payment_popup_content" id="payment_popup_content" rows="5"></textarea>

                                    <div class="d-flex align-items-center mt-2">
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="show_header" name="show_header" >
                                            <label for="show_header"></label>
                                        </div>
                                        <label class="ml-2" style="font-size: 17px;font-weight: 600" for="show_header">Hiển thị thông báo nổi</label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control8" aria-expanded="false">

                            <h5 class="mb-0">Auto Card (ShopDoiThe.Com) </h5>

                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control8" class="collapse">
                            <div class="card-body">


                                <h4 class="card-head-title">Cấu hình ShopDoiThe.Com</h4>

                                <div class="alert alert-warning alert-big">
                                    Video hướng dẫn sử dụng: <a href="https://youtu.be/M4mCIxY6Piw" target="_blank">Tại đây</a>
                                </div>

                                <div>
                                    <b>HD Sơ qua về ShopDoiThe.Com:</b>
                                    <ol>
                                        <li>Tạo tài khoản trên trang <a target="_blank" class="text-bold" href="https://shopdoithe.com/">https://shopdoithe.com/</a></li>
                                        <li>Truy cập <i class="text-bold">Tài khoản</i> > <i class="text-bold">Thông Tin Tài Khoản</i></li>
                                        <li>Sao chép <i class="text-bold">Mã khóa kết nối API</i> và dán vào bên dưới</li>
                                        <li class="text-danger">Lưu ý: Chỉ hỗ trợ hệ thống khi sử dụng https</li>
                                    </ol>
                                </div>

                                <hr />

                                <div class="d-flex align-items-center">
                                    <div class="switch switch-setting m-r-10">
                                        <input type="checkbox" id="enable_card_payment" name="enable_card_payment" >
                                        <label for="enable_card_payment"></label>
                                    </div>
                                    <label class="ml-2" style="font-size: 17px;font-weight: 600" for="enable_card_payment">Sử dụng dịch vụ</label>
                                </div>

                                <div class=form-group>
                                    <label>Key  API ShopDoiThe </label><br />
                                    <div class="text-danger text-bold mb-1">Dịch vụ sẽ tắt nếu bạn không điền key</div>
                                    <input class="form-control" name="sdt_key" value="" placeholder="Key ShopDoiThe" maxlength="200">
                                </div>

                                <div class=form-group>
                                    <label>Phần trăm chiết khấu ShopDoiThe (vui lòng nhập số nguyên, vd 20)</label>
                                    <input class="form-control" name="sdt_sub_percent" value="30"
                                           placeholder="Phần trăm chiết khấu" type="number" minlength="0" max="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control9" aria-expanded="false">

                            <h5 class="mb-0">
                                Cấu hình AUTO MOMO SV1 (ổn định kém)
                                (<span class="text-success">Đang tắt</span>)
                                <span class="text-intro">20k/1 tháng</span>
                            </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control9" class="collapse">
                            <div class="card-body">
                                <div class="kt-portlet__head-label">
                                    <h5 class="kt-portlet__head-title">Auto bank MOMO (BotMoMo.Com)</h5>
                                </div>

                                <div class="alert alert-warning alert-big">
                                    Video hướng dẫn sử dụng: <a href="https://youtu.be/GeqmEIfzs4I" target="_blank">Tại đây</a>
                                </div>

                                <small class="form-text text-danger font-weight-bold">Ưu điểm: Không phải treo máy, không sót đơn, có thể tùy ý nhận tiền, rút tiền, chuyển tiền trực tiếp ở website.</small>
                                <div>
                                    <b>HD Sơ qua về BotMoMo.Com:</b>
                                    <ol>
                                        <li>Tạo 1 tài khoản trên <a href="https:://botmomo.com" target="_blank">BotMoMo.Com</a> </li>
                                        <li>Bạn cần gia hạn tài khoản tại giao diện admin này để có thể sử dụng dịch vụ. </li>
                                        <li>Dịch vụ chỉ chạy khi bạn bật dịch vụ, và thời gian sử dụng còn hiệu lực</li>
                                        <li>Nếu webhook của bạn không phải https, hãy liên hệ quản trị viên</li>
                                    </ol>
                                    <div class="form-group">
                                        <label>Đường dẫn WebHook để cấu hình trên BotMoMo.Com:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="momo_webhook" value="" readonly>
                                            <div class="input-group-append">
                                                <a href="javascript:void(0)" class="btn btn-secondary btn-copy" data-target="momo_webhook"><i class="fas fa-copy"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h5>Bật tắt dịch vụ</h5>
                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label>Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="use_auto_momo" name="use_auto_momo" >
                                            <label for="use_auto_momo"></label>
                                        </div>
                                        <label>Bật</label>
                                    </div>
                                </div>


                                <h5>Tự động gia hạn</h5>
                                <small class="mb-1">Hệ thống sẽ tự động gia hạn dịch vụ khi gần hết hạn. Vui lòng đảm bảo tài
                                    khoản đủ số dư để
                                    gia hạn!</small>
                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label>Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="auto_momo_auto_renew" name="auto_momo_auto_renew" >
                                            <label for="auto_momo_auto_renew"></label>
                                        </div>
                                        <label>Bật</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success btn-extend-momo" type="button"><i class="far fa-clock"></i> Gia Hạn (20k/1 tháng)</button>
                                    <div class="text-danger mt-1">Lưu ý: Vui lòng lưu WebHook trên BotMoMo.Com trước khi gia hạn.</div>
                                </div>

                                <div class="form-group">
                                    <label>Signature BotMoMo.Com</label>
                                    <input class="form-control" name="auto_momo_signature" value="" placeholder="Signature">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control_bot_momo"
                             aria-expanded="false">
                            <h5 class="mb-0">
                                Cấu hình AUTO MOMO SV2 (ổn định 10đ)
                                <span class="text-intro">100k/1 tháng</span>
                            </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control_bot_momo" class="collapse">
                            <div class="card-body">
                                <div class="kt-portlet__head-label">
                                    <h5 class="kt-portlet__head-title">Auto bank MOMO ( https://momosv3.apimienphi.com/ )</h5>
                                </div>

                                <div class="alert alert-warning alert-big">
                                    Video hướng dẫn sử dụng: <a href="https://youtu.be/GeqmEIfzs4I" target="_blank">Tại đây</a>
                                </div>

                                <small class="form-text text-danger font-weight-bold">Ưu điểm: Không phải treo
                                    máy, không sót đơn,
                                    có thể tùy ý nhận tiền, rút tiền, chuyển tiền trực tiếp ở
                                    website.</small><br>
                                <div>
                                    <b>HD Sơ qua về https://momosv3.apimienphi.com/:</b>
                                    <ol>
                                        <li>Tạo 1 tài khoản trên <a href="https://momosv3.apimienphi.com/" target="_blank">momosv3.apimienphi.com</a>
                                        </li>
                                        <li>Bạn cần gia hạn tài khoản tại giao diện admin này để có thể sử dụng
                                            dịch vụ.
                                        </li>
                                        <li>Dịch vụ chỉ chạy khi bạn bật dịch vụ, và thời gian sử dụng còn hiệu
                                            lực
                                        </li>
                                        <li>Nếu webhook của bạn không phải https, hãy liên hệ quản trị viên</li>
                                    </ol>
                                    <div class="form-group">
                                        <label>Đường dẫn WebHook để cấu hình trên momosv3.apimienphi.com:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="momo_webhook_v2" value=""
                                                   readonly>
                                            <div class="input-group-append">
                                                <a href="javascript:void(0)" class="btn btn-primary"
                                                   data-clipboard="true"
                                                   data-clipboard-target="#momo_webhook_v2"><i
                                                        class="fas fa-copy text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h5>Bật tắt dịch vụ</h5>
                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label>Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="use_auto_momo_v2"
                                                   name="data[use_auto_momo_v2]" >
                                            <label for="use_auto_momo_v2"></label>
                                        </div>
                                        <label>Bật</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Signature</label>
                                    <input class="form-control" name="data[auto_momo_v2_signature]"
                                           value=""
                                           placeholder="Signature">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control10" aria-expanded="false">
                            <h5 class="mb-0">
                                Cấu hình Autobank Vietcombank
                                <span class="text-intro">100k vĩnh viễn</span>
                            </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control10" class="collapse">
                            <div class="card-body">
                                <div class="alert alert-warning alert-big">
                                    Video hướng dẫn sử dụng: <a href="https://youtu.be/HzY5ch6xOmQ" target="_blank">Tại đây</a>
                                </div>


                                <h6>Đăng ký sử dụng dịch vụ</h6>
                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label class="m-r-5">Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="vcb_is_allow">
                                            <label for="vcb_is_allow"></label>
                                        </div>
                                        <label>Bật</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control11" aria-expanded="false">
                            <h5 class="mb-0">
                                Cấu hình Autobank MBBank
                                <span class="text-intro">Miễn phí</span>
                            </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control11" class="collapse">
                            <div class="card-body">
                                <div class="alert alert-warning alert-big">
                                    Video hướng dẫn sử dụng: <a href="https://youtu.be/HzY5ch6xOmQ" target="_blank">Tại đây</a>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label>Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="auto_mb_bank" name="auto_mb_bank" >
                                            <label for="auto_mb_bank"></label>
                                        </div>
                                        <label>Bật</label>
                                    </div>
                                    <b class="form-text text-danger font-weight-bold mt-1">Nếu dịch vụ đang chạy mà bạn nhận được tin nhắn lỗi từ telegram, hãy vào bật lại dịch vụ</b>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tài khoản MBbank</label>
                                            <input class="form-control" name="mb_username" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mật khẩu MBbank</label>
                                            <input class="form-control" name="mb_password" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>STK MB</label>
                                            <input class="form-control" name="mb_account_no" value="" type="number">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            Bắt buộc login trang chủ MBBank kiểm tra thông tin có chính xác không? tại đây:
                                            <a href="https://online.mbbank.com.vn/" target="_blank">https://online.mbbank.com.vn/</a>.
                                            Bạn cũng có thể nhấn nút bên dưới để kiểm tra tự động
                                        </div>

                                        <button class="btn btn-success mt-1" id="btn_check_mb" type="button">Kiểm tra MBBank</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control12"
                             aria-expanded="false">
                            <h5 class="mb-0">
                                Cấu hình Autobank Perfect Money
                            </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control12" class="collapse">
                            <div class="card-body">
                                <!--                                        <div class="alert alert-warning alert-big">-->
                                <!--                                            Video hướng dẫn sử dụng: <a href="https://youtu.be/HzY5ch6xOmQ" target="_blank">Tại đây</a>-->
                                <!--                                        </div>-->

                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label for="enable_perfect_money">Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="enable_perfect_money"
                                                   name="enable_perfect_money" >
                                            <label for="enable_perfect_money"></label>
                                        </div>
                                        <label for="enable_perfect_money">Bật</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tỉ giá USD/VND (khoảng 23.000)</label>
                                            <input type="number" class="form-control" name="data[pm_usd_rate]"
                                                   value="23000" placeholder="23000">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>
                                                ID tài khoản Perfect Money
                                                <i class="fa-solid fa-circle-question ml-1"
                                                   data-toggle="collapse" data-target="#collapse_pm_payee_account"></i>
                                            </label>
                                            <input class="form-control" name="data[pm_payee_account]"
                                                   value="" placeholder="U42203753">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>
                                                PassPhrase Perfect Money
                                                <i class="fa-solid fa-circle-question ml-1"
                                                   data-toggle="collapse" data-target="#collapse_pm_pass_phrase"></i>
                                            </label>
                                            <input class="form-control" name="data[pm_pass_phrase]"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tên người thụ hưởng</label>
                                            <input class="form-control" name="data[pm_payee_name]"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="collapse pm-collapse" id="collapse_pm_payee_account">
                                            <div class="card card-body">
                                                <div class="text-center">
                                                    <img src="/assets/images/pm_intro_1.png" alt="" />
                                                </div>
                                                <p class="mt-1">
                                                    Truy cập <a href="https://perfectmoney.com/profile.html" target="_blank">https://perfectmoney.com/profile.html</a>
                                                    và sao chép tài khoản nhận tiền USD
                                                </p>
                                            </div>
                                        </div>

                                        <div class="collapse pm-collapse" id="collapse_pm_pass_phrase">
                                            <div class="card card-body">
                                                <div class="text-center">
                                                    <img src="/assets/images/pm_intro_2.png" alt="" />
                                                </div>
                                                <p class="mt-1">Bạn cần cài đặt một mật khẩu thay thế để nhận tiền.<br />
                                                    Truy cập: <a href="https://perfectmoney.com/userchange.html" target="_blank">https://perfectmoney.com/userchange.html</a><br />
                                                    Nhấn nút <strong>Generate</strong> ở hình trên để khởi tạo một mật khẩu, sau đó lưu lại, và điền vào mục
                                                    <strong>PassPhrase Perfect Money</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#control13"
                             aria-expanded="false">
                            <h5 class="mb-0">
                                Cấu hình Autobank ACB
                                <span class="text-intro">Miễn phí</span>
                            </h5>
                            <i class="fas fa-caret-down"></i>
                        </div>

                        <div id="control13" class="collapse">
                            <div class="card-body">
                                <div class="alert alert-warning alert-big">
                                    Video hướng dẫn sử dụng: <a href="https://youtu.be/HzY5ch6xOmQ" target="_blank">Tại đây</a>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex align-items-center switch-wrapper">
                                        <label>Tắt</label>
                                        <div class="switch switch-setting m-r-10">
                                            <input type="checkbox" id="auto_acb_bank"
                                                   name="auto_acb_bank" >
                                            <label for="auto_acb_bank"></label>
                                        </div>
                                        <label>Bật</label>
                                    </div>
                                    <b class="form-text text-danger font-weight-bold mt-1">Nếu dịch vụ đang chạy
                                        mà bạn nhận được tin nhắn lỗi từ telegram, hãy vào bật lại dịch vụ</b>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tài khoản ACB</label>
                                            <input class="form-control" name="data[acb_username]"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mật khẩu ACB</label>
                                            <input class="form-control" name="data[acb_password]"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>STK ACB</label>
                                            <input class="form-control" name="data[acb_account_no]"
                                                   value="" type="number">
                                        </div>
                                    </div>
                                </div>

                                <b class="form-text text-primary font-weight-bold mt-2 mb-2">
                                    Bạn có thể nhấn nút bên dưới để kiểm tra tự động</b>

                                <button class="btn btn-success mt-1" id="btn_check_acb" type="button">Kiểm tra</button>

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
    <script src="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.js')}}" type="text/javascript"></script>
@endsection

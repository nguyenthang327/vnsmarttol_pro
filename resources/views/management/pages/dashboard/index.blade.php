@extends('management.layouts.master', ['noBreadcrumb' => true])

@section('css_page')
@endsection

@section('subHeader')
    {{-- <div class="sub-header">
        <div class="title">Trang Tổng Quan</div>
        <div class="link-logout">
            <a href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Đăng Xuất</a>
        </div>
    </div> --}}
@endsection

@section('content')
    <div class="main-content">
        <div class="row flex-row-reverse">
            <div class="col-xl-4 col-md-6">
                <div class="card widget-user mb-only">
                    <div class="card-body">
                        <h4>Tổng Quan</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="widget__top">
                                    <div class="widget__media hidden-">
                                        <img src="{{ asset('management/assets/images/avatar.jpg') }}" alt="image">
                                    </div>
                                    <div class="widget__content">
                                        <div class="widget__head">
                                            <a href="{{ route('information.index') }}"
                                                class="widget__username text-success">
                                                {{ $user->username }}
                                                <img class="icon-tick"
                                                    src="{{ asset('management/assets/images/tick.svg') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="widget__subhead">
                                            <a href="javascript:void(0)" class="text-warning">
                                                <i class="fa fa-envelope"></i>
                                                {{ $user->email }}
                                            </a>
                                            <a href="javascript:void(0)" class="text-primary">
                                                <i class="fa fa-user"></i>Nhà phân phối
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="widget-statistic">
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon text-success far fa-money-bill-alt"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">Số Dư</div>
                                                <div class="text-2 text-money">
                                                    <span>376,842₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon fas fa-money-check text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">Đã Sử Dụng</div>
                                                <div class="text-2 text-money">
                                                    <span>2,123,158₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon fas fa-money-check-alt text-danger"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">Đã Nạp</div>
                                                <div class="text-2 text-money">
                                                    <span>2,500,000₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon fa fa-star text-warning"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">VIP Đang chạy</div>
                                                <div class="text-2 text-money">
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card box-shadow-1">
                    <div class="card-header menu_header">Hoạt động mới</div>
                    <div class="card-body">
                        <div class="list-user-notifications custom-scroll">
                            <table id="table-notifications">
                                <tbody>
                                    <tr class="notify-item notify-type-notify_popup"
                                        data-time="Fri Sep 29 2023 13:38:40 GMT+0700 (Indochina Time)"
                                        data-type="notify_popup">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            VIETCOMBANK bị ép đổi mật khẩu, mọi người đổi xong cập nhật lại
                                            mật khẩu
                                            và id trình duyệt nếu sử dụng auto bank và test auto lại nha
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify"
                                        data-time="Thu Sep 28 2023 14:50:05 GMT+0700 (Indochina Time)" data-type="notify">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Hoàn 1,360₫ từ dịch vụ comment
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify"
                                        data-time="Wed Sep 27 2023 17:40:05 GMT+0700 (Indochina Time)" data-type="notify">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Hoàn 1,360₫ từ dịch vụ comment
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify_popup"
                                        data-time="Thu Aug 17 2023 19:27:29 GMT+0700 (Indochina Time)"
                                        data-type="notify_popup">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Mở lại share tiktok v4, giá rẻ lên rất nhanh. Update (website
                                            phụ) chức
                                            năng thông báo nổi cho từng dịch vụ.
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify_popup"
                                        data-time="Tue Jun 27 2023 11:55:58 GMT+0700 (Indochina Time)"
                                        data-type="notify_popup">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Momo: Hiện tại bên momo chặn giới hạn đăng nhập tần suất nhiều
                                            hơn. dễ
                                            bị chặn 24 giờ, mọi người nên sử dụng 2 sdt momo. để nếu bị chặn
                                            thì
                                            thay thế cho khách hàng nạp tiền.
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify"
                                        data-time="Tue May 30 2023 08:36:25 GMT+0700 (Indochina Time)" data-type="notify">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Nạp thành công 1,000,000VND
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify"
                                        data-time="Sat May 20 2023 21:58:52 GMT+0700 (Indochina Time)" data-type="notify">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Nạp thành công 500,000VND
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify"
                                        data-time="Wed May 17 2023 22:41:01 GMT+0700 (Indochina Time)" data-type="notify">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Nạp thành công 500,000VND
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                    <tr class="notify-item notify-type-notify"
                                        data-time="Wed May 17 2023 22:39:26 GMT+0700 (Indochina Time)" data-type="notify">
                                        <td class="td-time"></td>
                                        <td class="content">
                                            Nạp thành công 500,000VND
                                            <span class="badge-new"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                        <div class="text-center">
                            <button class="btn btn-view-notify">Xem tất cả thông báo</button>
                        </div>

                    </div>
                </div>


                <div class="card box-shadow-1">
                    <div class="card-header menu_header">Bạn cần hỗ trợ?</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <a class="widget-support" target="_blank"
                                    href="https://www.facebook.com/nhanvien.support/">
                                    <img src="{{ asset('management/assets/images/icons/message.png') }}" alt="" />
                                    <div class="support-text">Nhân viên hỗ trợ</div>
                                </a>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <a class="widget-support" target="_blank"
                                    href="https://www.youtube.com/channel/UCLAc8u4ojo7U8GmB_l_ohDg">
                                    <img src="{{ asset('management/assets/images/icons/youtube.png') }}" alt="" />
                                    <div class="support-text">Youtube HDSD</div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card box-shadow-1">
                    <div class="card-header menu_header">Câu hỏi thường gặp (nhấn để xem)</div>
                    <div class="card-body">
                        <div class="question mt-2 mb-2" data-toggle="collapse" data-target="#question_0"
                            aria-expanded="false">
                            <i class="far fa-hand-point-right"></i> Dịch vụ mua không chạy?
                        </div>
                        <div class="collapse" id="question_0">
                            <div class="card card-body p-2 text-ln">Hãy kiểm tra tình trạng tại mục quản lý
                                uid
                                trước, sau đó báo lỗi tại fanpage support nhé.
                            </div>
                        </div>
                        <div class="question mt-2 mb-2" data-toggle="collapse" data-target="#question_1"
                            aria-expanded="false">
                            <i class="far fa-hand-point-right"></i> Tôi cần nạp tiền
                        </div>
                        <div class="collapse" id="question_1">
                            <div class="card card-body p-2 text-ln">Tại menu website, có mục nạp tiền, các
                                bạn
                                bấm và hãy đọc lưu ý tại đó và chuyển tiền đúng nội dung nha
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card box-shadow-1 pc-only">
                    <div class="card-header menu_header">Video hướng dẫn sử dụng</div>
                    <div class="card-body">
                        <div class="video-container">
                            <iframe style="width: 560px;height:315px" src="https://www.youtube.com/embed/9mW_zsdq_2U"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-6">
                <div class="card widget-user pc-only">
                    <div class="card-body">
                        <h4>Tổng Quan</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="widget__top">
                                    <div class="widget__media hidden-">
                                        <img src="{{ $user->avatar ?? asset('management/assets/images/avatar.jpg') }}" alt="image">
                                    </div>
                                    <div class="widget__content">
                                        <div class="widget__head">
                                            <a href="/profile/" class="widget__username text-success">
                                                {{ $user->username }}
                                                <img class="icon-tick"
                                                    src="{{ asset('management/assets/images/tick.svg') }}"
                                                    alt="" />
                                            </a>
                                        </div>
                                        <div class="widget__subhead">
                                            <a href="javascript:void(0)" class="text-warning">
                                                <i class="fa fa-envelope"></i>
                                                {{ $user->email }}
                                            </a>
                                            <a href="javascript:void(0)" class="text-primary">
                                                <i class="fa fa-user"></i>
                                                {{ session()->get('uGroup')[$user->ugroup] ?? 'Thành viên' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="widget-statistic">
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon text-success far fa-money-bill-alt"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">Số Dư</div>
                                                <div class="text-2 text-money">
                                                    <span>{{ number_format($user->all_money, 0, '', ',') }}₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon fas fa-money-check text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">Đã Sử Dụng</div>
                                                <div class="text-2 text-money">
                                                    <span>2,123,158₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-item">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-left">
                                                <i class="icon fas fa-money-check-alt text-danger"></i>
                                            </div>
                                            <div>
                                                <div class="text-1">Đã Nạp</div>
                                                <div class="text-2 text-money">
                                                    <span>2,500,000₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-body text-danger">
                        Đề nghị mọi người liên kết Telegram <a href="/profile" target="_self">tại đây</a>
                        <br />
                        Liên kết Telegram giúp bảo mật tài khoản, cũng như cập nhật các thông tin mới nhất
                        từ hệ
                        thống!
                    </div>
                </div>


                <div class="card mb-2 box-shadow-1">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('management/assets/images/admin.png') }}" class="feed-icon align-self-end"
                                alt="">
                            <div>
                                <a class="feed-title" href="/">
                                    Quản Trị Viên </a>
                                <div class="feed-time" data-time="Mon May 15 2023 19:39:56 GMT+0700 (Indochina Time)">
                                </div>
                            </div>
                        </div>

                        <div class="feed-content">
                            <p><span style="color:#e74c3c"><strong>Chào mừng bạn tới website số 1
                                        VN.<br>Cung cấp các giải pháp markerting digital</strong></span>
                            </p>
                        </div>


                        <div class="feed-image">
                            <img src="{{ asset('management/assets/images/feed-image.jpeg') }}" alt="feed-image" />
                        </div>

                    </div>
                </div>


                <div class="card box-shadow-1 mb-only">
                    <div class="card-header menu_header">Video hướng dẫn sử dụng</div>
                    <div class="card-body">
                        {{-- <div class="video-container">
                            <iframe style="width: 560px;height:315px" src="https://www.youtube.com/embed/9mW_zsdq_2U"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="userNotifyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table id="table-user-notifications" class="table table-bordered"></table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalZoomImage" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                    <img src="#" alt="" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
@endsection

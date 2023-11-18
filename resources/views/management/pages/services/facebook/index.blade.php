@extends('management.layouts.master')

@section('css_page')
@endsection

@php
    $user = auth()->user();
@endphp

@section('content')
    <div class="main-content">

        <div class="card widget-user">
            <div class="card-body p-b-0">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="widget__top">
                            <div class="widget__media hidden-">
                                <img src="{{ $user->avatar ?? asset('management/assets/images/avatar.jpg') }}"
                                     alt="image">
                            </div>
                            <div class="widget__content">
                                <div class="widget__head">
                                    <a href="/profile/" class="widget__username text-success">
                                        {{$user->username}}
                                        <img class="icon-tick" src="{{ asset('management/assets/images/tick.svg') }}"
                                             alt=""/>
                                    </a>
                                </div>

                                <div class="widget__subhead">
                                    <a href="javascript:void(0)" class="text-warning">
                                        <i class="fa fa-envelope"></i><span> {{$user->email}}</span>
                                    </a>
                                    <a href="javascript:void(0)" class="text-primary">
                                        <i class="fa fa-user"></i> {{ session()->get('uGroup')[$user->ugroup] ?? 'Thành viên' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="widget-statistic mb-3">
                            <div class="widget-item">
                                <div class="d-flex align-items-center">
                                    <div class="icon-left">
                                        <i class="icon text-success far fa-money-bill-alt"></i>
                                    </div>
                                    <div>
                                        <div class="text-1">Số Dư</div>
                                        <div class="text-2 text-money">
                                            <span>
                                                <div class="dropdown currency-dropdown">
                                                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <span
                                                            class="money-value">{{ number_format($user->price, 0, '', ',') }}</span>
                                                        <span class="tomato currency-unit">₫</span>
                                                    </span>
                                                </div>
                                            </span>
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
                                            <span>
                                                <span
                                                    class="money-value">{{ number_format($user->all_money - $user->price, 0, '', ',') }}</span>
                                                <span class="currency-unit tomato">₫</span>
                                            </span>
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
                                            <span>
                                                <span
                                                    class="money-value">{{ number_format($user->all_money, 0, '', ',') }}</span>
                                                <span class="currency-unit tomato">₫</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-item">
                                <div class="d-flex align-items-center">
                                    <div class="icon-left">
                                        <i class="icon fas fa-percent text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="text-1">Chiết Khấu</div>
                                        <div class="text-2 text-money">
                                            <span>
                                                20%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                               aria-selected="true">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Mua Dịch Vụ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="history"
                               aria-selected="false">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                Lịch Sử
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-15">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card form-group">

                                        <div class="card-body">
                                            <form id="formUserAction"
                                                  action="{{ route('api.service.facebook', $type) }}">
                                                @if ($type == 'like-sale' || $type == 'like-speed' || $type == 'comment-sale' || $type == 'eye-live' || $type == 'share-profile')
                                                    <div class="form-group">
                                                        <input type="hidden" name="url" id="url"/>
                                                        <label for="uid">ID hoặc link bài viết cần chạy</label>
                                                        <input type="text" class="form-control" id="uid"
                                                               name="uid"
                                                               placeholder="Hãy nhập đúng link, sai không có hoàn tiền"
                                                               autocomplete="off" required>
                                                    </div>
                                                @endif
                                                @if ($type == 'sub-vip' || $type == 'sub-quality' || $type == 'sub-sale' || $type == 'sub-speed')
                                                    <div class="form-group">
                                                        <label for="link">ID hoặc link tài khoản</label>
                                                        <input type="text" class="form-control" id="link" name="uid"
                                                               placeholder="https://www.facebook.com/username"
                                                               autocomplete="off" required>
                                                        <small class="form-text text-danger font-weight-bold">Đây là sub
                                                            trang cá nhân, nick có sẵn 2 sub trở lên mới mua
                                                            nhé.</small>
                                                    </div>
                                                @endif
                                                @if ($type == 'member-group')
                                                    <div class="form-group">
                                                        <label for="link">Link nhóm cần tăng</label>
                                                        <input type="text" class="form-control" id="link" name="idgroup"
                                                               placeholder="Nhập UID group hoặc có thể nhập link"
                                                               autocomplete="off" required>
                                                    </div>
                                                @endif
                                                @if ($type == 'view-story')
                                                    <div class="form-group">
                                                        <label for="link">Link story</label>
                                                        <input type="text" class="form-control" id="link"
                                                               name="idstory"
                                                               placeholder="Nhập link story"
                                                               autocomplete="off" required>
                                                        <small class="form-text text-danger font-weight-bold">Lưu ý:
                                                            hãy xem cách lấy link story chuẩn: <a
                                                                href="https://imgur.com/0DXPYsc">Tại đây</a></small>
                                                    </div>
                                                @endif
                                                @if ($type == 'like-page-quality' || $type == 'like-page-sale' || $type == 'like-page-speed')
                                                    <div class="form-group">
                                                        <label for="link">ID page</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                               id="link" name="idpage"
                                                               placeholder="Nhập UID page có thể nhập link"
                                                               autocomplete="off" required>
                                                    </div>
                                                @endif
                                                @if ($type == 'like-comment')
                                                    <div class="form-group">
                                                        <label for="link">ID Comment</label>
                                                        <input type="text" class="form-control" id="link"
                                                               name="idcomment"
                                                               placeholder="Nhập ID comment cần tăng"
                                                               autocomplete="off" required>
                                                        <small class="form-text text-danger font-weight-bold">Lưu ý:
                                                            Hướng dẫn lấy id comment <a
                                                                href="javascript:;"
                                                                onclick="window.open('https://imgur.com/bume4kV')">tại
                                                                đây</a></small>
                                                    </div>
                                                @endif
                                                @if ($type == 'view-video')
                                                    <div class="form-group">
                                                        <label for="link">Link video</label>
                                                        <input type="text" class="form-control" id="link"
                                                               name="link_video"
                                                               placeholder="Nhập link video cần tăng"
                                                               autocomplete="off" required>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label>Chọn server</label>
                                                    @foreach ($servers as $key => $server)
                                                        <div class="radio radio-server active">
                                                            <label><input onchange="bill()"
                                                                          data-price="{{ $server->price_stock }}"
                                                                          type="radio" name="server_order"
                                                                          value="{{ $server->server_service }}">
                                                                Server {{ $server->server_service }}
                                                                <span
                                                                    class="server-note">: {{ $server->name }}</span>
                                                                <span class="server-price">
                                                              <span
                                                                  class="money-value">{{ $server->price_stock }}</span>
                                                              <span class="currency-unit">₫</span>
                                                            </span>
                                                                @if ($server->status_server == 'on')
                                                                    <span class="server-status">Hoạt động</span>
                                                                @else
                                                                    <span class="server-status stopped">Bảo trì</span>
                                                                @endif

                                                            </label>
                                                        </div>
                                                        <div
                                                            class="server-info server-section server_{{ $server->server_service }}-visible"
                                                            style="display: none;">
                                                            {{ $server->note }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if ($type == 'comment-sale' || $type == 'comment-speed')
                                                    <div class="form-group">
                                                        <label for="list_comment">
                                                            Danh Sách Bình Luận (<span id="comment_count"
                                                                                       class="text-bold">0</span>)
                                                            <span style="color:red"> (Không hỗ trợ bài viết vi phạm pháp luật đạo đức, đòi nợ, lô đề, cờ bạc)</span>
                                                        </label>
                                                        <textarea type="number" class="form-control" name="list_comment"
                                                                  id="list_comment" rows="10" required=""
                                                                  placeholder="Mỗi bình luận 1 dòng, tối thiểu 5 bình luận"></textarea>
                                                    </div>
                                                @endif
                                                @if ($type == 'like-sale' || $type == 'like-speed' || $type == 'like-comment')
                                                    <div
                                                        class="form-group server-section">
                                                        <label class="font-bold">Chọn loại cảm xúc:</label>
                                                        <div class="fb-reaction m-t-10">

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="like" type="radio"
                                                                           required checked>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/like.png')}}"
                                                                        alt="icon like" class="img-responsive">
                                                                </label>
                                                            </div>

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="love" type="radio"
                                                                           required>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/love.png')}}"
                                                                        alt="icon love" class="img-responsive">
                                                                </label>
                                                            </div>

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="care" type="radio"
                                                                           required>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/care.png')}}"
                                                                        alt="icon care" class="img-responsive">
                                                                </label>
                                                            </div>

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="wow" type="radio"
                                                                           required>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/wow.png')}}"
                                                                        alt="icon wow" class="img-responsive">
                                                                </label>
                                                            </div>

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="haha" type="radio"
                                                                           required>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/haha.png')}}"
                                                                        alt="icon haha" class="img-responsive">
                                                                </label>
                                                            </div>

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="sad" type="radio"
                                                                           required>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/sad.png')}}"
                                                                        alt="icon sad" class="img-responsive">
                                                                </label>
                                                            </div>

                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="reaction" value="angry" type="radio"
                                                                           required>
                                                                    <img
                                                                        src="{{asset('/assets/images/fb-reaction/angry.png')}}"
                                                                        alt="icon angry" class="img-responsive">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'like-sale' || $type == 'like-speed' || $type == 'like-comment' || $type == 'comment-sale' || $type == 'sub-vip' || $type == 'sub-quanlity' || $type == 'sub-sale' || $type == 'sub-speed' || $type == 'like-page-quality' || $type == 'like-page-sale' || $type == 'like-page-speed' || $type == 'view-video' || $type == 'share-profile' || $type == 'member-group' || $type == 'view-story')
                                                    <div class="form-group">
                                                        <label for="count">Số lượng</label>
                                                        <input type="number" class="form-control" name="count"
                                                               id="count" min="50" value="50"/>
                                                    </div>
                                                @endif
                                                @if ($type == 'eye-live')
                                                    <div class="form-group">
                                                        <label for="count">
                                                            Số lượng mắt
                                                        </label>
                                                        <input type="number" class="form-control change-price"
                                                               name="count" min="20" value="50">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="minutes">Phút xem</label>
                                                        <input class="form-control change-price" id="minutes"
                                                               type="number" name="minutes" value="30" min="30"
                                                               max="600">
                                                    </div>
                                                @endif
                                                    @if ($type == 'view-video')
                                                        <div class="form-group server-section" style="">
                                                            <label>Thời gian</label>
                                                            <select class="form-control change-price" name="time">
                                                                <option value="3" selected="">Xem trong 3 giây</option>
                                                                <option value="10">Xem trong 10 giây</option>
                                                                <option value="15">Xem trong 15 giây</option>
                                                            </select>
                                                        </div>
                                                    @endif
                                                @if ($type == 'like-speed' || $type == 'like-comment')
                                                    <div
                                                        class="form-group server-section">
                                                        <label for="speed">Tốc độ</label>
                                                        <select name="speed" id="speed" class="form-control" required>
                                                            <option value="fast">Nhanh</option>
                                                            <option value="slow">Chậm</option>
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="price">Giá tiền</label>
                                                    <input type="number" class="form-control" name="price" value=""
                                                           id="price" disabled/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="total">Tổng Giá</label>
                                                    <input type="text" class="form-control" name="total"
                                                           id="total" disabled/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="note">Ghi chú</label>
                                                    <textarea class="form-control" name="note" id="note"
                                                              rows="1"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <button id="submit" class="btn btn-success text-bold"
                                                            type="submit"><i class="fas fa-cart-plus"></i> Mua
                                                    </button>
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-danger text-bold btn-view-history"
                                                            type="button" data-target="#history">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> Quản Lý ID
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="card form-group">
                                        <div class="card-header bg-primary text-white">
                                            Video hướng dẫn
                                        </div>
                                        <div class="card-body embed-container">
                                            <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/_nzJ9Y1LDbQ"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>


                                    <div class="card form-group">
                                        <div class="card-header bg-primary text-white area-note">
                                            Lưu ý:
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li><span style="color:#e74c3c">Hd <strong>lấy link</strong></span> 1 số
                                                    trường hợp mọi người hay sai.
                                                </li>
                                            </ul>

                                            <ol>
                                                <li>link <strong>avatar, b&igrave;a</strong>, <a
                                                        href="https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru">Tại
                                                        Đ&acirc;y</a></li>
                                                <li>Lấy <strong>link dạng post cho video ( link n&oacute; chứa từ
                                                        post)</strong>&nbsp;<strong>:&nbsp;<a
                                                            href="https://prnt.sc/3hbTjFNcPwQz">Tại
                                                            đ&acirc;y</a></strong>
                                                </li>
                                                <li>Link <strong>b&agrave;i chia sẻ:&nbsp;<a
                                                            href="https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG">Tại
                                                            đ&acirc;y</a>&nbsp;( b&agrave;i share b&agrave;i viết v&agrave;
                                                        share video )</strong></li>
                                            </ol>

                                            <ul>
                                                <li>1 uid c&oacute; thể mua tối đa 30-60 lần t&ugrave;y server. Like
                                                    c&oacute; thể tụt theo thời gian.
                                                </li>
                                                <li>Server 1,6,7 c&oacute; thể chia nhỏ số lượng mua nhiều lần li&ecirc;n
                                                    tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span
                                                        style="color:#e74c3c"><strong>video </strong></span>h&atilde;y
                                                    sử
                                                    dụng <span style="color:#e74c3c"><strong>link
                                                            post</strong></span>.&nbsp;<a
                                                        href="https://prnt.sc/3hbTjFNcPwQz">HD tại đ&acirc;y</a></li>
                                                <li>Nếu tăng 1 video trong <span style="color:#e74c3c">1 <strong>b&agrave;i
                                                            viết nhiều video</strong></span> vui l&ograve;ng <span
                                                        style="color:#e74c3c"><strong>kh&ocirc;ng sử dụng</strong> sv
                                                        1-6-7</span>. H&atilde;y test v&agrave; chọn sv 3-5-10
                                                </li>
                                                <li>Tất cả server đều KBH like khi tụt.</li>
                                            </ul>

                                            <p><span style="color:#e74c3c"><strong>C&aacute;c trường hợp hủy g&oacute;i v&agrave; k l&ecirc;n like</strong></span>
                                            </p>
                                            <ul>
                                                <li>b&agrave;i viết l&agrave; avatar, ảnh&nbsp;b&igrave;a h&atilde;y xem
                                                    kỹ video v&agrave; lấy link + bật n&uacute;t like.
                                                </li>
                                                <li>Nếu like <span style="color:#e74c3c">group </span>c&ocirc;ng khai
                                                    ,<span style="color:#e74c3c">video </span>v&agrave; <span
                                                        style="color:#e74c3c">livestream&nbsp;</span>h&atilde;y test sl
                                                    nhỏ
                                                    trước, Dễ bị ẩn đơn 1 số server kh&ocirc;ng chạy được.
                                                </li>
                                                <li>B&agrave;i viết sai link hoăc b&agrave;i c&oacute; tag người bị
                                                    block
                                                    t&iacute;nh năng fb sẽ ẩn.
                                                </li>
                                            </ul>

                                            <p>C&aacute;c uid khi lỗi kh&ocirc;ng c&ocirc;ng khai hoặc chưa bật n&uacute;t
                                                like sẽ ho&agrave;n tự động v&agrave; trừ 2k ph&iacute;.</p>
                                        </div>
                                    </div>
                                    <!--Show popup if exist-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="history" role="tabpanel">
                            <div class="status-filter-wrapper m-b-10">
                                <div class="label-bold m-b-5">
                                    Lọc theo trạng thái
                                </div>
                                <ul class="nav nav-pills tab-filter tab-status m-b-10" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#" data-status="all">
                                            <span class="nav-icon">
                                                <i class="fa fa-list text-success"></i>
                                            </span>
                                            <span class="nav-text">Tất cả
                                                <span class="count text-success">0</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="-1">
                                            <span class="nav-icon text-info">
                                                <i class="fa fa-play"></i>
                                            </span>
                                            <span class="nav-text">Đang xử lý
                                                <span class="count text-info">0</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="0">
                                            <span class="nav-icon text-primary">
                                                <i class="fas fa-pause-circle"></i>
                                            </span>
                                            <span class="nav-text">Đang chạy
                                                <span class="count text-primary">0</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="1">
                                            <span class="nav-icon text-success">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            <span class="nav-text">Đã xong
                                                <span class="count text-success">0</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="2">
                                            <span class="nav-icon text-warning">
                                                <i class="fa fa-times"></i>
                                            </span>
                                            <span class="nav-text">Đã hủy bởi admin
                                                <span class="count text-warning">0</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="3">
                                            <span class="nav-icon text-danger">
                                                <i class="fas fa-redo-altr"></i>
                                            </span>
                                            <span class="nav-text">Đã hoàn tiền
                                                <span class="count text-danger">0</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="10">
                                            <span class="nav-icon text-success">
                                                <i class="fa fa-question"></i>
                                            </span>
                                            <span class="nav-text"> Cần check
                                                <span class="count text-success">0</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable-logs"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script>
        function bill(isToastr = true) {
            let server_order = $('input[name=server_order]:checked');
            if (!server_order) {
                $('input[name=price]').val(0);
                $("#total").val(formatMoney(0, ' VND'));
                return;
            }
            let amount = server_order.data('price');
            $('input[name=price]').val(amount);
            @if ($type == 'eye-live')
            calculatorPrice();
            @else
            let countService = $('input[name=count]').val();
            let total = Math.round(countService * amount) ?? 0;
            $("#total").val(formatMoney(total, ' VND'));
            if (isToastr) {
                toastr.success("Cập nhật giá thành công");
            }
            @endif

        }

        $(document).ready(function () {
            @if ($type == 'eye-live')
            calculatorPrice();
            @else
            bill();
            @endif
        });

        function calculatorPrice(isToastr = true) {
            var form = $('#formUserAction');
            var count = form.find(`[name="count"]`).val();
            var minutes = form.find(`[name="minutes"]`).val();
            var selectedPrice = form.find(`input[name=price]`).val();
            var total = count * minutes * selectedPrice;
            $('#total').val(formatMoney(total, ' VNĐ'));
            if (isToastr) {
                toastr.success("Cập nhật giá thành công");
            }
        }

        $('.change-price').change(function () {
            calculatorPrice();
        });
    </script>
    @if ($type == 'comment-sale' || $type == 'comment-speed')
        <script>
            $("#list_comment").keyup(function () {
                let count = countLine($(this).val());
                $('#comment_count').html(count.toString());
                bill(false);
            });
        </script>
    @endif
@endsection

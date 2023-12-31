@extends('management.layouts.master')

@section('css_page')
@endsection

@php
    $user = auth()->user();
@endphp

@section('content')
    <div class="main-content">
        @include('management.layouts.common.userInfor')
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
                                                  action="{{ route('api.service.instagram', ['type' => $type]) }}">
                                                @if ($type == 'like-instagram')
                                                    <div class="form-group">
                                                        <label for="link_post">Link bài viết vd:
                                                            https://www.instagram.com/p/id/</label>
                                                        <input type="url" class="form-control" id="link_post"
                                                               name="link_post"
                                                               placeholder="https://www.instagram.com/p/id/"
                                                               autocomplete="off" required>
                                                    </div>
                                                @endif
                                                @if ($type == 'follow-instagram')
                                                    <div class="form-group">
                                                        <label for="username">Nhập link của tk vd:
                                                            https://www.instagram.com/username</label>
                                                        <input type="text" class="form-control" id="username"
                                                               name="username"
                                                               onpaste="igGetUsername('username');"
                                                               placeholder="https://www.instagram.com/username"
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

                                                <div class="form-group">
                                                    <label for="count">Số lượng</label>
                                                    <input type="number" class="form-control" name="count"
                                                           id="count" min="50" value="50"/>
                                                </div>
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
                                                <span class="count text-success">{{ $counts['all'] ?? 0 }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="-1">
                                            <span class="nav-icon text-info">
                                                <i class="fa fa-play"></i>
                                            </span>
                                            <span class="nav-text">Đang xử lý
                                                <span class="count text-info">{{ $counts['all'] ?? 0 }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="0">
                                            <span class="nav-icon text-primary">
                                                <i class="fas fa-pause-circle"></i>
                                            </span>
                                            <span class="nav-text">Đang chạy
                                                <span class="count text-primary">{{ $counts['start'] ?? 0 }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" data-status="1">
                                            <span class="nav-icon text-success">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            <span class="nav-text">Đã xong
                                                <span class="count text-success">{{ $counts['success'] ?? 0 }}</span>
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
                                                <span class="count text-success">{{ $counts['error'] ?? 0 }}</span>
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
        type = '{{$type}}';
        const isURL = function (str) {
            let regex =
                /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
            let pattern = new RegExp(regex);
            return pattern.test(str);
        }
    </script>
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
            let countService = $('input[name=count]').val();
            let total = Math.round(countService * amount) ?? 0;
            $("#total").val(formatMoney(total, ' VND'));
            if (isToastr) {
                toastr.success("Cập nhật giá thành công");
            }
        }

        $(document).ready(function () {
            bill();
        });
        const igGetUsername = function (elm) {
            $("#submit").prop("disabled", true);
            setTimeout(() => {
                let link = $("[name=" + elm + "]").val();
                if (!isURL(link)) {
                    $("#submit").prop("disabled", false);
                    return;
                }
                $("[name=" + elm + "]")
                    .prop("disabled", true)
                    .val("Đang xử lý");
                let username = link["match"](/instagram.com\/([a-zA-Z0-9_.-]+)/);
                if (username) {
                    username = username[1];
                    $("[name=" + elm + "]")
                        .prop("disabled", false)
                        .val(username);
                } else {
                    $("[name=" + elm + "]")
                        .prop("disabled", false)
                        .val("");
                }
                $("#submit").prop("disabled", false);
            }, 100);
        }

    </script>

    <script src="{{ asset('admin/datatable-log-group.js') }}"></script>
@endsection

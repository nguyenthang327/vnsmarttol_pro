@extends('admin.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Quản lý đơn Buff</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Quản lý đơn Buff</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="label-bold">Loại dịch vụ</label>
                    <select class="form-control" id="service_type">
                        <option value="all">Tất cả</option>

                        <optgroup label="Facebook Speed">

                            <option value="s_like">Like bài viết speed</option>

                            <option value="s_follow">Sub Trang cá nhân speed</option>

                            <option value="s_like_page">Like Sub FanPage speed</option>

                        </optgroup>

                        <optgroup label="Facebook Buff">

                            <option value="reactions">Tăng Like bài viết chậm</option>

                            <option value="follow">Sub trang cá nhân VIP</option>

                            <option value="like_page">Like Sub Fanpage VIP</option>

                            <option value="s_like_comment">Tăng Like Comment</option>

                            <option value="comment">Tăng Bình Luận</option>

                            <option value="share">Chia Sẻ Bài Viết</option>

                            <option value="buff_group">Tăng member Group</option>

                            <option value="share_group">Share Lives Group</option>

                            <option value="review">Đánh giá 5 Sao</option>

                            <option value="checkin">Check In FanPage</option>

                            <option value="fb_event">Sự kiện Facebook</option>

                        </optgroup>

                        <optgroup label="Instagram">

                            <option value="like_instagram">Like Instagram</option>

                            <option value="comment_instagram">Comment Instagram</option>

                            <option value="follow_instagram">Follow Instagram</option>

                            <option value="view_instagram">View Instagram</option>

                            <option value="live_instagram">Mắt Livestream Instagram</option>

                            <option value="vip_like_instagram">Vip Like Instagram</option>

                            <option value="vip_comment_instagram">Vip Comment Instagram</option>

                        </optgroup>

                        <optgroup label="TikTok">

                            <option value="like_tiktok">Like TikTok</option>

                            <option value="like_comment_tiktok">Like Comment TikTok</option>

                            <option value="follow_tiktok">Follow TikTok</option>

                            <option value="view_tiktok">View TikTok</option>

                            <option value="comment_tiktok">Comment TikTok</option>

                            <option value="share_tiktok">Share TikTok</option>

                            <option value="favorite_tiktok">Yêu thích Tiktok</option>

                            <option value="like_live_tiktok">Tim Livestream TikTok</option>

                            <option value="share_live_tiktok">Share Livestream TikTok</option>

                            <option value="comment_live_tiktok">Comment Livestream TikTok</option>

                            <option value="live_tiktok">Mắt LiveStream TikTok</option>

                            <option value="pk_tiktok">Điểm chiến đấu (PK) Tiktok</option>

                            <option value="vip_love_tiktok">Vip Love TikTok</option>

                            <option value="vip_view_tiktok">Vip View TikTok</option>

                        </optgroup>

                        <optgroup label="Dịch vụ khác">

                            <option value="spam_message">Auto Spam tin nhắn</option>

                            <option value="sim_otp">Thuê Sim Nhận OTP</option>

                        </optgroup>

                    </select>
                </div>

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

                <div class="m-b-10">
                    <div class="label-bold">
                        Lọc theo server
                    </div>
                    <ul class="nav nav-pills tab-filter tab-servers" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#" data-server="all">
                                <span class="nav-icon text-success">
                                    <i class="fa fa-list"></i>
                                </span>
                                <span class="nav-text">Tất cả</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_1">
                                <span class="nav-icon text-primary">
                                    <i class="fas fa-dice-one"></i>
                                </span>
                                <span class="nav-text">Server 1</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_2">
                                <span class="nav-icon text-warning">
                                    <i class="fas fa-dice-two"></i>
                                </span>
                                <span class="nav-text">Server 2</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_3">
                                <span class="nav-icon text-danger">
                                    <i class="fas fa-dice-three"></i>
                                </span>
                                <span class="nav-text">Server 3</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_4">
                                <span class="nav-icon text-success">
                                    <i class="fas fa-dice-four"></i>
                                </span>
                                <span class="nav-text">Server 4</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_5">
                                <span class="nav-icon text-primary">
                                    <i class="fas fa-dice-five"></i>
                                </span>
                                <span class="nav-text">Server 5</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_6">
                                <span class="nav-icon text-warning">
                                    <i class="fas fa-dice-six"></i>
                                </span>
                                <span class="nav-text">Server 6</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_7">
                                <span class="nav-icon text-danger">
                                    <i class="fas fa-dice"></i>
                                </span>
                                <span class="nav-text">Server 7</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_8">
                                <span class="nav-icon text-success">
                                    <i class="fas fa-sun"></i>
                                </span>
                                <span class="nav-text">Server 8</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_9">
                                <span class="nav-icon text-primary">
                                    <i class="fas fa-beer"></i>
                                </span>
                                <span class="nav-text">Server 9</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_10">
                                <span class="nav-icon text-warning">
                                    <i class="fab fa-airbnb"></i>
                                </span>
                                <span class="nav-text">Server 10</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_11">
                                <span class="nav-icon text-danger">
                                    <i class="fas fa-atom"></i>
                                </span>
                                <span class="nav-text">Server 11</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_12">
                                <span class="nav-icon text-success">
                                    <i class="fas fa-wind"></i>
                                </span>
                                <span class="nav-text">Server 12</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" data-server="server_13">
                                <span class="nav-icon text-primary">
                                    <i class="fa-solid fa-archway"></i>
                                </span>
                                <span class="nav-text">Server 13</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="datatable-ajax"></table>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalRefund" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="form-json" action="/qladmin/logs/refund">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hoàn tiền dịch vụ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" class="form-control" value="" />

                        <div class="form-group text-bold">
                            <p>Số lượng mua: <span class="text-success" id="b_count"></span></p>
                            <p>Hiện tại đã chạy: <span class="text-success" id="b_present"></span></p>
                            <p>Còn lại: <span class="text-success" id="b_left"></span></p>
                            <p>Đơn giá: <span class="text-success" id="b_price"></span></p>
                            <p>Tiền hoàn tạm tính: <span class="text-success" id="b_refund"></span></p>
                        </div>

                        <div class="form-group">
                            <label>Số tiền sẽ hoàn</label>
                            <input type="number" name="refund_amount" class="form-control" value="" />
                        </div>

                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="note" class="form-control" rows="3"></textarea>

                            <div class="sample-container">
                                <div class="sample">UID bị ẩn</div>
                                <div class="sample">UID bị sai</div>
                                <div class="sample">Chưa bật nút like</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ghi chú admin</label>
                            <textarea name="admin_note" class="form-control" rows="3"></textarea>

                            <div class="sample-container">
                                <div class="sample">Uid ẩn</div>
                                <div class="sample">Uid bị sai</div>
                                <div class="sample">Chưa bật kết bạn</div>
                                <div class="sample">Chưa bật theo dõi</div>
                                <div class="sample">Mua sai mục</div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Tiến hành hoàn tiền</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Modal-->


    <div class="modal fade" id="modalLiveLogs" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xem nhật ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="chart"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <link href="{{ asset('management/assets/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js') }}"></script>

    <script>
        var type = 'all';
      
        $(document).ready(function() {
          $("#service_type").select2({
            placeholder: "Chọn dịch vụ",
            allowClear: true
          });
        });
      </script>
@endsection

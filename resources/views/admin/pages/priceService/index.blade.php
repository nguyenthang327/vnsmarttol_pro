@extends('admin.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Danh Sách Bảng giá dịch vụ</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Danh Sách Bảng giá dịch vụ</h4>
            </div>
            <div class="card-body">
                <div class="form-group border-form-control">
                    <div class="d-flex align-items-center mt-1">
                        <div class="switch m-r-10">
                            <input type="checkbox" checked="" id="manual_sync_price">
                            <label for="manual_sync_price"></label>
                        </div>
                        <label for="manual_sync_price">
                            Chỉnh giá hàng loạt
                        </label>
                        <i class="fa-solid fa-circle-question icon-question" data-toggle="collapse"
                            data-target="#collapse_manual_sync_price"></i>
                    </div>

                    <div class="collapse" id="collapse_manual_sync_price">
                        <div class="alert alert-primary">
                            Khi sử dụng tính năng này, hệ thống sẽ đồng bộ giá của các cấp bậc theo phần trăm bạn đã
                            chọn.<br>
                            Lưu ý: Nếu bạn bật <strong>AUTO đồng bộ giá</strong>, hệ thống sẽ hẹn giờ đồng bộ lại
                            giá theo phần trăm khác, và sẽ ghi đè việc chỉnh giá thủ công ở tính năng này
                        </div>
                    </div>

                    <div class="manual_sync_price_area mt-3 collapse show" style="">
                        <p>Bạn có thể chỉnh giá hàng loạt để tiết kiệm thời gian. Bạn có 2 tuỳ chọn như sau:</p>
                        <ul class="pl-4 pb-3">
                            <li>Các mục giá Đại lý, Cộng tác viên, Thành viên: Phần trăm giá tăng thêm, giá trị từ 0
                                tới 500 (0 là không đổi, 100 là tăng thêm 100% - x2 giá)
                            </li>
                            <li>Chỉnh giá so với: Bạn có thể chỉnh giá so với giá hiện tại bạn đã cài, hoặc xoá hết
                                đi để đồng bộ lại từ đầu với giá của site chính
                            </li>
                        </ul>

                        <form id="form_sync_price" class="form-json" action="/qladmin/prices/sync" data-reload="1">
                            <div class="row">

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Thành Viên</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="percent_lv0"
                                                placeholder="Hãy nhập số" value="" min="0" max="500"
                                                required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Cộng tác viên</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="percent_lv1"
                                                placeholder="Hãy nhập số" value="" min="0" max="500"
                                                required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Đại lý</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="percent_lv2"
                                                placeholder="Hãy nhập số" value="" min="0" max="500"
                                                required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Nhà phân phối</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="percent_lv3"
                                                placeholder="Hãy nhập số" value="" min="0" max="500"
                                                required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Chỉnh giá so với</label>
                                        <select class="form-control" name="sync_with" required="">
                                            <option value="price_stock">Giá site gốc</option>
                                            <option value="current_price">Giá hiện tại</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success">Hoàn tất</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="div-separator mt-4"></div>

                <h5 class="text-primary mb-3">Cấu hình bảng giá</h5>

                <form class="form-json form-settings" action="/qladmin/prices/update_settings">
                    <div class="form-group border-form-control">
                        <div class="d-flex align-items-center mt-1">
                            <div class="switch m-r-10">
                                <input type="checkbox" id="sync_price">
                                <label for="sync_price"></label>
                            </div>
                            <label for="sync_price">
                                Chỉnh giá hàng loạt (AUTO đồng bộ giá)
                            </label>
                            <i class="fa-solid fa-circle-question icon-question" data-toggle="collapse"
                                data-target="#collapse_sync_price"></i>
                            <span class="ml-1 text-success mb-2">(Giá sẽ tự động thay đổi sau 10p)</span>
                        </div>

                        <div class="collapse show" id="collapse_sync_price">
                            <div class="alert alert-primary">
                                Nếu bạn bật <b class="text-success">Tự đồng bộ giá</b>, hệ thống sẽ thường xuyên
                                kiểm tra giá gốc của site chính,
                                sau đó đồng bộ lại giá theo các cấp thành viên. Tất cả các thao tác sửa giá thủ
                                công sẽ bị ghi đè. <br>
                                Hệ thống sẽ tự đồng bộ giá theo các giá trị bạn nhập bên dưới!
                            </div>
                        </div>

                        <div class="sync_price_area mt-3 collapse">

                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <div class="switch switch-setting m-r-10">
                                        <input type="checkbox" id="round_price">
                                        <label for="round_price"></label>
                                    </div>
                                    <label for="round_price">
                                        Tự làm tròn giá
                                    </label>
                                    <i class="fa-solid fa-circle-question icon-question" data-toggle="collapse"
                                        data-target="#collapse_round_price"></i>
                                    <span class="ml-1 text-danger mb-2">(Không nên bật)</span>
                                </div>

                                <div class="collapse" id="collapse_round_price">
                                    <div class="alert alert-primary">
                                        Hệ thống sẽ làm tròn giá các dịch vụ có giá &gt; 1đ tới số thập phân tức
                                        (6,25-&gt; 6,3) (1,23-&gt; 1,2)<br>
                                        Nếu bạn bật <b class="text-success">Tự làm tròn giá</b>, hệ thống sẽ làm
                                        tròn toàn bộ giá &gt; 1đ thành số tự nhiên (6,25-&gt; 7) (1,23-&gt; 2)<br>
                                        Lưu ý: Các dịch vụ có giá quá nhỏ (&lt; 1₫) sẽ không làm tròn để tránh tình
                                        trạng giá quá cao với các dịch vụ giá rẻ như view video...
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 text-success text-bold" style="font-size: 15px">Phần trăm giá thay
                                đổi
                            </div>

                            <div class="row">

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Thành Viên</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" min="0" max="500"
                                                name="sync_lv0" value="30" placeholder="Hãy nhập số">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Cộng tác viên</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" min="0" max="500"
                                                name="sync_lv1" value="20" placeholder="Hãy nhập số">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Đại lý</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" min="0" max="500"
                                                name="sync_lv2" value="10" placeholder="Hãy nhập số">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Nhà phân phối</label>

                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" min="0" max="500"
                                                name="sync_lv3" value="" placeholder="Hãy nhập số">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-success">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <div class="switch switch-setting m-r-10">
                                <input type="checkbox" id="show_prices" checked="">
                                <label for="show_prices"></label>
                            </div>
                            <label for="show_prices">Hiển thị bảng giá</label>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <div class="switch switch-setting m-r-10">
                                <input type="checkbox" id="check_price" checked="">
                                <label for="check_price"></label>
                            </div>
                            <label for="check_price">
                                Không bán lỗ
                            </label>
                            <i class="fa-solid fa-circle-question icon-question" data-toggle="collapse"
                                data-target="#collapse_check_price"></i>
                        </div>

                        <div class="collapse" id="collapse_check_price">
                            <div class="alert alert-primary">
                                Khi bật tính năng này, nếu giá dịch vụ các bạn để thấp hơn giá gốc,
                                khi mua sẽ báo lỗi và không thể mua <br>
                                (Cài đặt này cần tối đa 30s để có hiệu lực từ khi cài đặt)
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <div class="switch switch-setting m-r-10">
                                <input type="checkbox" id="enable_sim" checked="">
                                <label for="enable_sim"></label>
                            </div>
                            <label for="enable_sim">Hiển thị Dịch Vụ Thuê Sim</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-success">Hoàn tất</button>
                    </div>
                </form>

                <div class="div-separator mt-4"></div>

                <h5 class="table-toggle collapsed" data-toggle="collapse" data-target="#collapse_0"
                    aria-expanded="false">Buff Facebook</h5>

                <div class="collapse" id="collapse_0" style="">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="white-space: nowrap;">Hành Động</th>
                                    <th>Tên Dịch Vụ</th>

                                    <th>Thành Viên</th>

                                    <th>Cộng tác viên</th>

                                    <th>Đại lý</th>

                                    <th>Nhà phân phối</th>

                                    <th>Giá gốc (Đại lý)</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                    <th>Trạng thái</th>
                                    <th>Hiển thị</th>
                                    <th>User Hoàn tiền</th>
                                </tr>
                            </thead>
                            <tbody>






                                <tr class="tr-203764">
                                    <td>
                                        <button class="btn btn-icon btn-edit" title="" data-id="203764"
                                            data-original-title="Sửa">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </td>
                                    <td class="text-bold text-success display_name">
                                        like bình luận

                                    </td>


                                    <td>
                                        <span class="badge badge-success price_lv0">62.4</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-primary price_lv1">57.6</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning price_lv2">52.8</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-info price_lv3">50.4</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-danger">48 VND</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">50</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">100,000</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-active">Hoạt động</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-1 visible">Có</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-0">Không</span>
                                    </td>
                                </tr>






                                <tr class="tr-203903">
                                    <td>
                                        <button class="btn btn-icon btn-edit" title="" data-id="203903"
                                            data-original-title="Sửa">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </td>
                                    <td class="text-bold text-success display_name">
                                        Like/cảm xúc comment V2

                                    </td>


                                    <td>
                                        <span class="badge badge-success price_lv0">27.3</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-primary price_lv1">25.2</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning price_lv2">23.1</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-info price_lv3">22.1</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-danger">21 VND</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">20</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">1,000</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-active">Hoạt động</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-1 visible">Có</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-0">Không</span>
                                    </td>
                                </tr>







                                <tr class="t-separator">
                                    <td colspan="14">
                                        <div>----------</div>
                                    </td>
                                </tr>


                                <tr class="tr-203740">
                                    <td>
                                        <button class="btn btn-icon btn-edit" title="" data-id="203740"
                                            data-original-title="Sửa">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </td>
                                    <td class="text-bold text-success display_name">
                                        Like bài viết v1

                                    </td>


                                    <td>
                                        <span class="badge badge-success price_lv0">75.4</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-primary price_lv1">69.6</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning price_lv2">63.8</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-info price_lv3">60.9</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-danger">58 VND</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">20</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">5,000</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-active">Hoạt động</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-1 visible">Có</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-0">Không</span>
                                    </td>
                                </tr>






                                <tr class="tr-203779">
                                    <td>
                                        <button class="btn btn-icon btn-edit" title="" data-id="203779"
                                            data-original-title="Sửa">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </td>
                                    <td class="text-bold text-success display_name">
                                        care bài viết v1

                                    </td>


                                    <td>
                                        <span class="badge badge-success price_lv0">122.2</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-primary price_lv1">112.8</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning price_lv2">103.4</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-info price_lv3">98.7</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-danger">94 VND</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">50</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">5,000</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-active">Hoạt động</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-1 visible">Có</span>
                                    </td>
                                    <td>
                                        <span class="badge b-status-0">Không</span>
                                    </td>
                                </tr>






                            </tbody>

                        </table>
                    </div>

                    <div class="line-divider"></div>
                </div>


                <h5 class="table-toggle" data-toggle="collapse" data-target="#collapse_17">Dịch vụ khác</h5>


                <div class="collapse" id="collapse_17">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="white-space: nowrap;">Hành Động</th>
                                    <th>Tên Dịch Vụ</th>

                                    <th>Thành Viên</th>

                                    <th>Cộng tác viên</th>

                                    <th>Đại lý</th>

                                    <th>Nhà phân phối</th>

                                    <th>Giá gốc (Đại lý)</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                    <th>Trạng thái</th>
                                    <th>Hiển thị</th>
                                    <th>User Hoàn tiền</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>

                        </table>
                    </div>

                    <div class="line-divider"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js_page')
@endsection

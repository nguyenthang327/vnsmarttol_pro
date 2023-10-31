@extends('admin.layouts.master')

@section('css_page')
@endsection

{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="mdi mdi-home-outline"></i>Trang Chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Thông Tin Tài Khoản</li>
@endsection --}}

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Trang Quản Trị</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="widget-statistic">
                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon text-success far fa-money-bill-alt"></i>
                            </div>
                            <div>
                                <div class="text-1">
                                    Số dư web mẹ
                                    <i class="fas fa-sync ml-2 c-pointer text-primary" id="icon_sync_balance"
                                        data-toggle="tooltip" title="Đồng bộ ngay"></i>
                                </div>
                                <div class="text-2 text-money">
                                    <span id="balance_value">10,764₫</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon far text-primary far fa-thumbs-up"></i>
                            </div>
                            <div>
                                <div class="text-1">
                                    Buff đang chạy
                                </div>
                                <div class="text-2 text-money">
                                    <span>0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon far text-warning fas fa-money-bill-alt"></i>
                            </div>
                            <div>
                                <div class="text-1">
                                    Tổng nạp
                                </div>
                                <div class="text-2 text-money">
                                    <span>2,000,000<span class="tomato">₫</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon far text-danger fas fa-wallet"></i>
                            </div>
                            <div>
                                <div class="text-1">
                                    Tổng tiền còn lại
                                </div>
                                <div class="text-2 text-money">
                                    <span>376,842<span class="tomato">₫</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thống kê nạp tiền</h4>
            </div>
            <div class="card-body">
                <div class="form-inline mb-4">
                    <div class="form-group">
                        <label>Từ</label>
                        <input class="form-control" type="text" id="time_from" />
                    </div>

                    <div class="form-group">
                        <label>Đến</label>
                        <input class="form-control" type="text" id="time_to" />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" id="btn_view_payments">Xem</button>
                    </div>
                </div>

                <div class="chart-area" style="min-height: 400px">
                    <div id="chart"></div>
                </div>

                <hr />

                <h5 class="text-success">Thống kê theo cấp bậc</h5>

                <div id="payment_by_level"></div>

                <hr />

                <div class="mt-1 mb-3">
                    <div class="label-bold mb-1">
                        Lọc theo Hình thức
                    </div>
                    <ul class="nav nav-pills tab-filter tab-payment-mode" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-success" data-toggle="tab" href="#" data-mode="all">
                                <span class="nav-icon">
                                    <i class="fa fa-list"></i>
                                </span>
                                <span class="nav-text">Tất cả</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" data-toggle="tab" href="#" data-mode="manual">
                                <span class="nav-icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </span>
                                <span class="nav-text">Thủ công</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" data-toggle="tab" href="#" data-mode="auto">
                                <span class="nav-icon">
                                    <i class="fas fa-robot"></i>
                                </span>
                                <span class="nav-text">Tự động</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="datatable-payments">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Username</th>
                                <th>Số tiền</th>
                                <th>Thời gian</th>
                                <th>Ghi chú</th>
                                <th>Hình thức</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thống kê dòng tiền theo tháng</h4>
            </div>
            <div class="card-body">
                <div class="form-inline mb-4">
                    <div class="form-group">
                        <label>Tháng</label>
                        <input class="form-control time-input" type="text" id="payment_time" />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" id="btn_view_time_payment">Xem</button>
                    </div>
                </div>

                <hr />

                <div id="payment_month_summary" style="display: none">
                    <h5>Tổng nạp tháng: <span class="text-tomato" id="payment_month_total"></span></h5>
                </div>

                <div class="chart-area">
                    <div id="payment_chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

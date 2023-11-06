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
                    <a class="breadcrumb-item" href="javascript:void(0)">Danh Sách Thanh Toán</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Danh Sách Thanh Toán</h4>
            </div>
            <div class="card-body">
                <div class="mt-1 mb-3">
                    <div class="label-bold mb-1">
                        Lọc theo Hình thức
                    </div>
                    <ul class="nav nav-pills tab-filter tab-payment-mode" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-success" data-toggle="tab"
                               href="#" data-mode="all">
                                  <span class="nav-icon">
                                    <i class="fa fa-list"></i>
                                  </span>
                                <span class="nav-text">Tất cả</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" data-toggle="tab"
                               href="#" data-mode="manual">
                                  <span class="nav-icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                  </span>
                                <span class="nav-text">Thủ công</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" data-toggle="tab"
                               href="#" data-mode="auto">
                                <span class="nav-icon">
                                <i class="fas fa-robot"></i>
                                </span>
                                <span class="nav-text">Tự động</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mt-1 mb-3">
                    <div class="label-bold">
                        Lọc theo Ngân hàng
                    </div>
                    <ul class="nav nav-pills tab-filter tab-payment-source" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-success" data-toggle="tab"
                               href="#" data-source="all">
                                  <span class="nav-icon">
                                    <i class="fa fa-list"></i>
                                  </span>
                                <span class="nav-text">Tất cả</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-success" data-toggle="tab"
                               href="#" data-source="mb">
                                <span class="nav-icon">
                                  <i class="fa fa-money"></i>
                                </span>
                                <span class="nav-text">MbBank</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success" data-toggle="tab"
                               href="#" data-source="card">
                                <span class="nav-icon">
                                  <i class="fa fa-money"></i>
                                </span>
                                <span class="nav-text">Thẻ cào</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="table-responsive">
                    <div id="datatable-ajax_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable no-footer" id="datatable-ajax">
                                    <thead>
                                    <tr role="row">
                                        <th>STT</th>
                                        <th>Tài khoản</th>
                                        <th>Số tiền thay đổi</th>
                                        <th>Ghi chú</th>
                                        <th>Hình thức</th>
                                        <th>Thời gian</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success mt-2" data-toggle="modal" data-target="#modalDuplicatePayment">Tìm thanh
                    toán trùng lặp
                </button>
                <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalRepeatedPayment">Tìm thanh
                    toán liên tiếp
                </button>

            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalDuplicatePayment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thanh toán trùng lặp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary">
                        Thanh toán trùng lặp là những thanh toán trong ngày mà bởi cùng 1 người dùng, với số tiền giống
                        nhau
                    </div>

                    <div class="form-inline form-group">
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input class="form-control input-date-center payment_date" id="payment_date">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-search-duplicate">Tìm kiếm</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table_list_duplicate" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->

    <!--begin::Modal-->
    <div class="modal fade" id="modalRepeatedPayment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thanh toán liên tiếp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary">
                        Thanh toán liên tiếp là những thanh toán mà bởi cùng 1 người dùng, với số tiền giống nhau trong
                        vòng 1 phút
                    </div>

                    <div class="form-inline form-group">
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input class="form-control input-date-center payment_date" id="repeated_payment_date">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-search-repeated">Tìm kiếm</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table_list_repeated" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endsection

@section('js_page')
    <script src="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/datatable-payment.js') }}"></script>
@endsection

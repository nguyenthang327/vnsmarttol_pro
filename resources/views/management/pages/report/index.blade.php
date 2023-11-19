@extends('management.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">

        <div class="card">
            <div class="card-body">
                <h4>
                    Nhật Ký Hoạt Động
                     <button class="btn btn-success btn-sm btn-export-report btn-bold ml-3" data-toggle="modal"
                        data-target="#modalExport">
                        <i class="fa-solid fa-download"></i>
                        Xuất dữ liệu (CSV)
                    </button>
                </h4>
                <div class="m-t-10">
                    <div>
                        <ul class="nav nav-pills tab-filter tab-filter-report" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#" data-filter="all">
                                    <span class="nav-icon text-success">
                                        <i class="fas fa-cart-plus"></i>
                                    </span>
                                    <span class="nav-text text-success">Nhật ký hoạt động</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#" data-filter="payment">
                                    <span class="nav-icon text-warning">
                                        <i class="fa-solid fa-money-bill-trend-up"></i>
                                    </span>
                                    <span class="nav-text text-warning">Lịch sử cộng tiền</span>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#" data-filter="refund">
                                    <span class="nav-icon text-primary">
                                        <i class="fas fa-redo-alt"></i>
                                    </span>
                                    <span class="nav-text text-primary">Lịch sử hoàn tiền</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable-report"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalExport" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header flex-center-between">
                     <div>
                        <h4 class="modal-title">Xuất dữ liệu (CSV)</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Chọn thứ tự định dạng</label>

                        <div class="field-select-container">
                            <div class="row">


                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_id" value="id">
                                        <label for="select_id">ID</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_uid" value="uid">
                                        <label for="select_uid">UID</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_msg" value="msg">
                                        <label for="select_msg">Nội dung</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_count" value="count">
                                        <label for="select_count">Số lượng</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_price" value="price">
                                        <label for="select_price">Giá</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_price_current" value="price_current">
                                        <label for="select_price_current">Tiền trước</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_price_left" value="price_left">
                                        <label for="select_price_left">Tiền sau</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_math" value="math">
                                        <label for="select_math">Tăng/Giảm</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_type" value="type">
                                        <label for="select_type">Loại</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_server" value="server">
                                        <label for="select_server">Server</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_time" value="time">
                                        <label for="select_time">Thời gian</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_original" value="original">
                                        <label for="select_original">Gốc</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_present" value="present">
                                        <label for="select_present">Đã tăng</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_note" value="note">
                                        <label for="select_note">Ghi chú</label>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-4 col-lg-3">
                                    <div class="checkbox custom-checkbox-2">
                                        <input type="checkbox" id="select_status" value="status">
                                        <label for="select_status">Trạng thái</label>
                                    </div>
                                </div>


                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label>Định dạng nhập đã chọn</label>
                                        <input readonly="readonly" class="form-control" id="selected_field"
                                            placeholder="Chọn các mục ở trên theo thứ tự bạn mong muốn">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Thời gian xuất</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control text-bold" id="date_range">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger m-r-5" data-dismiss="modal">THOÁT</button>
                    <button class="btn btn-success m-r-5" id="btn_export">
                        <i class="fa-solid fa-download"></i> XUẤT
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js_page')
    <script>
        var type = "all";
        var fieldMap = JSON.parse('{"id":"ID","uid":"UID","msg":"Nội dung","count":"Số lượng","price":"Giá","price_current":"Tiền trước","price_left":"Tiền sau","math":"Tăng/Giảm","type":"Loại","server":"Server","time":"Thời gian","original":"Gốc","present":"Đã tăng","note":"Ghi chú","status":"Trạng thái"}')
    </script>
    <script src="{{ asset('admin/datatable-logs.js') }}"></script>
    <script src="{{ asset('admin/datatable-report.js') }}"></script>
@endsection

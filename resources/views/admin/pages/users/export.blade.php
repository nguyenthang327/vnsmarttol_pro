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
                    <a class="breadcrumb-item" href="javascript:void(0)">Get info member</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Get info member</h4>
            </div>
            <div class="card-body">
                <div class="form-inline mb-4">
                    <div class="form-group">
                        <label>Từ</label>
                        <input class="form-control date-time" type="text" id="time_from"/>
                    </div>

                    <div class="form-group">
                        <label>Đến</label>
                        <input class="form-control date-time" type="text" id="time_to"/>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" id="btn_view">Xem</button>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-hover" id="table_users">
                        <thead><tr></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>

                <hr />

                <div>
                    <div class="area-select-field">
                        <div class="title">Chọn thứ tự định dạng</div>

                        <div class="area-select-container"></div>

                        <div class="form-group w-100 mt-4">
                            <label>Định dạng đã chọn</label>
                            <input class="form-control" readonly id="selected_field" />
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" id="btn_export">Xuất CSV</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script src="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/export_user.js')}}"></script>
@endsection

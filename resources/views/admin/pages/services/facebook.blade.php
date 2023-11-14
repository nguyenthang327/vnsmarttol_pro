@extends('admin.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Dịch vụ facebook</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thêm máy chủ Facebook</h4>
            </div>
            <div class="card-body">
                <form id="formAdminAction" class="form-json" method="POST" action="">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="service">Máy chủ của dịch vụ</label>
                            <select class="form-control" id="service" name="service" autocomplete="off" required>
                                <option></option>
                                <option value="subgiare">subgiare.vn</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="server">Server</label>
                            <select class="form-control" id="server" name="server" autocomplete="off" required>
                                <option></option>
                                <option value="1">
                                    server 1
                                </option>
                                <option value="2">
                                    server 2
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá dịch vụ</label>
                            <input type="number" min="0" class="form-control" name="amount" value="0"
                                autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label for="server_noti">Thông báo máy chủ</label>
                            <input type="text" class="form-control" name="server_noti" autocomplete="off" />
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Thêm dịch vụ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Danh sách dịch vụ subgiare</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="datatable-ajax"></table>
               </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <link href="{{ asset('management/assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#service").select2({
                placeholder: "Chọn dịch vụ",
                allowClear: !0
            });

            $("#server").select2({
                placeholder: "Chọn server",
                allowClear: !0
            });
        });
    </script>

    <script src="{{ asset('admin/pages/service-manage.js')}}"></script>
@endsection

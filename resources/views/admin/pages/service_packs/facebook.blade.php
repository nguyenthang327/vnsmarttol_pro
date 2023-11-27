@extends('admin.layouts.master')

@section('css_page')
    <link href="{{ asset('management/assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
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
                <form class="form-add-service form-json" data-type="facebook" method="POST"
                      action="{{ route('admin.service.store', ['type' => 'facebook']) }}"
                      data-table="Services"
                >
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="api_service">API của dịch vụ</label>
                            <select class="form-control" id="api_service" name="api_service" autocomplete="off"
                                    required>
                                <option></option>
                                <option value="subgiare">subgiare.vn</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="server_service">Máy chủ dịch vụ</label>
                            <select class="form-control" id="server_service" name="server_service" autocomplete="off" required>
                                <option></option>
                                @for ($i = 1; $i <= 20; $i++)
                                    <option value="sv{{ $i }}">Server: {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div id="show_service"></div>
                        <div class="form-group">
                            <label for="name">Tên dịch vụ</label>
                            <input id="name" type="text" class="form-control" name="name" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="price_stock">Giá dịch vụ</label>
                            <input type="number" min="0" class="form-control" name="price_stock" value="0"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="min_order">Min order</label>
                            <input type="number" min="0" class="form-control" name="min_order" value="0"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="max_order">Max order</label>
                            <input type="number" min="0" class="form-control" name="max_order" value="0"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Thông báo máy chủ</label>
                            <input type="text" class="form-control" id="note" name="note" autocomplete="off"/>
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
                <h4 class="card-title text-white">Danh sách dịch vụ FACEBOOK - SUBGIARE</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-services_wrapper"
                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable no-footer"
                                       id="datatable-services" role="grid">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Loại</th>
                                        <th>Máy chủ</th>
                                        <th>Giá</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#code_server").select2({
                placeholder: "Chọn loại dịch vụ",
                allowClear: !0
            });

            $("#api_service").select2({
                placeholder: "Chọn API của dịch vụ",
                allowClear: !0
            });

            $("#server_service").select2({
                placeholder: "Chọn máy chủ dịch vụ",
                allowClear: !0
            });

            ckEditor('note');
        });
    </script>
    <script src="{{ asset('admin/pages/service-manage.js')}}"></script>
@endsection

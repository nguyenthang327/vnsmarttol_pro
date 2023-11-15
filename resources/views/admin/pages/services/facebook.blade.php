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
                <form id="formAdminAction" class="form-json" method="POST" action="">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="api_server">API của dịch vụ</label>
                            <select class="form-control" id="api_server" name="api_server" autocomplete="off"
                                    required>
                                <option></option>
                                <option value="subgiare">subgiare.vn</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="server_service">Máy chủ dịch vụ</label>
                            <select class="form-control" id="server_service" name="server_service" autocomplete="off" required>
                                <option></option>
                                @for ($i = 1; $i <= 30; $i++)
                                    <option value="sv{{ $i }}">Server: {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div id="show_service"></div>
                        <div class="form-group">
                            <label for="price_stock">Giá dịch vụ</label>
                            <input type="number" min="0" class="form-control" name="price_stock" value="0"
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
                <h4 class="card-title text-white">Danh sách dịch vụ subgiare</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-services_wrapper"
                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable no-footer"
                                       id="datatable-services-subgiare" role="grid">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
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
            $("#type_service").select2({
                placeholder: "Chọn loại dịch vụ",
                allowClear: !0
            });

            $("#api_server").select2({
                placeholder: "Chọn API của dịch vụ",
                allowClear: !0
            });

            $("#server_service").select2({
                placeholder: "Chọn máy chủ dịch vụ",
                allowClear: !0
            });

            ckEditor('note');
        });

        $(document).ready(function () {
            $('#api_server').change(function () {
                let api_server = $(this).val();
                if (api_server === 'select') {
                    $('#show_service').html('');
                }
                if (api_server === 'subgiare') {
                    $('#show_service').html(`
                    <div class="form-group">
                        <label class="form-label" for="type_service">Loại dịch vụ</label>
                        <div class="form-control-wrap">
                            <select name="type_service" id="type_service" class="form-control">
                                <option>Chọn loại dịch vụ</option>
                                <option value="like-post-sale">Like bài viết (sale)</option>
                                <option value="like-post-speed">Like bài viết (speed)</option>
                                <option value="like-comment">Like bình luận</option>
                                <option value="comment-sale">Bình luận (sale)</option>
                                <option value="sub-vip">Sub/follow (vip)</option>
                                <option value="sub-quality">Sub/follow (quality)</option>
                                <option value="sub-sale">Sub/follow (sale)</option>
                                <option value="sub-speed">Sub/follow (speed)</option>
                                <option value="like-page-quality">Like page (quality)</option>
                                <option value="like-page-sale">Like page (sale)</option>
                                <option value="like-page-speed">Like page (speed)</option>
                                <option value="mat-live">Mắt live</option>
                                <option value="view-video">View video</option>
                                <option value="share-profile">Share (profile)</option>
                                <option value="member-group">Thành viên nhóm</option>
                                <option value="view-story">View story</option>
                                <option value="vip-like">Vip like (profile)</option>
                            </select>
                        </div>
                      </div>
                    `);
                }
            });
        });

        dtb_Notification = $('#datatable-services-subgiare').DataTable({
            responsive: false,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: xAjax(baseUrl + '/ajax/services/facebook'),
            order: [[0, "desc"]],
            columns: [
                definedColumns.stt,
                definedColumns.notify_image,
                definedColumns.notify_content,
                makeColumn('Hiển thị', 'is_visible', (is_visible, t, row) => {
                    return `
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input custom-sw" data-key="is_visible" data-id=${row.id}
                   ${is_visible ? 'checked' : ''} id="is_visible_sw_${row.id}">
            <label class="custom-control-label" for="is_visible_sw_${row.id}"></label>
          </div>
          `
                }),
                makeColumn('Ghim', 'is_pin', (is_pin, t, row) => {
                    return `
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input custom-sw" data-key="is_pin" data-id=${row.id}
                   ${is_pin ? 'checked' : ''} id="is_pin_sw_${row.id}">
            <label class="custom-control-label" for="is_pin_sw_${row.id}"></label>
          </div>
          `
                }),
                definedColumns.created_at,

                definedColumns.action(function (data, type, notify) {
                    return components.btn_edit(notify, 'btn-edit-notify') + components.btn_delete(notify, 'btn-delete-notify');
                }),
            ],
        });
    </script>
    <script src="{{ asset('admin/pages/service-manage.js')}}"></script>
@endsection

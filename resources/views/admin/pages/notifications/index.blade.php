@extends('admin.layouts.master')

@section('css_page')
    <link rel="stylesheet" href="{{ asset('management/assets/plugins/select2/select2.min.css') }}"/>
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i
                            class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Thông báo</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"
                           href="#tab_1"
                           role="tab" aria-controls="tab_1" aria-selected="true">
                            <i class="fas fa-bullhorn"></i>
                            Thông báo Web
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_4"
                           role="tab" aria-selected="false">
                            <i class="fas fa-user-tag" aria-hidden="true"></i>
                            Thông báo người dùng mới
                        </a>
                    </li>
                </ul>

                <div class="tab-content m-t-15">
                    <div class="tab-pane fade active show" id="tab_1" role="tabpanel">
                        <div class="form-group mb-0">
                            <div class="d-flex align-items-center">
                                <div class="switch m-r-10">
                                    <input type="checkbox" id="show_last_notify" name="show_last_notify" value="{{ $setting->show_last_notify ?? '' }}" {{$setting->show_last_notify == 1 ? 'checked' : ''}}>
                                    <label for="show_last_notify"></label>
                                </div>
                                <label>Hiển thị popup thông báo mới nhất</label>
                            </div>
                            <div>Nếu bạn bật tuỳ chọn này, khi người dùng truy cập trang chủ thì thông báo mới nhất tại
                                trang này sẽ hiện ra
                            </div>
                            <hr>
                        </div>

                        <!--begin::Form-->
                        <form class="form-json" method="POST" action="{{ route('admin.notification.index') }}"
                              data-table="Notification">
                            <div class="form-group">
                                <label>Link Ảnh (tuỳ chọn)</label>
                                <input class="form-control" name="image" type="url" maxlength="240">

                                <div class="alert alert-warning mt-2">
                                    Website hỗ trợ get link ảnh: <a href="{{ config('constants.domain_upload_image') }}"
                                                                    target="_blank">Tại Đây</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_pin">Ghim</label>
                                <select id="is_pin" name="is_pin" class="form-control">
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="is_visible">Hiển thị</label>
                                <select id="is_visible" name="is_visible" class="form-control">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nội dung thông báo</label>
                                <div class="alert alert-primary">
                                    <i class="fa-regular fa-circle-question mr-1"></i>
                                    Nếu bạn muốn chèn iframe (video youtube...) căn giữa, hãy chọn chế độ "Mã HTML" và
                                    bọc
                                    nội dung
                                    iframe trong thẻ &lt;center&gt;&lt;Nội dung ở đây&gt;&lt;/center&gt;<br>
                                    Ví dụ <span class="text-success">&lt;center&gt;&lt;iframe width=".." height=".." ...&gt;&lt;/iframe&gt;&lt;/center&gt;</span>
                                </div>
                                <textarea class="form-control" name="content" id="notify_content" rows="5"
                                          style="visibility: hidden; display: none;"></textarea>
                            </div>

                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Hoàn tất</button>
                            </div>
                        </form>
                        <!--end::Form-->

                        <hr>

                        <div class="table-responsive">
                            <div id="datatable-notifications_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable no-footer"
                                               id="datatable-notifications" role="grid"
                                               aria-describedby="datatable-notifications_info">
                                            <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình ảnh</th>
                                                <th>Nội dung</th>
                                                <th>Hiển thị</th>
                                                <th>Ghim</th>
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
                    <div class="tab-pane" id="tab_4" role="tabpanel">
                        <form class="form-json" method="POST"
                              action="{{ route('admin.notification.notify_new_user') }}"
                              data-table="UserNotification">
                            <div class="form-group">
                                <label>Nội dung thông báo</label>
                                <textarea class="form-control" name="notify_new_user" rows="5">
                                    {{ $setting->notify_new_user ?? '' }}
                                </textarea>
                            </div>
                            <div class="alert alert-primary">
                                Khi người dùng đăng ký tài khoản xong, hệ thống sẽ tạo một thông báo popup cho người
                                dùng với nội dung bạn nhập ở trên
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success text-bold">Hoàn tất</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="modalEditNotify" tabindex="-1" role="dialog" aria-hidden="true"
         style="opacity: 1; overflow: visible;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form class="form-json" method="POST" action="{{ route('admin.notification.index') }}"
                      data-table="Notification">
                    <input type="hidden" name="id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Link Ảnh (tuỳ chọn)</label>
                            <input class="form-control" name="image" type="url" maxlength="240">
                            <div class="alert alert-warning mt-2">
                                Website hỗ trợ get link ảnh: <a href="{{ config('constants.domain_upload_image') }}" target="_blank">Tại Đây</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ghim</label>
                            <select name="is_pin" class="form-control">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="is_visible" class="form-control">
                                <option value="1">Có</option>
                                <option value="0">Không</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nội dung thông báo</label>
                            <textarea class="form-control" name="content" id="notify_content_update" rows="5"
                                      style="visibility: hidden; display: none;"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Hoàn tất</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->
    <!-- Content Wrapper END -->
@endsection

@section('js_page')
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js') }}"></script>
    <script>
        var dtb_Notification, dtb_UserNotification;
        var nMap = {
            notify_popup: 'Thông báo (Có hiện nổi bật)',
            notify: 'Thông báo (Không hiện nổi bật)',
        }
        $(document).ready(function () {
            $('#show_last_notify').change(function () {
                $.post(`${baseUrl}/notifications/show_last_notify`, {show_last_notify: $(this).is(':checked') ? 1 : 0}).done(function () {
                    toastr.success('Thao tác thành công!');
                })
            })

            // Prepare select content
            let selectHtml = '';
            Object.keys(nMap).forEach(item => {
                selectHtml += `<option value="${item}">${nMap[item]}</option>`;
            });
            $('select[name="type"]').html(selectHtml);

            $(".custom-select2").select2({
                placeholder: "Chọn tài khoản",
                allowClear: true
            }).on('change', function () {
                $('#error_user_0')[parseInt($(this).val()) === 0 ? 'show' : 'hide']();
            });

            dtb_Notification = $('#datatable-notifications').DataTable({
                responsive: false,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: xAjax(baseUrl + '/ajax/notifications'),
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

            ckEditor('notify_content');
            ckEditor('notify_content_update');
        });

        $(document).on("click", ".btn-edit-notify", function () {
            var id = $(this).data('id');
            callAjaxPost(baseUrl + `/notifications/show`, {id}).then(function (data) {
                var notify = data.msg;
                ['id', 'image', 'is_pin'].forEach(function (field) {
                    $('#modalEditNotify').find(`[name=${field}]`).val(notify[field]);
                });

                updateSingleEditor('notify_content_update', notify.content);
                $('#modalEditNotify').modal('show');
            })
        });

        $(document).on("click", ".btn-delete-notify", async function () {
            if (!await swalConfirm()) return;

            var id = $(this).data('id');
            callAjaxPost(`${baseUrl}/notifications/delete`, {id}).then(function () {
                toastr.success('Đã xoá thông báo!');
                dtb_Notification.ajax.reload(null, false);
            })
        });

        $(document).on("change", ".custom-sw", function () {
            var payload = {id: $(this).data('id')};
            payload[$(this).data('key')] = $(this).is(":checked") ? 1 : 0

            callAjaxPost(baseUrl + '/notifications/toggle', payload).then(function (data) {
                if (!data.status) return toastr.error(data.msg);
                toastr.success(data.msg);
            })
        });
    </script>
@endsection

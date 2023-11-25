"use strict";

jQuery(document).ready(function () {
    var dtb_Services;
    $('#api_service').change(function () {
        let api_service = $(this).val();
        if (api_service === 'select') {
            $('#show_service').html('');
        }
        if (api_service === 'subgiare') {
            $('#show_service').html(`
                    <div class="form-group">
                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                        <div class="form-control-wrap">
                            <select name="code_server" id="code_server" class="form-control">
                                <option>Chọn loại dịch vụ</option>
                                <option value="like-post-sale">Like bài viết (sale)</option>
                                <option value="like-post-speed">Like bài viết (speed)</option>
                                <option value="like-comment">Like bình luận</option>
                                <option value="comment-sale">Bình luận (sale)</option>
                                <option value="comment-speed">Bình luận (speed)</option>
                                <option value="sub-vip">Sub/follow (vip)</option>
                                <option value="sub-sale">Sub/follow (sale)</option>
                                <option value="like-page-speed">Like page (speed)</option>
                                <option value="like-page-sale">Like page (sale)</option>
                                <option value="eye-live">Mắt live</option>
                                <option value="view-video">View video</option>
                                <option value="share-profile">Share (profile)</option>
                                <option value="member-group">Thành viên nhóm</option>
                                <option value="view-story">View story</option>
                            </select>
                        </div>
                      </div>
                    `);
        }
    });

    dtb_Services = $('#datatable-services-subgiare').DataTable({
        responsive: false,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: xAjax(baseUrl + '/ajax/services/facebook'),
        order: [[0, "desc"]],
        columns: [
            definedColumns.stt,
            makeColumn('Tên', 'name'),
            makeColumn('Loại', 'code_server'),
            makeColumn('Máy chủ', 'server_service'),
            makeColumn('Giá', 'price_stock'),
            makeColumn('Trạng thái', 'status_server', 'status_server'),
            definedColumns.created_at,
            definedColumns.action(function (data, type, notify) {
                return components.btn_edit(notify, 'btn-edit-notify') + components.btn_delete(notify, 'btn-delete-notify');
            }),
        ],
    });
    $(function(){
        $(".kt-form__actions button").click(function(){
            dtb_Services.ajax.reload(null, false);
        });
    });
});

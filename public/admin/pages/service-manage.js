var dtb_Service_Packs;
$(document).ready(function () {
    let service_type = $('form.form-add-service-pack').data('type') ?? 'facebook';
    $('#api_service').change(function () {
        let api_service = $(this).val();
        if (api_service === 'select') {
            $('#show_service').html('');
        }
        if (api_service === 'subgiare') {
            if (service_type === 'facebook') {
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
            } else if (service_type === 'instagram') {
                $('#show_service').html(`
                    <div class="form-group">
                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                        <div class="form-control-wrap">
                            <select name="code_server" id="code_server" class="form-control">
                                <option>Chọn loại dịch vụ</option>
                                <option value="like-instagram">Like instagram</option>
                                <option value="follow-instagram">Follow instagram</option>
                            </select>
                        </div>
                    </div>
                `);
            } else if (service_type === 'tiktok') {
                $('#show_service').html(`
                    <div class="form-group">
                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                        <div class="form-control-wrap">
                            <select name="code_server" id="code_server" class="form-control">
                                <option>Chọn loại dịch vụ</option>
                                <option value="like-tiktok">Like thả tim</option>
                                <option value="comment-tiktok">Tăng bình luận</option>
                                <option value="share-tiktok">Tăng chia sẻ</option>
                                <option value="sub-tiktok">Tăng sub/follow</option>
                                <option value="view-tiktok">Tăng view video</option>
                                <option value="eye-live-tiktok">Tăng mắt live</option>
                            </select>
                        </div>
                    </div>
                `);
            } else if (service_type === 'twitter') {
                $('#show_service').html(`
                    <div class="form-group">
                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                        <div class="form-control-wrap">
                            <select name="code_server" id="code_server" class="form-control">
                                <option>Chọn loại dịch vụ</option>
                                <option value="like-twitter">Tăng like</option>
                                <option value="sub-twitter">Tăng sub/follow</option>
                            </select>
                        </div>
                    </div>
                `);
            }
        }
    });
    dtb_Service_Packs = $('#datatable-service-packs').DataTable({
        responsive: false,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: xAjax(baseUrl + `/ajax/service_packs/${service_type}`),
        order: [[0, "desc"]],
        columns: [
            definedColumns.stt,
            makeColumn('Tên', 'name'),
            makeColumn('Loại', 'code_server'),
            makeColumn('Máy chủ', 'server_service'),
            makeColumn('Giá', 'price_stock'),
            makeColumn('Trạng thái', 'status_server', 'status_server'),
            definedColumns.created_at,
            definedColumns.action(function (data, type, service) {
                return components.btn_edit(service, 'btn-edit-service-pack') + components.btn_delete(service, 'btn-delete-service-pack');
            }),
        ],
    });
    $(document).on("click", ".btn-delete-service-pack", async function () {
        if (!await swalConfirm()) return;
        let id = $(this).data('id');
        callAjaxPost(`${baseUrl}/service_pack/delete`, {id}).then(function () {
            toastr.success('Đã xoá dịch vụ!');
            dtb_Service_Packs.ajax.reload(null, false);
        })
    });

    $(document).on("click", ".btn-edit-service-pack", function () {
        let id = $(this).data('id');
        let urlShowServicePack = `${baseUrl}/service_pack/edit/${id}`
        window.location.assign(urlShowServicePack);
    });
});

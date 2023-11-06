var dtb_Contacts, dtb_Questions;

$(document).ready(function () {
    dtb_Contacts = $('#datatable-contacts').DataTable({
        responsive: false,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: xAjax(baseUrl + '/ajax/contacts'),
        order: [[0, "desc"]],
        columns: [
            definedColumns.stt,
            makeColumn('Icon', 'image', function (link) {
                if (!link) return ' ';
                return `<img class="icon-image" src="${link}" alt="">`
            }),
            makeColumn('Tiêu đề', 'content', 'text_success'),
            makeColumn('Đường dẫn', 'link', 'link'),
            definedColumns.created_at,

            definedColumns.action(function (data, type, item) {
                return components.btn_edit(item, 'btn-edit-contact')
                    + components.btn_delete(item, 'btn-delete-contact');
            }),
        ],
    });

    dtb_Questions = $('#datatable-questions').DataTable({
        responsive: false,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: xAjax(baseUrl + '/ajax/questions'),
        order: [[0, "desc"]],
        columns: [
            definedColumns.stt,
            makeColumn('Câu hỏi', 'question', 'text_success'),
            makeColumn('Trả lời', 'answer', 'textarea'),
            definedColumns.created_at,

            definedColumns.action(function (data, type, item) {
                return components.btn_edit(item, 'btn-edit-question')
                    + components.btn_delete(item, 'btn-delete-question');
            }),
        ],
    });

    $('.form-setting-single').submit(function (e) {
        e.preventDefault();
        callAjaxPost(baseUrl + '/settings/update_data', $(this).serialize()).then(function (response) {
            return toastr.success(response.msg);
        });
    });
});

$(document).on("click", ".btn-edit-contact", async function () {
    var item = await callAjaxPost(`${baseUrl}/contacts/show`, {id: $(this).data('id')});
    ['id', 'image', 'content', 'link'].forEach(field => {
        $(`#modalEditContact [name=${field}]`).val(item[field]);
    });
    $('#modalEditContact').modal('show');
});

$(document).on("click", ".btn-delete-contact", async function () {
    if (!await swalConfirm()) return;

    callAjaxPost(`${baseUrl}/contacts/delete`, {id: $(this).data('id')}).then(function () {
        toastr.success('Đã xoá!');
        dtb_Contacts.ajax.reload(null, false);
    })
});

$(document).on("click", ".btn-edit-question", async function () {
    var item = await callAjaxPost(`${baseUrl}/questions/show`, {id: $(this).data('id')});
    ['id', 'question', 'answer'].forEach(field => {
        $(`#modalEditQuestion [name=${field}]`).val(item[field]);
    });
    $('#modalEditQuestion').modal('show');
});

$(document).on("click", ".btn-delete-question", async function () {
    if (!await swalConfirm()) return;

    callAjaxPost(`${baseUrl}/questions/delete`, {id: $(this).data('id')}).then(function () {
        toastr.success('Đã xoá!');
        dtb_Contacts.ajax.reload(null, false);
    })
});


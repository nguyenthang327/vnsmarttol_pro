"use strict";

jQuery(document).ready(function () {
});

$(".btn-add-bank").click(function () {
    $("#modalBank form").trigger("reset");
    $("#modalBank form").attr('action', `${baseUrl}/banks/store`);
});

$(".btn-edit-bank").click(function () {
    $("#modalBank form").trigger("reset");
    $("#modalBank form").attr('action', `${baseUrl}/banks/update`);
    var id = $(this).data("id");
    callAjaxPost(`${baseUrl}/banks/show`, { id: id }).then(function (data) {
        var bank = data.data;
        var form = $("#modalBank form").first();
        [
            "id",
            "bank_code",
            "bank_name",
            "card_holder",
            "account_number",
            "note",
            'min_bank',
            'discount',
            'password_bank',
            'token'
        ].forEach(function (key) {
            form.find(`[name="${key}"]`).val(bank[key]);
        });

        $("#modalBank").modal("show");
    });
});

$(".btn-delete-bank").click(async function () {
    if (!(await swalConfirm())) return;

    var id = $(this).data("id");
    var that = this;
    callAjaxPost(`${baseUrl}/banks/delete`, { id: id }).then(function (data) {
        if (data.status) {
            swalSuccess("Thao tác thành công!");
            $(that).closest("tr").hide();
        } else {
            swalError("Thao tác thất bại!");
        }
    });
});

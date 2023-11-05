"use strict";

var datatableCard,
    dateFormat = "YYYY-MM-DD";
jQuery(document).ready(function () {
    $("#datatable-payment").DataTable({
        responsive: false,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        order: [[3, "desc"]],
        ajax: xAjax("/ajax-manage/payment/bank-history"),
        columns: [
            makeColumn("Số Tiền Đã Nạp", "price", function (data) {
                return `<span class="text-success text-bold">${formatMoney(
                    data,
                    " VND"
                )} ${data < 0 ? " <span> (Trừ đi)</span>" : ""}</span>`;
            }),
            definedColumns.note,
            makeColumn("Hình thức", "is_auto", "payment_mode"),
            definedColumns.time,
        ],
    });

    // if ($("#datatable-phone-cards").length) {
    //     datatableCard = $("#datatable-phone-cards").DataTable({
    //         responsive: false,
    //         searchDelay: 500,
    //         processing: true,
    //         serverSide: true,
    //         ajax: xAjax("/ajax/phone_cards"),
    //         order: [[0, "desc"]],
    //         columns: [
    //             definedColumns.stt,
    //             definedColumns.card_type,
    //             definedColumns.card_serial,
    //             definedColumns.card_code,
    //             definedColumns.card_value,
    //             definedColumns.note,
    //             definedColumns.admin_note,
    //             definedColumns.time,
    //             definedColumns.card_status,
    //         ],
    //     });

    //     $("#card_form").submit(async function (e) {
    //         e.preventDefault();

    //         let cardValue = formatMoney($('[name="card_value"]').val() * 1000);
    //         let willReceive = $("#text_real_receive").text();

    //         if (
    //             !(await swalTimeOut(
    //                 `Bạn gạch thẻ mệnh giá ${cardValue} bạn sẽ nhận ${willReceive}, bấm tiếp tục để chờ duyệt thẻ?`,
    //                 "question",
    //                 2000,
    //                 "Tiếp tục",
    //                 "Hủy"
    //             ))
    //         )
    //             return;

    //         swalLoading();
    //         $.ajax({
    //             type: "POST",
    //             url: $(this).attr("action"),
    //             data: $(this).serialize(),
    //             success: function (data) {
    //                 if (data.status === 1) {
    //                     swalSuccess(data.msg);
    //                     $("#card_form").trigger("reset");
    //                     datatableCard.ajax.reload(null, false);
    //                 } else {
    //                     swalError(data.msg);
    //                 }
    //             },
    //         });
    //     });

    //     $('[name="card_value"]').change(function () {
    //         var value = $(this).val();
    //         $("#text_real_receive").html(
    //             formatMoney(value * charge * 1000, " VND")
    //         );
    //     });

    //     $('[name="card_value"]').trigger("change");
    // }

    // $(".btn-apply-offer").click(function () {
    //     var offer = $("#offer").val().trim();
    //     if (!offer) return swalError("Vui lòng nhập mã!");

    //     callAjaxPost("/payment/apply_offer", { offer }).then(function (result) {
    //         if (!result.status) return swalError(result.msg);
    //         swalSuccess(result.msg);
    //     });
    // });

    // Code for payment page only
    // if (!$(".payment-widget").length) return;

    // $(".payment-widget").click(function () {
    //     $(".content-toggle").hide();
    //     $(`#${$(this).data("target")}`).show();
    //     $(".payment-widget").removeClass("active");
    //     $(this).addClass("active");
    // });

    // $("#time_from")
    //     .val(moment().format(dateFormat.substr(0, 7)) + "-01")
    //     .datetimepicker({
    //         format: dateFormat,
    //         locale: "vi",
    //     });

    // $("#time_to").val(moment().format(dateFormat)).datetimepicker({
    //     format: dateFormat,
    //     locale: "vi",
    // });

    // callAjaxPost("/payment/this_month_data").then(function (result) {
    //     var tempIn = {},
    //         tempOut = {},
    //         paymentIn = [],
    //         paymentOut = [],
    //         labels = [];

    //     result.data_in.forEach(function (row) {
    //         tempIn[row.day] = Number(row.total);
    //     });
    //     result.data_out.forEach(function (row) {
    //         tempOut[row.day] = Number(row.total);
    //     });

    //     var today = moment().valueOf();
    //     var tempDate = moment(moment().format("YYYY-MM") + "-01", dateFormat);

    //     while (tempDate.valueOf() < today.valueOf()) {
    //         var key = tempDate.format(dateFormat);

    //         if (tempIn[key] || tempOut[key]) {
    //             labels.push(key.substr(5).split("-").reverse().join("/"));

    //             paymentIn.push(tempIn[key] || 0);
    //             paymentOut.push(tempOut[key] || 0);
    //         }

    //         tempDate.add(1, "day");
    //     }

    //     Highcharts.chart("chart", {
    //         chart: {
    //             type: "column",
    //             backgroundColor: $("body").hasClass("dark_mode")
    //                 ? "#1e1e2d"
    //                 : "#ffffff",
    //         },
    //         credits: {
    //             enabled: false,
    //         },
    //         title: {
    //             text: "",
    //         },
    //         xAxis: {
    //             categories: labels,
    //             crosshair: true,
    //         },
    //         yAxis: {
    //             visible: false,
    //             visibility: false,
    //             min: 0,
    //             title: {
    //                 text: "",
    //             },
    //         },
    //         tooltip: {
    //             headerFormat:
    //                 '<span style="font-weight: bold;color: tomato">{point.key}</span><table>',
    //             pointFormat:
    //                 '<tr><td style="color:{series.color};padding:0;font-weight: bold">{series.name}: </td>' +
    //                 `<td style="padding:0"><b>{point.y} <span class="tomato">₫</span></b></td></tr>`,
    //             footerFormat: "</table>",
    //             shared: true,
    //             useHTML: true,
    //         },
    //         plotOptions: {
    //             column: {
    //                 pointPadding: 0.2,
    //                 borderWidth: 0,
    //             },
    //         },
    //         series: [
    //             {
    //                 name: "Nạp",
    //                 data: paymentIn,
    //             },
    //             {
    //                 name: "Chi",
    //                 data: paymentOut,
    //             },
    //         ],
    //     });
    // });

    // $("#btn_view_payment").click(function (e) {
    //     var time_from = $("#time_from").val();
    //     var time_to = $("#time_to").val();
    //     if (!(time_from && time_to)) return;
    //     if (moment(time_from) > moment(time_to))
    //         return swalError("Hãy chọn thời gian hợp lệ!");

    //     callAjaxPost("/payment/data_by_time", { time_from, time_to }).then(
    //         function (result) {
    //             if (!result.status) return swalError(result.msg);

    //             $("#value_in").html(formatMoney(result.value_in));
    //             $("#value_out").html(formatMoney(result.value_out));
    //             if (e && e.which) toastr.success("Thành công!");
    //         }
    //     );
    // });

    // $("#btn_view_payment").trigger("click");
});

"use strict";

jQuery(document).ready(function() {
  datatableLog = $('#datatable-ajax').DataTable({
    responsive: false,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    order: [[ 0, "desc" ]],
    ajax: xAjax(`${baseUrl}/ajax-manage/payment/recharge-card-history`),
    columns: [
      definedColumns.stt,
      makeColumn('Loại thẻ', 'type'),
      makeColumn('Mã giao dịch', 'trans'),
      makeColumn('Seri', 'seri'),
      makeColumn('Mã thẻ', 'id_card'),
      makeColumn('Số tiền', 'denomination_money', 'money_vnd'),
      makeColumn('Thực nhận', 'actually_received', 'money_vnd'),
      makeColumn('Thời gian nạp', 'created_at', 'time'),
      makeColumn('Trạng thái', 'status', function(data) {
        let html = '';
        data = data - 1;
        switch(data) {
            case 4:
                html = `<span class="badge badge-warning text-bold">${typeStatusRechargeCard(data)}</span>`
                break;
            case 3:
                html = `<span class="badge badge-danger text-bold">${typeStatusRechargeCard(data)}</span>`
                break;
            case 2:
                html = `<span class="badge badge-primary text-bold">${typeStatusRechargeCard(data)}</span>`
                break;
            case 1:
                html = `<span class="badge badge-success text-bold">${typeStatusRechargeCard(data)}</span>`
                break;
            default:
              // code block
        }
        return html;
      }),
    ],
  });


});

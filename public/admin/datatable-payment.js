let oldPaymentMode = 'all', datatablePayment;

$(document).ready(function() {
  datatablePayment = $('#datatable-ajax').DataTable({
    responsive: false,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    ajax: xAjax(`${baseUrl}/ajax/payments`),
    order: [[0, "desc"]],
    columns: [
      definedColumns.stt,
      makeColumn('Tài khoản', 'username', 'user'),
      makeColumn('Số tiền thay đổi', 'price', function(data) {
        let value = formatMoney(data, ' VND') + (data < 0 ? ' <span>(trừ đi)</span>' : '');
        return `<span class="badge badge-success">${value}</span>`;
      }),
      makeColumn('Ghi chú', 'note'),
      makeColumn('Hình thức', 'is_auto', 'payment_mode'),
      makeColumn('Thời gian', 'time'),
    ],
  });

  $('.payment_date').val(moment().format(momentFormat.date_hyphen_reserve))
      .datetimepicker({
        format: momentFormat.date_hyphen_reserve,
        locale: 'vi'
      });
});

$(document).on('click', '.tab-payment-mode li a, .tab-payment-source li a', function() {
  onChangeFilter();
});

function onChangeFilter() {
  setTimeout(() => {
    let paymentMode = $('.tab-payment-mode .nav-link.active').data('mode');
    let paymentSource = $('.tab-payment-source .nav-link.active').data('source');

    let url = ajaxUrl + `?mode=${paymentMode}&source=${paymentSource}`;
    datatablePayment.ajax.url(url).load();
  }, 100);
}

$('.btn-search-duplicate').click(function() {
  toastr.info('Đang xử lý...');
  let payment_date = $('#payment_date').val();
  callAjaxPost(baseUrl + '/payment/find_duplicate', {payment_date}).then(function(result) {
    toastr.success('Đã xong');
    if (!(result.data && result.data.length)) toastr.error('Không có bản ghi nào!');
    showTableData('#table_list_duplicate', result.data);
  })
});

function showTableData(id, data) {
  if ($.fn.dataTable.isDataTable(id)) {
    $(id).DataTable().destroy();
  }

  $(id + ' tbody').html('');

  data.forEach(function(row) {
    row.time = moment(row.createdAt).format('YYYY/MM/DD HH:mm:ss');

    let html = ejs.render(
        `<tr class="text-bold">
                     <td><%= row.id %></td>
                     <td class="text-success"><%= row.username %></td>
                     <td class="text-warning">${formatMoney(row.price)}</td>
                     <td class="text-danger"><%= row.time %></td>
                     <td class="text-danger"><%= row.note %></td>
                     <td class="text-danger">${components.table.payment_mode(row.is_auto, false, row)}</td>
                 </tr>`
        , {row: row});
    $(id + ' tbody').append(html);
  });

  $(id).dataTable({
    order: [[ 0, "desc" ]],
    ajax: false
  });
}

$('.btn-search-repeated').click(function() {
  toastr.info('Đang xử lý...');
  let payment_date = $('#repeated_payment_date').val();
  callAjaxPost(baseUrl + '/payment/find_repeated', {payment_date}).then(function(result) {
    toastr.success('Đã xong');
    if (!(result.data && result.data.length)) toastr.error('Không có bản ghi nào!');
    showTableData('#table_list_repeated', result.data);
  })
});


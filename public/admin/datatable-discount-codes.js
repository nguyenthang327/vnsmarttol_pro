$(document).ready(function() {
  datatableLog = $('#datatable-list').DataTable({
    responsive: false,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    ajax: xAjax(baseUrl + '/ajax/discount_codes'),
    order: [[ 0, "desc" ]],
    columns: [
      definedColumns.stt,
      makeColumn('Mã Code', 'code', components.badge_success),
      makeColumn('Loại', 'code_type', code_type => {
        if (code_type === 'discount') return components.badge_primary('Mã giảm giá');
        return components.badge_danger('Mã quà tặng');
      }),
      makeColumn('Phần trăm', 'discount_percent', percent => {
        if (!percent) return ' ';
        return components.badge_primary(percent);
      }),
      makeColumn('Giới hạn', 'limit_per_user', components.badge_warning),
      makeColumn('Hiệu lực', 'enable', enable => {
        return enable ? components.badge_primary('Có') : components.badge_danger('Không');
      }),
      makeColumn('Đơn tối thiểu', 'min_order', components.table.text_success),
      makeColumn('Giảm tối đa', 'max_discount', components.table.text_success),
      definedColumns.created_at,
      definedColumns.action((id, t, row) => {
        return components.btn_edit(row) + components.btn_delete(row);
      })
    ],
  });
});

$(document).on('click', '.btn-edit', function () {
  callAjaxPost(baseUrl + '/discount_codes/show', {id: $(this).data('id')}).then(function(res) {
    var row = res.data;
    var form = $('#modalAdd form');
    ['id', 'code', 'code_type', 'discount_percent', 'limit_per_user', 'enable', 'min_order', 'max_discount'].forEach(field => {
      form.find(`[name=${field}]`).val(row[field]);
    });
    $('[name="code_type"]').trigger('change');

    $('#modalAdd').modal('show');
  })
});

$(document).on('click', '.btn-delete', async function () {
  if (!await swalConfirm()) return;

  await callAjaxPost(baseUrl + '/discount_codes/delete', {id: $(this).data('id')});
  swalSuccess();
  reloadTable();
});

$('.btn-add').click(function() {
  $('#modalAdd form').trigger('reset');
  $('#modalAdd').modal('show');
  $('[name="code_type"]').trigger('change');
});

$('[name="code_type"]').change(function() {
  var code_type = $(this).val();
  if (code_type === 'discount') {
    $('.discount-item').show().find('.form-control').prop('required', true);
    $('.gift-item').hide();
  } else {
    $('.discount-item').hide().find('.form-control').prop('required', false);
    $('.gift-item').show();
  }
}).trigger('change');

$('.tab-type .nav-link').click(function() {
  datatableLog.ajax.url(ajaxUrl + `?type=${$(this).data('type') || 'all'}`).load(showToolTip);
})

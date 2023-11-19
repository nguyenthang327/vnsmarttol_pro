"use strict";

var selectedFields = [];

$(document).ready(function() {
  datatableLog = $('#datatable-report').DataTable({
    responsive: false,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    ajax: xAjax(`/ajax/log_report`),
    order: [[ 0, "desc" ]],
    columns: [
      definedColumns.stt,
      definedColumns.uid,
      definedColumns.type,
      definedColumns.msg,
      definedColumns.count,
      definedColumns.price,
      definedColumns.status,
      definedColumns.time,
      definedColumns.note,
      definedColumns.admin_note
    ]
  });

  $('.tab-filter-report li a').click(function() {
    var selectedFilter = $(this).data('filter');
    if (selectedFilter != filter.filter) {
      filter.filter = selectedFilter;

      var url = ajaxUrl;
      url += `?filter=${selectedFilter}`;
      datatableLog.ajax.url(url).load(showToolTip);
    }
  });

  $('.field-select-container input').change(function() {
    var field = $(this).val();
    if (selectedFields.includes(field)) {
      selectedFields = selectedFields.filter(x => x !== field);
    } else {
      selectedFields.push(field);
    }

    let textSelected = [];
    selectedFields.forEach(field => {
      textSelected.push(fieldMap[field]);
    });

    $('#selected_field').val(textSelected.join(' | '));
  });

  $(document).on('click', '#btn_export', function() {
    if (!selectedFields.length) return swalError("Vui lòng chọn định dạng xuất");
    window.open('/ajax/export_logs?' + $.param({
      filter: filter.filter,
      fields: selectedFields.join(','),
      date_range: $('#date_range').val()
    }))
  });

  var minTimeFrom = moment().subtract('6', "month")
  $('#date_range').daterangepicker({
    minDate: minTimeFrom,
    maxDate: moment(),
    startDate: moment().subtract('7', 'day'),
    locale: {
      format: momentFormat.date,
      cancelLabel: "Huỷ",
      applyLabel: "Đồng ý",
    },
  });
});


"use strict";

jQuery(document).ready(function() {
  if (type === 'vip_expired_soon' || !$('#datatable-logs').length) return;
  var columns = [
    definedColumns.stt,
    definedColumns.uid,
    definedColumns.type,
    definedColumns.msg,
    definedColumns.count,
  ];

  if (type == 'view_story') columns.push(definedColumns.present);

  columns = columns.concat([
    definedColumns.price,
    definedColumns.time,
    definedColumns.note,
    definedColumns.admin_note,
  ]);

  if (type == 'view_story') columns.push(definedColumns.status);

  // begin first table
  datatableLog = $('#datatable-logs').DataTable({
    responsive: false,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    ajax: xAjax(`/ajax/logs/?type=${type}`),
    order: [[ 0, "desc" ]],
    columns: columns,
  });
});
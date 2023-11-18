"use strict";

jQuery(document).ready(function() {
  $('.nav-link[href="#history"]').click(function() {
    if (!datatableLog) {
      var columns = [];
      if (type.match(/google_/)) {
        if (type === 'google_map') {
          columns = [
            definedColumns.map_name,
            definedColumns.map_image,
            definedColumns.map_address,
            definedColumns.map_phone,
            definedColumns.map_website,
            definedColumns.contact_phone,
          ];
        } else if (type === 'rip_google_map') {
          columns = [
            definedColumns.uid,
            definedColumns.map_note,
          ];
        } else if (type === 'google_map_review') {
          columns = [
            definedColumns.uid,
            definedColumns.count,
            definedColumns.original,
            definedColumns.present,
            definedColumns.comment_data
          ];
        }

        columns = [
          definedColumns.stt,
          definedColumns.server,
          definedColumns.msg,
          ...columns,
          definedColumns.note_editable,
          definedColumns.admin_note,
          definedColumns.price,
          definedColumns.time,
          definedColumns.status,
        ];

        if (type === 'google_map_review') {
          columns.push(definedColumns.action((id, t, order) => {
            let html = ' ';
            if (order.server == 'server_1') {
              html += components.btn_view_log(order);
            }

            if (!!order.can_warranty) html += components.btn_warranty_buff(order);

            return html;
          }));
        }
      } else {
        columns = [
          definedColumns.stt,
          definedColumns.uid,
          definedColumns.server,
          definedColumns.msg,
          definedColumns.note_editable,
          definedColumns.admin_note,
          definedColumns.count,
          definedColumns.original,
          definedColumns.present,
          definedColumns.price,
          definedColumns.time,
          definedColumns.status,
        ];

        // Overwrite present
        if (type == 'view_live_v2') columns[7] = makeColumn('Phút đã chạy', 'present');
        if (type === 'buff_group') columns[7] = makeColumn('Hiện tại', 'present');

        if (type.match(/(comment|review)/) && !type.match(/like_comment/)) columns.push(definedColumns.comment_data);

        columns.push(definedColumns.action(components.table.action_group_service));
      }

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
    } else {
      // Reload data
      if (datatableLog) datatableLog.ajax.reload(showToolTip, false);
    }
  });
});

$(document).on("click", ".btn-warranty-buff", async function() {
  if (!await swalConfirm('Bạn có chắc chắn muốn bảo hành?')) return;

  swalLoading('Đang thực thi...');
  var response = await callAjaxPost('/facebook/warranty', {id: $(this).data("id")});
  if (response.status) {
    if (datatableLog) datatableLog.ajax.reload(showToolTip, false);
    return swalSuccess(response.msg);
  } else {
    return swalError(response.msg);
  }
});

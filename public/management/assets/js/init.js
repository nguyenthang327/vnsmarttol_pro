var datatableLog, datatableVip, ajaxUrl;
var filter = { status: 'all', server: 'all', cookie_live: 'all', filter: 'all'};
var ckElements = {};
var allLevels = [0, 1, 2, 3];
var allPriceFields = allLevels.map(function(value) { return 'price_lv' + value });
var allRoles = ['Thành Viên', 'Cộng tác viên', 'Đại lý', 'Nhà phân phối'];
var domainStatus = ['Chờ xử lý', 'Hoạt động', 'Tạm khoá', 'Lỗi Token', 'Tên miền lỗi'];
var allStatusRechargeCard = ['Thành công', 'Đang chờ', 'Lỗi', 'Bảo trì'];
$.ajaxSetup({
    headers: {
        "Api-Token": $('meta[name="api-token"]').attr("content"),
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function typeGroup(ugroup) {
  return allRoles[Number(ugroup)] || "Ăn Mày";
}

function typeStatusRechargeCard(status) {
  return allStatusRechargeCard[Number(status)] || "Không rõ";
}

function ckEditor(elementId) {
  if (typeof CKEDITOR === "undefined") return console.error('CKEDITOR not loaded!');

  CKEDITOR.replace( elementId, {
    language: 'vi',
    removePlugins:'about,save,exportpdf,print,a11yhelp,filebrowser,pastefromgdocs,pastefromlibreoffice,pastefromword,' +
      'uploadimage,templates,editorplaceholder,forms,iframe,smiley,language,scayt,div'
  } );
}

function updateSingleEditor(elementId, content) {
  CKEDITOR.instances[elementId].setData(content);
}

function updateEditor() {
  // Update ckeditor v4
  if (typeof CKEDITOR !== "undefined" && Object.keys(CKEDITOR.instances).length > 0) {
    Object.keys(CKEDITOR.instances).forEach(function(key) {
      CKEDITOR.instances[key].updateElement();
    });
  }

  // Update ckeditor v5
  if (Object.values(ckElements).length) {
    Object.values(ckElements).forEach(function(editor) {
      editor.updateSourceElement();
    })
  }
}

var momentFormat = {
  full: 'HH:mm:ss DD/MM/YYYY',
  full_reverse: 'YYYY/MM/DD HH:mm:ss',
  date: 'DD/MM/YYYY',
  date_hyphen: 'DD-MM-YYYY',
  date_hyphen_reserve: 'YYYY-MM-DD',
  datetime_picker: 'YYYY-MM-DD HH:mm:ss',
};

// Active current item
var mPath = window.location.pathname;
var link = $(`.side-nav a[href="${mPath}"]`);
if (link) {
  var elm = link;
  for (var i = 0; i < 10; i++) {
    elm = $(elm).parent();
    if (elm.hasClass('item-parent')) elm.addClass('active');
    if (elm.hasClass('has-child') || elm.hasClass('dropdown')) elm.addClass('open');
    if (elm.hasClass('dropdown-menu')) {
      elm.show();
      elm.prev().addClass('active');
    }
  }
}

function explode_by(begin,end,data) {
  try {
    data = data.split(begin);
    data = data[1].split(end);
    return data[0];
  } catch(ex) {
    return "";
  }
}

function getDateTime(date) {
  if(!date) date = new Date();
  else date = new Date(date);
  return moment(date).format('YYYY-MM-DD HH:mm:ss');
}

if (typeof toastr !== "undefined") {
  toastr.options = {
    "closeButton": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
}

function showToolTip() { $('[data-toggle="tooltip"], .btn-icon').tooltip(); }

if (typeof $.fn.dataTable !== "undefined") {
  $.extend( $.fn.dataTable.defaults, {
    fnDrawCallback: function() {
      showToolTip();
      if (typeof datatableLoaded === "function") datatableLoaded();
      if ($('.note-editable').length) $('.note-editable').parent().addClass('note-edit-wrapper');
    },
    "language": {
      "sProcessing":   "Đang xử lý...",
      "sLengthMenu":   "Xem _MENU_ mục",
      "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
      "emptyTable":  "Không tìm thấy dòng nào phù hợp",
      "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
      "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
      "sInfoFiltered": "(được lọc từ _MAX_ mục)",
      "sInfoPostFix":  "",
      "sSearch":       "Tìm:",
      "sUrl":          "",
      "oPaginate": {
        "sFirst":    "Đầu",
        "sPrevious": "Trước",
        "sNext":     "Tiếp",
        "sLast":     "Cuối"
      }
    },
    "pageLength": 10,
    "lengthMenu": [ 5, 10, 25, 50, 100 ],
    "ajax": {
      // "url": "window.location.href",
      "data": function( result ) {
        // Do stuff
        return result;
      }
    }
  });
}

function htmlSafe(input) {
  if (!input || typeof input.replace !== 'function') return '';
  return input.replace(/[<>"']/g, '');
}

function isRefundAble(log) {
  if (!log.order_id || ![0, 10].includes(parseInt(log.status)) || !log.server) return false;

  if (typeof svRefundWhenCheck === 'undefined') return false;
  if (svRefundWhenCheck.includes(log.server)) return log.status == 10 && svRefundable.includes(log.server);
  return svRefundable.includes(log.server);
}

function isReCheckAble(log) {
  return log.server && log.status == 10 && svCanRecheck.includes(log.server);
}

$(document).on('click', '.note-editable', function() {
  if ($(this).hasClass('editing')) return;

  // If another note is editing
  if ($('.note-editable.editing').length) $('.note-editable.editing textarea').trigger('blur');

  $('.note-editable').removeClass('editing');
  var content = $(this).text();
  $(this).addClass('editing').html(`<textarea class="form-control" rows="4"></textarea>`);
  $(this).find('textarea').focus().val(content);
});

$(document).on('blur', '.note-editable textarea', function() {
  var note = $(this).val();
  var parent = $(this).closest('.note-editable');
  var id = parent.data('id');
  var type = parent.data('type');

  callAjaxPost(baseUrl + '/update_note', {id: id, type: type, note: note}).then(function(response) {
    toastr.success('Đã cập nhật ghi chú!');
    parent.html(ejs.render('<%= note %>', {note: response.note})).removeClass('editing');
  });
});

var components = {
  btn_edit_vip: function(vip) {
    return `
      <button class="btn btn-icon btn-edit-vip" data-toggle="tooltip" title="Sửa" data-id="${vip.id}">
        <i class="fas fa-edit text-info"></i>
      </button>
    `;
  },
  btn_extend_vip: function(vip) {
    return `
      <button class="btn btn-icon btn-extend-vip" data-toggle="tooltip" title="Gia hạn"
              data-id="${vip.id}">
        <i class="fas fa-clock text-success"></i>
      </button>
    `;
  },
  btn_refund_vip: function(vip) {
    return `<button data-id="${vip.id}" data-type="${vip.type}" class="btn btn-icon btn-refund-vip"
               data-toggle="tooltip" title="Hoàn tiền">
                <i class="fa fa-trash text-danger"></i>
            </button>`
  },
  btn_delete_vip_expired: function(vip) {
    return `
      <button class="btn btn-icon btn-delete-expired"
              data-toggle="tooltip" data-id="${vip.id}" data-type="${vip.type}" title="Xóa ${vip.type}">
        <i class="fa fa-trash text-danger"></i>
       </button>
    `
  },
  btn_log_priority: function(row) {
    return `<button class="btn btn-icon btn-log-priority" data-toggle="tooltip" title="Ưu tiên" data-id="${row.id}">
                <i class="fa fa-angle-up text-primary"></i>
            </button>`
  },
  btn_view_log: function(vip) {
    return `<button data-id="${vip.id}" class="btn btn-icon btn-view-log"
                    data-toggle="tooltip" title="Xem log">
                <i class="fa-solid fa-chart-line text-primary"></i>
            </button>`
  },
  btn_re_check: function(buff) {
    return `<button class="btn btn-icon btn-re-check" data-id="${buff.id}" data-type="${buff.type}" data-server="${buff.server}"
                    data-toggle="tooltip" title="Tiếp tục chạy">
              <i class="fas fa-sync-alt text-primary"></i>
            </button>`;
  },
  btn_refund_buff: function(full) {
    return `<a data-id="${full.id}" data-type="${full.type}" class="btn btn-icon btn-refund-buff"
               data-toggle="tooltip" title="Hoàn tiền">
                <i class="fa fa-trash text-danger"></i>
            </a>`
  },
  btn_delete_buff: function(full) {
    return `<a data-id="${full.id}" data-type="${full.type}" class="btn btn-icon btn-delete-buff"
               data-toggle="tooltip" title="Xóa để mua lại">
                <i class="fa fa-trash text-danger"></i>
            </a>`
  },
  btn_add_post: function(vip) {
    return `<button data-id="${vip.id}" class="btn btn-icon btn-add-post" data-toggle="tooltip" title="Bù bài lỗi">
              <i class="fa fa-plus text-success"></i>
            </button>`;
  },
  btn_edit: function(row, className = 'btn-edit') {
    return `<button data-id="${row.id}" class="btn btn-icon ${className}" title="Sửa">
                <i class="fas fa-edit text-success"></i>
            </button>`
  },
  btn_delete: function(row, className = 'btn-delete') {
    return `<button data-id="${row.id}" class="btn btn-icon ${className}" title="Xóa">
                <i class="fa fa-trash text-danger"></i>
            </button>`
  },
  btn_sync: function(id, className = 'btn-sync', title = 'Đồng bộ') {
    return `<button type="button" data-id="${id}" class="btn btn-icon ${className}" title="${title}">
                <i class="text-primary fa fa-repeat"></i>
            </button>`;
  },
  btn_warranty_buff: function(full) {
    return `<button data-id="${full.id}" class="btn btn-icon btn-warranty-buff" data-toggle="tooltip" title="Bảo Hành">
                <i class="fas fa-sync-alt text-primary"></i>
            </button>`
  },
  badge_success: (text) => {
    return `<span class="badge badge-success">${text}</span>`;
  },
  badge_primary: (text) => {
    return `<span class="badge badge-primary">${text}</span>`;
  },
  badge_warning: (text) => {
    return `<span class="badge badge-warning">${text}</span>`;
  },
  badge_danger: (text) => {
    return `<span class="badge badge-danger">${text}</span>`;
  },
  table: {
    id: function (data, typeT, full) {
      return ejs.render('<span class="text-success text-bold id-<%= full.id %>"><%= data %></span>', {data, full});
    },
    uid: function(data, type, full) {
      if (data === 'NULL') return ' ';
      if (full.link && full.link !== 'default') {
        if (!full.link.match(/^(http)/)) full.link = 'https://' + full.link;

        if (data.length > 30) data = data.substring(0, 28) + '...';

        return ejs.render('<a href="<%= full.link %>" class="text-bold" target="_blank"><%= data %></a>', {data, full});
      } else {
        var prefix = 'fb.com';
        if (full.type.match(/instagram/)) prefix = 'instagram.com';
        if (full.type.match(/twitter/)) prefix = 'twitter.com';
        if (full.type.match(/tiktok/)) {
          prefix = 'www.tiktok.com';
          data = '@' + data;
        }
        return ejs.render('<a href="https://<%= prefix %>/<%= data %>" class="text-bold" target="_blank"><%= data %></a>', {data, full, prefix});
      }
    },
    user: function(data) {
      return ejs.render('<span class="text-warning text-bold"><%= data %></span>', {data});
    },
    server: function(data, t, log) {
      var mapping;
      if (log.type == 'view_other') {
        mapping = {
          server_1: '600k phút - SV Thường',
          server_2: '600k phút - SV Rẻ',
          server_3: '15k tương tác',
        };
        data = mapping[data] || 'null';
      } else {
        if (data) data = data.replace('server_', 'Server ');
        if (!data) data = '';
      }
      return `<span class="text-danger text-bold">${data}</span>`;
    },
    content: function(data, typeT, full) {
      return ejs.render('<div class="table-text-plain text-bold msg-<%= full.id %>"><%= data %></div>', {data, full});
    },
    note: function(data, typeT, full) {
      return ejs.render('<div class="table-text-plain text-bold note-<%= full.id %>"><%= data %></div>', {data, full});
    },
    admin_note: function(data, typeT, full) {
      return ejs.render('<div class="table-text-plain text-bold text-danger admin_note-<%= full.id %>"><%= data %></div>', {data, full});
    },
    original: function(data, typeT, full) {
      return ejs.render('<button class="btn btn-primary text-bold original-<%= full.id %>"><%= data %></button>', {data, full});
    },
    present: function(data, typeT, full) {
      return ejs.render('<button class="btn btn-success text-bold present-<%= full.id %>"><%= data %></button>', {data, full});
    },
    price: function(data, typeT, log) {
      return `<span class="badge badge-success badge-price">${formatMoney(log.price_current)}</span>
                        <span>${log.math || '+'}</span>
                        <span class="badge badge-danger badge-price"">${formatMoney(log.price || log.commission || 0)}</span>
                        <span>=</span>
                        <span class="badge badge-primary badge-price"">${formatMoney(log.price_left)}</span>`;
    },
    price_only: function(data) {
      return `<button class="btn btn-primary">${formatMoney(data)}</button>`;
    },
    count: function(data, typeT, full) {
      return ejs.render('<button class="btn btn-danger text-bold count-<%= full.id %>"><%= data %></button>', {data, full});
    },
    package: function(data, typeT, full) {
      return ejs.render('<button class="btn btn-danger package-<%= full.id %>"><%= data %></button>', {data, full});
    },
    time: function(data) {
      return `<button class="btn btn-success">${moment(data).format('HH:mm:ss DD/MM/YYYY')}</button>`;
    },
    time_expired: function(data) {
      if (isExpired(data)) return `<button class="btn btn-danger text-bold">Hết hạn (${moment(data).format('DD/MM/YYYY')})</button>`;
      var daysLeft = Math.ceil(moment(data)['diff'](moment(), 'hours') / 24);
      return `<button class="btn btn-primary">${moment(data).format('DD/MM/YYYY')}<br />(${daysLeft} ngày)</button>`;
    },
    status: function(data, typeT, full) {
      return getStatusHtml(full, typeT);
    },
    duration: function(data) {
      return ejs.render('<button class="btn btn-danger btn-ssm"><%= data %></button>', {data});
    },
    days: function(days) {
      return ejs.render('<button class="btn btn-danger btn-ssm"><%= days %> ngày</button>', {days});
    },
    vip_status: function(data, typeT, full) {
      return getStatusVipHtml(full);
    },
    type: function(data) {
      return ejs.render('<button class="btn btn-primary text-bold"><%= data %></button>', {data});
    },
    action_group_service: function(data, typeT, order) {
      var html = '';

      if (isReCheckAble(order)) html += components.btn_re_check(order);
      if (isRefundAble(order)) html += components.btn_refund_buff(order);
      if (order.can_warranty) html += components.btn_warranty_buff(order);

      if (order.type == 'view_live_v2') {
        if (order.status == 0) {
          if (['server_1', 'server_2', 'server_3'].includes(order.server)) {
            html += `<button class="btn btn-icon btn-cancel-live" data-toggle="tooltip" title="Dừng live" data-id="${order.id}">
                <i class="fa fa-eye-slash text-danger"></i>
            </button>`
          } else if (['server_4', 'server_5'].includes(order.server)) {
            if (moment().diff(moment(order.time), 'minute') >= 5) {
              html += `<button class="btn btn-icon btn-cancel-live" data-toggle="tooltip" title="Yêu cầu dừng và hoàn tiền" data-id="${order.id}">
                      <i class="fa fa-eye-slash text-danger"></i>
                  </button>`
            }
          }
        }

        if (['server_4', 'server_5'].includes(order.server)) {
          html += components.btn_view_log(order);
        }
      }
      else if (['live_tiktok', 'live_youtube'].includes(type) && moment().diff(moment(order.createdAt), 'day') < 7) {
        html += components.btn_view_log(order);
      }

      return html;
    },
    comments: function(log) {
      return ejs.render('<textarea class="form-control"><%= data %></textarea>', {data: log.other});
    },
    comment: function(data) {
      return ejs.render('<textarea class="form-control" rows="4"><%= data %></textarea>', {data});
    },
    text_success: function(data) {
      if (!data) data = '';
      return ejs.render(`<span class="text-success text-bold"><%= data %></span>`, {data});
    },
    text_primary: function(data) {
      if (!data) data = '';
      return ejs.render(`<span class="text-primary text-bold"><%= data %></span>`, {data});
    },
    text_warning: function(data) {
      if (!data) data = '';
      return ejs.render(`<span class="text-warning text-bold"><%= data %></span>`, {data});
    },
    text_danger: function(data) {
      if (!data) data = '';
      return ejs.render(`<span class="text-danger text-bold"><%= data %></span>`, {data});
    },
    payment_mode: function(is_auto, t, row) {
      return `<span class='text-${is_auto ? 'danger' : 'success'} text-bold'>${parseInt(is_auto) ? 'Tự động' : 'Thủ công'} ${row.extra || ''}</span>`;
    },
    div_scroll: function(text) {
      return ejs.render('<div class="div_scroll"><%= text %></div>', {text: text});
    },
    money_vnd: function(data) {
      return `<span class="text-danger text-bold">${formatMoney(data, " VNĐ")}</span>`;
    },
    textarea: function(data, t, full) {
      if ((full && full.type) && !full.type.match(/cmt/)) return '';
      return ejs.render('<textarea class="form-control in-table"><%= data %></textarea>', {data});
    },
  },
  blocked: function(blocked) {
    return `<button class="btn btn-info">${blocked ? 'Bị Chặn' : 'Không'}</button>`;
  },
  cookie_live: function(cookie_live) {
    return `<button class="btn ${cookie_live ? 'btn-success' : 'btn-danger'}">${cookie_live ? 'Live' : 'Die'}</button>`;
  },
  toggle_bot: function(is_running, t, bot) {
    return ejs.render('<input type="checkbox" value="" class="btn-toggle-running" data-order_id="<%= bot.order_id %>" <%= is_running ? "checked" : "" %> />', {bot, is_running});
  },
  refund_amount: function(data, typeT, full) {
    return `<span class="badge badge-success badge-price">${formatMoney(full.money_before)}</span>
                        <span>+</span>
                        <span class="badge badge-danger badge-price">${formatMoney(full.refund_amount)}</span>
                        <span>=</span>
                        <span class="badge badge-primary badge-price">${formatMoney(full.money_before + full.refund_amount)}</span>`;
  },
  enable: enable => enable ? 'Không' : 'Có',
  bool: value => components.table.text_primary(value ? 'Có' : 'Không'),
  sim_status: status => {
    if (status == 0) return `<span class="badge badge-primary"><i class="fas fa-spinner fa-spin"></i> ${getSimOrderStatus(status)}</span>`;
    if (status == 1) return `<span class="badge badge-success"><i class="far fa-check-circle"></i> ${getSimOrderStatus(status)}</span>`;
    if (status == 2) return `<span class="badge badge-danger"><i class="fas fa-battery-empty"></i> ${getSimOrderStatus(status)}</span>`;
    if (status == 3) return `<span class="badge badge-warning"><i class="fas fa-exclamation-triangle"></i> ${getSimOrderStatus(status)}</span>`;
    if (status == 4) return `<span class="badge badge-success"><i class="fas fa-undo"></i> ${getSimOrderStatus(status)}</span>`;
    if (status == 5) return `<span class="badge badge-danger"><i class="far fa-window-close"></i> ${getSimOrderStatus(status)}</span>`;
  },
  domain_status: function(data) {
    var status = domainStatus[data];
    return ejs.render(`<span class="badge b-status-${data}"><%= status %></span>`, {status});
  },
};

function makeColumn(title, name, render = null, disableSearch = false) {
  var obj = {
    title: title,
    data: name,
    name: name
  };

  if (disableSearch) Object.assign(obj, {orderable: false, searchable: false});
  if (!render) render = name;
  if (render) {
    if (typeof render === 'string') {
      if (typeof components[render] !== "undefined") obj.render = components[render];
      if (!obj.render && typeof components.table[render] !== "undefined") obj.render = components.table[render];
      if (!obj.render) obj.render = components.table.text_primary;
    } else obj.render = render;
  }
  return obj;
}

var definedColumns = {
  stt: makeColumn('STT', 'id'),
  type: makeColumn('Loại', 'type'),
  uid_old: makeColumn('Uid', 'uid'),
  uid: makeColumn('Uid', 'uid', (uid, t, order) => {
    if (order && order.type === 'lucky_wheel') return components.table.uid(uid, t, order);
    return `<div style="min-width: 150px">
                <span class="copy-on-click text-success" data-title="Sao chép UID"
                    data-toggle="tooltip" data-content="${order.uid}">
                    <i class="fa-regular fa-clipboard"></i>
                </span>
                ${components.table.uid(uid, t, order)}
            </div>`;
  }),
  name: makeColumn('Name', 'name', (name, t, full) => {
    var icon = '';
    if (full.type && full.uid && full.type.match(/vip|bot/) && !full.type.match(/instagram|tiktok|twitter/))
      icon = `<img src="https://graph.facebook.com/${full.uid}/picture?height=100&width=100&access_token=2712477385668128|b429aeb53369951d411e1cae8e810640" alt="">`;

    return `<div class="name-container">${icon} ${name || ''}</div>`;
  }),
  note: makeColumn('Note', 'note'),
  note_editable: makeColumn('Ghi chú', 'note', function(note, t, order) {
    return ejs.render(`<div class="note-editable" data-id="<%= order.id %>" data-type="<%= order.type %>" title="Nhấn để sửa"><%= note %></div>`, {order, note});
  }),
  admin_note: makeColumn('Admin Note', 'admin_note'),
  server: makeColumn('Server', 'server'),
  msg: makeColumn('Nội dung', 'msg', 'content'),
  price: makeColumn('Số Tiền', 'price'),
  count: makeColumn('Số lượng', 'count'),
  original: makeColumn('Bắt đầu', 'original'),
  present: makeColumn('Đã chạy', 'present'),
  price_only: makeColumn('Số Tiền', 'price', 'price_only'),
  prices: makeColumn('Số Tiền', 'prices', 'price_only'),
  duration: makeColumn('Thời Hạn', 'duration'),
  days: makeColumn('Thời Hạn', 'days', 'days'),
  package: makeColumn('Gói', 'package'),
  time: makeColumn('Thời Gian', 'time'),
  time_expired: makeColumn('Ngày Hết Hạn', 'time_expired'),
  expired_at: makeColumn('Ngày Hết Hạn', 'expired_at', 'time_expired'),
  proxy_name: makeColumn('Proxy', 'proxy_name'),
  proxy_expired_at: makeColumn('Hạn Sd proxy', 'proxy_expired_at', 'time_expired', true),
  black_list_keyword: makeColumn('Black List Từ Khóa', 'black_list_keyword', 'div_scroll', true),
  blocked: makeColumn('Blocked', 'blocked', 'blocked', true),
  cookie_live: makeColumn('Trạng thái Cookie', 'cookie_live', 'cookie_live', true),
  toggle: makeColumn('ON/OFF', 'other', 'toggle', true),
  status: makeColumn('Trạng thái', 'status', 'status'),
  vip_status: makeColumn('Trạng thái', 'status', 'vip_status'),
  comment_data: makeColumn('Comment', 'data', 'comment', true),
  comment_other: makeColumn('Comment', 'other', 'textarea', true),
  changed_money: makeColumn('Số Tiền thay đổi', 'price', 'changed_money'),
  payment_mode: makeColumn('Hình thức', 'is_auto', 'payment_mode'),
  max_post: makeColumn('Số bài tối đa', 'max_post'),
  post_today: makeColumn('Đã tăng hôm nay', 'post_today', function(value, t, vip) {
    if (vip.type === 'vip_like' && vip.server === 'server_6') return ' ';
    return `<span class="text-danger text-bold">${value}</span>`;
  }),
  total_post: makeColumn('Số bài đã chạy', 'post_today', function(value) {
    return `<span class="text-danger text-bold">${value}</span>`;
  }),
  refund_amount: makeColumn('Số tiền hoàn', 'refund_amount'),
  created_at: makeColumn('Thời gian', 'createdAt', 'time'),
  toggle_bot: makeColumn('ON/OFF', 'is_running', 'toggle_bot'),
  notify_type: makeColumn('Loại', 'type', nType => {
    if (typeof nMap == "undefined") return 'NULL';
    return components.table.text_primary(nMap[nType] || nMap.notify);
  }),
  notify_content: makeColumn('Nội dung', 'content', function(htmlContent) {
    return `<div class="notify_content custom-scroll">${htmlContent}</div>`;
  }),
  notify_image: makeColumn('Hình ảnh', 'image', image => {
    return ejs.render("<img class='table-image' src='<%= image %>' alt='' />", {image});
  }),

  card_type: makeColumn('Loại thẻ', 'card_type', cardType => {
    var mapping = {
      VTT:'Viettel',
      VNP:'Vinaphone',
      VMS:'Mobifone',
      ZING:'Zing',
      GATE:'Gate',
      VCOIN:'Vcoin'
    };
    return `<button class="btn btn-primary text-bold">${mapping[cardType]}</button>`;
  }),
  card_serial: makeColumn('Seri thẻ cào', 'card_serial'),
  card_code: makeColumn('Mã thẻ cào', 'card_code'),
  card_value: makeColumn('Mệnh giá', 'card_value'),
  card_status: makeColumn('Trạng thái', 'status', status => {
    var allClass = ['primary', 'success', 'danger'];
    var allText = ['Đang xử lý', 'Thành công', 'Thất bại'];
    return `<span class="text-bold text-${allClass[status]}">${allText[status]}</span>`;
  }),
  warranty_count: makeColumn('Số lượng bảo hành', 'warranty_count'),
  warranty_status: makeColumn('Trạng thái', 'status', function(status) {
    var allStatus = ['Chờ duyệt', 'Đang chạy', 'Đã xong'];
    var allBtn = ['btn-danger', 'btn-primary', 'btn-warning text-white'];
    return `<button class="btn ${allBtn[status]}">${allStatus[status] || allStatus[0]}</button>`
  }),
  sim_expired_at: makeColumn('Thời gian Chờ', 'expired_at', function(expired_at, t, order) {
    if (isExpired(expired_at) || order.status != 0) return components.table.text_danger('Hết hạn');
    return `<span class="text-success time-count" data-expired_at="${expired_at}"><i class="far fa-clock"></i> <span></span></span>`
  }, true),
  phone: makeColumn('Số Điện Thoại', 'phone', 'text_primary'),
  sim_total: makeColumn('Tổng tiền', 'total', function(total, t, order) {
    if (!order.money_before) return `<span class="badge badge-danger badge-price">${formatMoney(order.total)}</span> `;
    return `<span class="badge badge-success badge-price">${formatMoney(order.money_before)}</span>
              <span>-</span>
              <span class="badge badge-danger badge-price">${formatMoney(order.total)}</span>
              <span>=</span>
              <span class="badge badge-primary badge-price">${formatMoney(order.money_before - order.total)}</span>`;
  }),
  sim_status: makeColumn('Trạng thái', 'status', 'sim_status'),
  source_username: makeColumn('User nạp', 'source_username', 'text_success'),
  amount: makeColumn('Số tiền nạp', 'amount', 'price_only'),
  commission: makeColumn('Tiền hoa hồng', 'commission', 'price_only'),
  commission_value: makeColumn('Số Tiền', 'amount', 'price'),
  vip_live_post: makeColumn('Đã tăng', 'post_today', function(value, t, row) {
    if (!row.max_post || row.type !== 'vip_live') return ' ';
    return components.table.text_primary(row.post_today || '0') + '/' + components.table.text_success(row.max_post);
  }),

  action: function (render) {
    return makeColumn('Hành Động', 'id', render, true);
  },
  vip_action: makeColumn('Hành Động', 'id', function(id, t, vip) {
    var html = '';
    if (vip.type === 'vip_like') {
      if (!['server_6'].includes(vip.server)) html += components.btn_extend_vip(vip);
      if (notExpired(vip.time_expired)) {
        if (['server_1', 'server_5', 'server_6'].includes(vip.server)) html += components.btn_add_post(vip);
        // New version
        if (['server_1', 'server_2'].includes(vip.server)) {
          html += components.btn_view_log(vip);
        }

        html += components.btn_refund_vip(vip);
      }
    }
    else if (vip.type === 'vip_like_group') {
      html += components.btn_extend_vip(vip);
      html += components.btn_edit_vip(vip)
      if (notExpired(vip.time_expired)) {
        html += components.btn_refund_vip(vip);
      }
    }
    else if (vip.type === 'vip_cmt') {
      if (notExpired(vip.time_expired)) {
        if (['server_1'].includes(vip.server)) html += components.btn_add_post(vip);
        if (vip.server !== 'server_4') {
          html += components.btn_edit_vip(vip);
        }
        html += components.btn_refund_vip(vip);
      }
      if (!['server_4'].includes(vip.server)) html += components.btn_extend_vip(vip);
      if (['server_2'].includes(vip.server)) {
        html += components.btn_view_log(vip);
      }
    }
    else if (vip.type === 'vip_share') {
      if (notExpired(vip.time_expired)) {
        if (vip.server == 'server_1') html += components.btn_edit_vip(vip)
          + components.btn_refund_vip(vip)
          + components.btn_add_post(vip);
      }
      html += components.btn_extend_vip(vip);
    }
    else if (vip.type === 'vip_live') {
      if (['server_1', 'server_3'].includes(vip.server)) html += components.btn_extend_vip(vip);
      if (notExpired(vip.time_expired)) {
        if (vip.server == 'server_2') {
          html += components.btn_view_log(vip) + components.btn_add_post(vip);
        } else if (['server_1', 'server_3'].includes(vip.server)) {
          html += components.btn_view_log(vip);
        }
        html += components.btn_refund_vip(vip);
      }
    }
    else if (vip.type.match(/tiktok|instagram|twitter/)) {
      if (notExpired(vip.time_expired)) {
        html += components.btn_add_post(vip);
        html += components.btn_view_log(vip);
        html += components.btn_refund_vip(vip);
        if (vip.type === 'vip_comment_instagram') html += components.btn_edit_vip(vip)
      }

      if (!vip.type.match(/twitter/)) html += components.btn_extend_vip(vip);
    }

    if (isExpired(vip.time_expired)) html += components.btn_delete_vip_expired(vip);

    return html;
  }),
  map_name: makeColumn('Tên maps', 'data', data => readJsonData(data, 'map_name')),
  map_image: makeColumn('Hình ảnh', 'data', data => {
    var map_image = readJsonData(data, 'map_image');
    if (!map_image) return ' ';
    return ejs.render('<a href="<%= map_image %>" target="_blank">Xem</a>', {map_image})
  }),
  map_address: makeColumn('Địa chỉ', 'data', data => readJsonData(data, 'map_address')),
  map_phone: makeColumn('SDT ghim', 'data', data => readJsonData(data, 'map_phone')),
  map_website: makeColumn('Website/Fanpage', 'data', data => readJsonData(data, 'map_website')),
  map_note: makeColumn('Ghi chú thêm', 'data', data => readJsonData(data, 'map_note')),
  contact_phone: makeColumn('SDT liên hệ', 'data', data => readJsonData(data, 'contact_phone')),
  comment_or_data: makeColumn('Dữ liệu', 'data', (data, t, log) => {
    if (log.type && log.type.match(/google/)) {
      try {
        var jsonData = JSON.parse(data);
        var dataMap = {
          map_name:'Tên maps',
          map_image:'Hình ảnh',
          map_address:'Địa chỉ',
          map_phone:'SDT ghim',
          map_website:'Website/Fanpage',
          contact_phone:'SDT liên hệ',
          map_working_hour: 'Thời gian hoạt động',
          map_link: 'Link Map',
          map_note: 'Ghi chú thêm',
        };

        var textContent = '';
        Object.keys(jsonData).forEach(key => {
          if (!jsonData[key]) return;

          var content = ejs.render('<%= text %>', {text: jsonData[key]})
          textContent += `${dataMap[key]}: <span class="text-success">${content}</span><br />`;
        });

        return textContent;
      } catch (e) {
        return 'NULL';
      }
    }

    return components.table.comment(data);
  }, true),
};

function readJsonData(data, key) {
  var json = readJson(data);
  if (!json[key]) return ' ';
  return ejs.render('<%= text %>', {text: json[key]});
}

function getSimOrderStatus(status) {
  var mapping = {
    status_0: 'Đang chờ SMS',
    status_1: 'Hoàn thành',
    status_2: 'Không có SMS',
    status_3: 'Hết hạn',
    status_4: 'Đã Hoàn tiền',
    status_5: 'Hủy đơn',
  };

  return mapping['status_' + status] || 'NULL';
}

function getAllStatus() {
  var result = ['Đang chạy', 'Đã xong', 'Đã hủy bởi admin', 'Đã hoàn tiền', 'Chờ huỷ đơn'];
  result[-1] = 'Chờ xử lý';
  result[10] = 'Cần Check';
  return result;
}

function getStatusHtml (full) {
  var allStatus = getAllStatus();
  var status = parseInt(full.status);
  var allBtn = ['btn-success', 'btn-warning text-white', 'btn-danger', 'btn-primary', 'btn-danger'];
  allBtn[-1] = 'btn-danger';
  allBtn[10] = 'btn-danger';

  var textHtml = allStatus[status];
  var btn = allBtn[status];
  return `<button class="btn ${btn} status-${full.id}">${textHtml}</button>`;
}

function getStatusVipHtml (full) {
  if (full.type === 'vip_like' && full.server === 'server_1') return '';
  var allStatus = ['Đang chờ xác nhận', 'Đang chạy', 'Đã hủy bởi admin'];
  var status = parseInt(full.status);
  var allBtn = ['btn-success', 'btn-warning text-white', 'btn-danger', 'btn-primary', 'btn-danger'];
  return `<button class="btn ${allBtn[status]} status-${full.id}">${allStatus[status]}</button>`;
}

/**
 * Re mapping the request url of datatable
 * @param url
 */
function xAjax(url) {
  if (typeof ajaxUrl === "undefined") ajaxUrl = url;
  return {
    url: url,
    data: function( data ) {
      try {
        let order = data.order[0];
        order.field = data.columns[order.column].data;
        data.order_by = order.field;
        data.order_dir = order.dir;
        data.keyword = data.search.value;
        data.order = [];
        data.columns = [];
        return data;
      } catch (e) {
        console.log(e);
        return data;
      }
    }
  }
}

$("#formRedirect").submit(function(e) {
  e.preventDefault();

  $.ajax({
    type: "POST",
    url: $(this).attr("action"),
    data: $(this).serialize(),
    success: async function (data) {
      if (data.status !== 1) return swalError(data.msg);

      await swalSuccess(data.msg);
      window.location.assign(data.redirect);
    }
  });
});

$('.image-with-preview input[type="file"]').change(function () {
  var input = this;
  var url = $(this).val();
  var image = $(this).closest('.image-with-preview').find('img');
  var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
  if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
    var reader = new FileReader();

    reader.onload = function (e) {
      image.attr('src', e.target['result']);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    image.attr('src', '/assets/images/no_preview.png');
  }
});

function notExpired(time) {
  return moment(time).valueOf() > (+ new Date());
}

function isExpired(time) {
  return moment(time).valueOf() < (+ new Date());
}

function getContentArray(text) {
  return text.trim().split("\n").filter(function(line) { return line && line.trim().length });
}

function countLine(text) {
  if (!text) return 0;
  return getContentArray(text).length;
}

function getOrderSummary() {
  if (!$('.tab-filter .count').length || type === 'sim_otp') return;
  var url, service_type;
  if (baseUrl.length < 2) {
    // user
    url = `/ajax/summary`;
    service_type = type;
  } else {
    var tType = window.location.pathname.match(/log/) ? 'logs' : 'vips';
    url = `${baseUrl}/${tType}/summary`;
    service_type = $('#service_type').val();
    if (!service_type) return;
  }
  $.post(url, {type: service_type}).done(function(data) {
    var total = 0;
    $(`.tab-status a .count`).html(0);
    data.forEach(function(row) {
      total += row.total;
      $(`.tab-status a[data-status="${row.status}"] .count`).html(row.total);
    });

    $(`.tab-status a[data-status="all"] .count`).html(total);
  })
}

$('#service_type').change(function() {
  toastr.info('Đang xử lý...');
  getOrderSummary();
  onUpdateTable();
});

$('.tab-status li a').click(function() {
  var status = $(this).data('status');
  if (status != filter.status) {
    filter.status = status;
    onUpdateTable();
  }
});

$('.tab-servers li a').click(function() {
  var server = $(this).data('server');
  if (server != filter.server) {
    filter.server = server;
    onUpdateTable();
  }
});

$('.tab-cookie-status li a').click(function() {
  var status = $(this).data('status');
  if (status != filter.cookie_live) {
    filter.cookie_live = status;
    onUpdateTable();
  }
});

function onUpdateTable() {
  var query = {};

  if ($('#service_type').length) {
    query.type = $('#service_type').val();
  }
  query.status = filter.status;
  query.server = filter.server;

  var newUrl;
  if (datatableVip) {
    query.cookie_live = filter.cookie_live;

    newUrl = updateAjaxUrl(datatableVip, query);
    datatableVip.ajax.url(newUrl).load(showToolTip);
  } else {
    newUrl = updateAjaxUrl(datatableLog, query);
    datatableLog.ajax.url(newUrl).load(showToolTip);
  }
}

function updateAjaxUrl(datatable, obj) {
  var oldUrl = datatable.ajax.url();
  Object.keys(obj).forEach(function(key) {
    oldUrl = replaceUrlParam(oldUrl, key, obj[key]);
  });

  return oldUrl;
}

function replaceUrlParam(url, paramName, paramValue)
{
  if (paramValue == null) {
    paramValue = '';
  }
  var pattern = new RegExp('\\b('+paramName+'=).*?(&|#|$)');
  if (url.search(pattern)>=0) {
    return url.replace(pattern,'$1' + paramValue + '$2');
  }
  url = url.replace(/[?#]$/,'');
  return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
}

// Enable ps when screen is large
// if ($( window ).width() > 768) $('.side-nav-menu').addClass('scrollable');

$(window).ready(function() {
  if ($('body').hasClass('test-mode')) {
    Swal.fire({
      title: 'Để sử dụng dịch vụ bạn cần đăng ký/ đăng nhập tài khoản cho riêng bạn, tài khoản xem thử này không thể mua!',
      icon: 'warning',
      html: '',
      allowOutsideClick: true,
      showCancelButton: true,
      confirmButtonText: 'Tiếp tục xem',
      cancelButtonText: 'Đăng xuất'
    }).then(function(data) {
      if (data && data.isDismissed) {
        $.get('/logout').done(function() {
          window.location.href = '/';
        });
      }
    })
  }

  // Set side-nav-menu height if mobile
  if ($( window ).width() <= 768) $('.side-nav-menu').css('height', `${$( window ).height() - 70}px`);

  getOrderSummary();

  // Listen to click event when body is expand
  $(document).on('click', 'body.is-expand .page-container', function() {
    $('.mobile-toggle').trigger('click');
  });

  if ($('.nav-link[data-toggle="tab"][role="tab"]').length) {
    $('.nav-link[data-toggle="tab"][role="tab"]').click(function() {
      var targetClick = $($(this).attr('href'));
      var targetTable = targetClick.find('table.dataTable');
      if (targetTable) {
        setTimeout(function () {
          targetTable.parent().doubleScroll();
        }, 200);
      }
    });
  }
  else {
    setTimeout(function() {
      var targetTable = $('table.dataTable');
      if (targetTable) {
        targetTable.parent().doubleScroll();
      }
    }, 500);
  }

  if (typeof $().tooltip == "function") {
    $('[data-toggle="tooltip"], .btn-icon').tooltip();
  }

  if (typeof moment !== 'undefined' && typeof $().datetimepicker !== 'undefined') {
    moment.defineLocale('vi', {
      months: 'Tháng 1_Tháng 2_Tháng 3_Tháng 4_Tháng 5_Tháng 6_Tháng 7_Tháng 8_Tháng 9_Tháng 10_Tháng 11_Tháng 12'.split(
        '_'
      ),
      monthsShort: 'Thg 01_Thg 02_Thg 03_Thg 04_Thg 05_Thg 06_Thg 07_Thg 08_Thg 09_Thg 10_Thg 11_Thg 12'.split(
        '_'
      ),
      monthsParseExact: true,
      weekdays: 'chủ nhật_thứ hai_thứ ba_thứ tư_thứ năm_thứ sáu_thứ bảy'.split(
        '_'
      ),
      weekdaysShort: 'CN_T2_T3_T4_T5_T6_T7'.split('_'),
      weekdaysMin: 'CN_T2_T3_T4_T5_T6_T7'.split('_'),
      weekdaysParseExact: true,
      meridiemParse: /sa|ch/i,
      isPM: function (input) {
        return /^ch$/i.test(input);
      },
      meridiem: function (hours, minutes, isLower) {
        if (hours < 12) {
          return isLower ? 'sa' : 'SA';
        } else {
          return isLower ? 'ch' : 'CH';
        }
      },
      longDateFormat: {
        LT: 'HH:mm',
        LTS: 'HH:mm:ss',
        L: 'DD/MM/YYYY',
        LL: 'D MMMM [năm] YYYY',
        LLL: 'D MMMM [năm] YYYY HH:mm',
        LLLL: 'dddd, D MMMM [năm] YYYY HH:mm',
        l: 'DD/M/YYYY',
        ll: 'D MMM YYYY',
        lll: 'D MMM YYYY HH:mm',
        llll: 'ddd, D MMM YYYY HH:mm',
      },
      calendar: {
        sameDay: '[Hôm nay lúc] LT',
        nextDay: '[Ngày mai lúc] LT',
        nextWeek: 'dddd [tuần tới lúc] LT',
        lastDay: '[Hôm qua lúc] LT',
        lastWeek: 'dddd [tuần trước lúc] LT',
        sameElse: 'L',
      },
      relativeTime: {
        future: '%s tới',
        past: '%s trước',
        s: 'vài giây',
        ss: '%d giây',
        m: 'một phút',
        mm: '%d phút',
        h: 'một giờ',
        hh: '%d giờ',
        d: 'một ngày',
        dd: '%d ngày',
        w: 'một tuần',
        ww: '%d tuần',
        M: 'một tháng',
        MM: '%d tháng',
        y: 'một năm',
        yy: '%d năm',
      },
      dayOfMonthOrdinalParse: /\d{1,2}/,
      ordinal: function (number) {
        return number;
      },
      week: {
        dow: 1, // Monday is the first day of the week.
        doy: 4, // The week that contains Jan 4th is the first week of the year.
      },
    });
  }

  showToolTip();

  $('.toggle-mobile-container a').click(function() {
    $('body').toggleClass('right-bar-open');
  });
});

function callAjaxPost(url, postData) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      type: "POST",
      url: url,
      data: postData,
      success: function(data) {
        return resolve(data);
      },
      fail: function (xhr) {
        return reject(xhr);
      },
      error: function (xhr) {
        return reject(xhr);
      },
    });
  })
}

function reloadTable() {
  if (datatableVip) datatableVip.ajax.reload(showToolTip, false);
  if (datatableLog) datatableLog.ajax.reload(showToolTip, false);
}

function formatMoney(input, suffix = '', round = true) {
  if (!suffix) suffix = '';
  var number = parseFloat(input);
  if (round) number = Math.floor(number);
  if (isNaN(number)) return input;
  return number.toLocaleString() + suffix;
}

$(".form-json").submit(function(e) {
  e.preventDefault();
  var that = this;
  swalLoading('Đang thực thi....');
  var reload = $(this).data('reload');
  var runAfterDone = $(this).data('done');

  updateEditor();

  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: "POST",
    url: $(this).attr("action"),
    data: $(this).serialize(),
    success: function(data) {
      if (data.status !== 1) return swalError(data.msg);

      if (runAfterDone && window[runAfterDone]) return window[runAfterDone](data);

      swalSuccess(data.msg).then(function() {
        if (reload) return window.location.reload();

        // Hide modal if exist
        $('.modal').modal('hide');
        reloadTable();

        if ($(that).data('table')) {
          var table = $(that).data('table');
          if (window[`dtb_${table}`]) {
            window[`dtb_${table}`].ajax.reload(null, false);
          }
        }
      })
    },
    error: function(xhr){
      var errorMsg = '';
      if(xhr.status == 422){
        var errors  = Object.values(xhr.responseJSON.errors);
        errors.forEach((item, index) => {
          errorMsg += item + ' ';
        });

      }
      return swalError(errorMsg);
    }
  });
});

function googleTranslate() {
  new google.translate['TranslateElement']({pageLanguage: 'vi'}, 'button_translate');
}

function readJson(rawData) {
  try {
    return JSON.parse(rawData);
  } catch (e) {
    return {};
  }
}

function ln2br(text) {
  return text.replace(/(?:\r\n|\r|\n)/g, '<br>');
}

$(document).on('click', '.copy-on-click', function() {
  var text = $(this).text().trim();
  if (!text) return;
  const el = document.createElement('textarea');
  el.value = text;
  document.body.appendChild(el);
  el.select();
  el.setSelectionRange(0, 99999); /* For mobile devices */
  document.execCommand('copy');
  document.body.removeChild(el);

  toastr.success('Đã sao chép!');
});

$(document).on('click', '.btn-copy', function () {
  var target = $(this).data('target');
  var text = $(target).val() || $(target).text();
  if (!text) return;

  const el = document.createElement('textarea');
  el.value = text.trim();
  document.body.appendChild(el);
  el.select();
  el.setSelectionRange(0, 99999); /* For mobile devices */
  document.execCommand('copy');
  document.body.removeChild(el);

  toastr.success('Đã sao chép!');
});

function getTimePasses(timeInput) {
  if (!timeInput) return ' ';

  var seconds = moment().diff(moment(timeInput), 'second');
  if (seconds < 60) return seconds + ' giây trước';
  if (seconds < 60 * 60) return Math.floor(seconds / 60) + ' phút trước';
  if (seconds < 60 * 60 * 24) return Math.floor(seconds / 60 / 60) + ' giờ trước';
  var days = moment().diff(moment(timeInput), 'day');
  if (days < 30) return days + ' ngày trước';
  if (days < 365) return moment().diff(moment(timeInput), 'month') + ' tháng trước';
  return moment().diff(moment(timeInput), 'year') + ' năm trước';
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

$('#switch_dark_mode').change(function() {
  var dark_mode = $(this).is(':checked') ? 1 : 0;
  callAjaxPost( '/dark_mode', {dark_mode}).then(function() {
    $('body')[dark_mode ? 'addClass' : 'removeClass']('dark_mode');
  })
});

function checkTiktokLink(that) {
  var link = $(that).val();
  getTiktokLink(link, false).then(response => {
    let [success, data] = response;
    if (success) {
      if (data == link) return;
      $(that).val(data);
      swalSuccess("Cập nhật link thành công");
    } else {
      swalError(data);
    }
  })
}

$('#tiktok_post_link, .tiktok-link').change(function() {
  checkTiktokLink(this);
});

$('[name="post_id"]').change(function() {
  if (typeof type === 'undefined' || !type.match(/vip_.*_tiktok/)) return;
  checkTiktokLink(this);
});

function text(text) {
  return ejs.render('<%= text %>', {text});
}

$(document).on('click', '.copy-on-click', function() {
  var text = $(this).text().trim();
  if ($(this).data('content')) text = $(this).data('content');

  if (!text) return;
  const el = document.createElement('textarea');
  el.value = text;
  document.body.appendChild(el);
  el.select();
  el.setSelectionRange(0, 99999); /* For mobile devices */
  document.execCommand('copy');
  document.body.removeChild(el);

  toastr.success('Đã sao chép!');
});



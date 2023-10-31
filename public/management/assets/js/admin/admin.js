function number_format(number) {
  if (!number) return number;
  try {
    number = parseInt(number.toString().replace(/[^[0-9-]/g, ''));
    if (isNaN(number)) return number;
    return number.toLocaleString();
  } catch (e) {
    return number;
  }
}

$(document).ready(function () {
  if (typeof onWebReady === "function") onWebReady();

  // Redisplay table
  $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
    $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
  } );

  // $('.web-logo').html(window.location.host);
});


$("#formAdminAction").submit(function (e) {
  e.preventDefault();

  updateEditor();

  swalLoading();
  $.ajax({
    type: "POST",
    url: $(this).attr("action"),
    data: $(this).serialize(),
    success: function (data) {
      if (data.status === 1) {
        swalSuccess(data.msg).then(function() {
          if (data.redirect) window.location.assign(data.redirect);
        })
      } else {
        swalError(data.msg);
      }
    }
  });
});

$(".form-ajax").submit(function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: $(this).attr("action"),
    data: $(this).serialize(),
    success: function(data) {
      if (data.status === 1) {
        swalSuccess().then(function() {
          window.location.reload();
        });
      } else {
        toastr.error(data.msg);
      }
    }
  });
});


definedColumns = Object.assign(definedColumns, {
  username: makeColumn('User Cài', 'username'),
  user_status: makeColumn('Trạng thái', 'status', (status) => {
    if (parseInt(status)) return '<span class="text-bold text-success">Bình thường</span>';
    return '<span class="text-bold text-danger">Bị khoá</span>'
  }),
});

components = Object.assign(components, {
  btn_check_refund: function(id, obj) {
    return `<button data-id="${id}" class="btn btn-icon btn-check-refund" data-obj="${obj}" data-toggle="tooltip" title="Hoàn tiền">
              <i class="fas fa-money-bill-wave text-primary"></i>
          </button>`;
  },
});

function getData(id, type) {
  return new Promise(function (resolve, reject) {
    $.post(`${baseUrl}/${type}/detail/${id}`).done(function(res) {
      if (res.status === 1) {
        return resolve(res.data);
      } else {
        toastr.error(res.msg);
        return reject();
      }
    });
  });
}

function getLog(id) {
  return getData(id, 'logs');
}

function getVip(id) {
  return getData(id, 'vips');
}

function getBot(id) {
  return getData(id, 'bots');
}

$(document).on("click", ".btn-check-refund", async function () {
  if (!await swalConfirm('Thao tác chỉ được thực hiện trên web đại lý, đơn này trạng thái sẽ k thay đổi ở web mẹ?')) return;

  var obj = $(this).data('obj');
  var id = $(this).data('id');

  if (obj === 'buff') {
    getLog(id).then(function(buff) {
      var form = $('#modalRefund form').first();
      ['id', 'note', 'admin_note'].forEach(function(field) {
        form.find(`[name="${field}"]`).val(buff[field]);
      });

      var count = parseInt(buff.count);
      var price = parseInt(buff.price) / count;
      var present = parseInt(buff.present);
      var left = count - present;
      var refund = left * price;

      $('#b_count').html(formatMoney(count));
      $('#b_price').html(formatMoney(price));
      $('#b_present').html(formatMoney(present));
      $('#b_left').html(formatMoney(left));
      $('#b_refund').html(formatMoney(refund));

      form.find('[name="refund_amount"]').val(refund);

      $('#modalRefund').modal('show');
    })
  }
  else if (obj === 'vip') {
    getVip(id).then(function(vip) {
      var form = $('#modalRefund form').first();
      ['id', 'note'].forEach(function(field) {
        form.find(`[name="${field}"]`).val(vip[field]);
      });

      var vip_package = vip.package;
      var duration = Number(vip.duration.replace('ngày', '').trim());
      var price = vip.price;
      var time_expired = vip.time_expired;

      var singlePrice = Math.floor(price / duration);
      let now = moment();
      let daysLeft = Math.floor(moment(time_expired)['diff'](now, 'hours') / 24);
      if (daysLeft < 0) daysLeft = 0;

      if (vip.type === 'vip_like_twitter') daysLeft = 0;
      var refund = daysLeft * singlePrice;

      $('#b_package').html(vip_package);
      $('#b_duration').html(vip.duration);
      $('#b_price').html(formatMoney(price));
      $('#b_single_price').html(formatMoney(singlePrice, '', false));
      $('#b_time_expired').html(time_expired);
      $('#b_days_left').html(daysLeft);
      $('#b_refund').html(formatMoney(refund));
      form.find('[name="refund_days"]').val(daysLeft);

      $('#modalRefund').modal('show');
    });
  }
  else if (obj === 'bot') {
    getBot(id).then(function(bot) {
      var form = $('#modalRefund form').first();
      ['id', 'note'].forEach(function(field) {
        form.find(`[name="${field}"]`).val(bot[field]);
      });

      var duration = bot.days;
      var price = bot.prices;
      var expired_at = bot.expired_at;

      var singlePrice = Math.floor(price / duration);
      let now = moment();
      let daysLeft = Math.floor(moment(expired_at)['diff'](now, 'hours') / 24);
      if (daysLeft < 0) daysLeft = 0;
      var refund = daysLeft * singlePrice;

      $('#b_duration').html(bot.days + ' ngày');
      $('#b_price').html(formatMoney(price));
      $('#b_single_price').html(formatMoney(singlePrice, '', false));
      $('#b_time_expired').html(expired_at);
      $('#b_days_left').html(daysLeft);
      $('#b_refund').html(formatMoney(refund));
      form.find('[name="refund_days"]').val(daysLeft);

      $('#modalRefund').modal('show');
    });
  }
});

$('.sample-container .sample').click(function() {
  var content = $(this).text();
  $(this).closest('.form-group').find('.form-control').val(content);
});

// When reset form, also reset all hidden fields
$("form").bind("reset", function() {
  $(this).find('[type=hidden]').val('');
});


$('.switch.switch-setting [type="checkbox"]').change(function () {
  let key = $(this).attr('name');
  if (!key) return;
  if (key.match(/\[([^\]]+)]/)) key = key.match(/\[([^\]]+)]/)[1]

  callAjaxPost(baseUrl + '/settings/toggle', {
    key,
    value: $(this).is(':checked') ? 1 : 0
  }).then(function (response) {
    if (!response.status) return toastr.error(response.msg);

    return toastr.success(response.msg);
  });
});



var paymentTimeOut = 15,
  discountCodeMap = {},
  // Stand for selected discount
  sDiscount = null;

const multiOrderData = {
  running: false,
  uidElementSelector: '#formUserAction [name=uid], #formUserAction [name=link], #formUserAction #url.form-control',
  purchaseData: [],
  requestStop: false,
  idMap: {},
  orderSubTotal: 0,
  elementType: '',
}

const wait = (secondMin, secondMax = false) => {
  if (secondMax !== false) secondMin = Math.floor(Math.random() * (secondMax - secondMin + 1)) + secondMin;

  return new Promise(resolve => {
    setTimeout(function() {
      return resolve();
    }, secondMin * 1000);
  });
};

function number_format(number) {
  if (!number) return number;
  try {
    number = parseInt(number.toString().replace(/[^[0-9-]/g, ''));
    if (isNaN(number)) return number;
    return number.toLocaleString() + ' VND';
  } catch (e) {
    return number;
  }
}

$(document).ready(function () {
  if (typeof onWebReady === "function") onWebReady();

  // Redisplay table
  $('a[data-toggle="tab"]').on( 'shown.bs.tab', function () {
    $.fn.dataTable.tables( {visible: true, api: true} ).columns['adjust']();
  } );

  // $('.web-logo').html(window.location.host);

  getPayment();

  if (typeof type !== 'undefined' && ['view_video', 'view_live_v2', 'fb_view_reel', 'fb_view_100k_reel', 'view_other'].includes(type)) {
    callAjaxPost('/view/view_available').then(function(data) {
      Object.keys(data).forEach(function (key) {
        var selector = `#${key},.${key}`;
        $(selector).text(data[key]);
        if (data[key] == 0 && $(selector).parent().hasClass('server-status')) $(selector).parent().addClass('stopped');
      });
    })
  }

  checkDiscount();

  // Check and show modalNotifyByType
  try {
    if ($('#modalNotifyByType').length) {
      if (typeof type === 'undefined') type = 'common';
      $('.btn-hide-type-popup').click(function() {
        setCookie('popup_' + type, + new Date());
      });

      var matchCookie = getCookie('popup_' + type);
      if (!matchCookie || moment().diff(moment(Number(matchCookie)), 'hour') >= 5) {
        $('#modalNotifyByType').modal('show');
      }
    }
  } catch (e) {
    console.error('modalNotifyByType:', e);
  }

  $("#service-select").val(window.location.pathname).select2({
    placeholder: "Chọn dịch vụ",
    allowClear: true,
    "language": {
      "noResults": function(){
        return "Không có kết quả, liên hệ admin nếu cần bổ sung dịch vụ";
      }
    },
  }).on('select2:select', function () {
    window.location.href =  $('#service-select').val();
  });

  if (typeof type !== "undefined" && $(multiOrderData.uidElementSelector).length) {
    multiOrderData.elementType = $(multiOrderData.uidElementSelector).attr('id');

    $('#formUserAction').prepend(
        `
            <div class="form-group">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switch_multi_order">
                <label class="custom-control-label" for="switch_multi_order"></label>
                <label for="switch_multi_order">Mua nhiều đơn cùng lúc</label>
              </div>
            </div>
        `
    );

    $('body').append(`
    <div class="modal fade" id="modalMultiOrder" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Mua nhiều đơn</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <h5>
                UID/Link: <span class="text-danger" id="multi_order_current_uid"></span>
              </h5>

              <h5>Tiến độ: <span class="text-success" id="multi_order_progress"></span></h5>
            </div>

            <button class="btn btn-success multi_order_btn_start">Bắt đầu mua</button>
            <button class="btn btn-danger" id="multi_order_btn_stop">Dừng</button>

            <hr />

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>UID/Link đã nhập</th>
                  <th>UID/Link mua</th>
                  <th>Tổng đơn</th>
                  <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>

            <hr />
            <button class="btn btn-success multi_order_btn_start">Bắt đầu mua</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
    `);

    $('.multi_order_btn_start').click(async function() {
      if (!multiOrderData.purchaseData.length) return;
      changePurchaseMultiOrderStatus(false);

      const uidElement = $(multiOrderData.uidElementSelector);
      if (!uidElement.length) return;
      let errorUid = [];

      const createOrder = async () => {
        return new Promise((resolve) => {
          $.ajax({
            type: "POST",
            url: $('#formUserAction').attr('action'),
            data: $('#formUserAction').serialize(),
            success: function(data) {
              if (data.status) return resolve([true, data]);
              return resolve([false, data.msg]);
            },
            error: function (xhr) {
              console.error(xhr);
              return resolve([false, 'timeout']);
            }
          });
        })
      }

      const updateProgress = (text) => {
        $('#multi_order_progress').text(text);
      }

      $('#modalMultiOrder').modal('show');

      toastr.info('Đang tiến hành mua...');

      let totalOrder = multiOrderData.purchaseData.length;
      for (let index = 0; index < totalOrder; index++) {
        if (multiOrderData.requestStop) {
          multiOrderData.requestStop = false;
          toastr.error('Đã dừng');
          updateProgress('Đã dừng');
          changePurchaseMultiOrderStatus(true);

          return;
        }

        let purchaseInfo = multiOrderData.purchaseData[index];
        if (purchaseInfo.errorMsg) {
          errorUid.push(purchaseInfo.purchaseId);
          continue;
        }
        if (purchaseInfo.success) continue; // skip purchased success

        $('#multi_order_current_uid').text(purchaseInfo.purchaseId);

        uidElement.val(purchaseInfo.purchaseId.toString().trim());
        if (purchaseInfo.purchaseName && $('#name').length) $('#name').val(purchaseInfo.purchaseName);
        if ($('#formUserAction #url').length) $('#url').val(purchaseInfo.originId);

        updateProgress(`Đang mua ${index + 1}/${totalOrder}`);

        if (index > 0 && type === 'like_tiktok' && ['server_3', 'server_5'].includes(selectedServer)) {
          await wait(selectedServer === 'server_3' ? 4 : 2);
        }

        let [success, orderData] = await createOrder();

        if (success) {
          multiOrderData.purchaseData[index].success = true;
          await wait(0.25);
        }
        else {
          let errorMsg = orderData.toString();
          if (errorMsg.includes('Hệ thống bảo trì')) {
            index--;
            const confirmed = await swalTimeOut(
                'Hệ thống đang bảo trì, việc mua đơn sẽ được tiếp tục sau thời gian chờ',
                'question',
                45 * 1000,
                'Vui lòng chờ',
                'Dừng mua đơn',
                true);

            if (!confirmed) {
              multiOrderData.requestStop = true;
              toastr.success('Đang dừng quá trình mua...');
            }
            continue;
          } else if (errorMsg.includes('ua chậm lại')) {
            index--;
            await wait(5, 7);
            continue;
          }

          multiOrderData.purchaseData[index].errorMsg = orderData;
          errorUid.push(purchaseInfo.purchaseId);
        }

        mo_showPurchaseInfo();
      }

      $('#multi_order_current_uid').text('N/A');

      updateProgress(`Mua thành công ${totalOrder - errorUid.length}/${totalOrder}`);
      toastr.success('Đã mua xong');

      let resetForm = true;
      if (errorUid.length) {
        resetForm = false;
        $('#list_uid').val(errorUid.join("\n"));
        toastr.warning(`Có ${errorUid.length} đơn lỗi, vui lòng mua lại!`)
      }

      onCreateOrderSuccess(resetForm);

      $('.multi_order_btn_start').hide();
      $('#multi_order_btn_stop').hide();

      $('#switch_multi_order').trigger('change');
    });

    $('#multi_order_btn_stop').click(function() {
      multiOrderData.requestStop = true;
      toastr.success('Đang dừng quá trình mua...');
    });

    $(document).on('change', '#switch_multi_order', function () {
      let uidElement = $(multiOrderData.uidElementSelector);
      if (!uidElement) return console.error('element not found');

      const multiId = $(this).is(':checked');

      if (multiId) {
        // Append text area if not exist
        if (!$('#list_uid').length) {
          $('<textarea class="form-control" id="list_uid" placeholder="Mỗi UID/link 1 hàng" rows="5"></textarea>')
              .insertAfter(uidElement)
        }

        let oldValue = uidElement.val();
        uidElement.prop('required', false).val('').hide();
        $('#formUserAction #name').prop('required', false);

        $('#list_uid')
            .prop('required', true)
            .show();

        if (!$('#list_uid').val()) $('#list_uid').val(oldValue);

        toastr.success('Đã chuyển qua chế độ mua nhiều UID/Link cùng lúc');
      }
      else {
        // back to one uid
        let currentUid = $('#list_uid').val().split("\n")[0];
        uidElement
            .val(currentUid)
            .prop('required', true)
            .show();
        if (currentUid) uidElement.trigger('change');

        $('#formUserAction #name').prop('required', true);

        $('#list_uid')
            .val('')
            .prop('required', false)
            .hide();

        toastr.success('Đã chuyển qua chế độ mua một UID/Link');
      }

      $('#count').trigger('change');
    });

    $(document).on('change', '#list_uid', function () {
      if (typeof selfCalculatorPrice === "function") {
        selfCalculatorPrice();
      } else if (type.match(/vip/)) {
        $('#formUserAction [name=vip_package]').trigger('change');
      } else {
        $('#count').trigger('change');
      }
      if (typeof calculatorPrice === "function") calculatorPrice();
    });

    $(document).on('click', '.multi_order_btn_get_uid', async function () {
      swalLoading('Đang get link...');

      const index = Number($(this).data('index'));
      let purchaseInfo = await mo_getPurchaseInfo(multiOrderData.purchaseData[index].originId);

      if (purchaseInfo.errorMsg) {
        multiOrderData.purchaseData[index].errorMsg = purchaseInfo.errorMsg;
        swalError('Get UID Lỗi: ' + purchaseInfo.errorMsg);
      } else {
        multiOrderData.purchaseData[index] = {
          ...multiOrderData.purchaseData[index],
          errorMsg: '',
          uidError: false,
          purchaseId: purchaseInfo.purchaseId,
          purchaseName: purchaseInfo.purchaseName,
        }
        swalSuccess('Đã get lại UID');
      }

      mo_showPurchaseInfo();
    });
  }
});

function checkDiscount() {
  if ($('#discount_code_container').length) {
    callAjaxPost('/discount_codes').then(async function(res) {
      if (!res.status || !res.codes.length) {
        $('#discount_code_container').hide();
        return;
      }

      $('#discount_code_container').show();
      // Reset parameters
      $('#list_codes').html('');
      discountCodeMap = {};
      sDiscount = null;
      $('#discount-status').attr('class', '').html('');

      res.codes.forEach(row => {
        discountCodeMap[row.code] = row;
        $('#list_codes').append(`
          <div class="code-item" title="Đơn tối thiểu ${formatMoney(row.min_order)}₫, giảm tối đa ${formatMoney(row.max_discount)}, còn ${row.left} lượt">
            <div class="head">Giảm ${row.discount_percent}%</div>
            <div class="code-body"><span class="code-content">${row.code}</span><span class="far fa-clipboard"></span></div>
          </div>
        `);

        $('.code-item').tooltip();
      });

      // Bind click events
      $(document).on('click', '.code-item', function () {
        var codeText = $(this).find('.code-content').text();
        var code = discountCodeMap[codeText] || false;
        if (!code || (sDiscount && code.code === sDiscount.code)) return;

        $('.code-item').removeClass('selected');
        $(this).addClass('selected');

        $('[name="discount_code"]').val(code.code);
        sDiscount = code;

        if (['comment', 'review', 'comment_instagram', 'vip_like_instagram', 'bot_comment', 'bot_love_story',
          'proxy', 'comment_tiktok', 'live_tiktok', 'view_live_v2', 'video', 'view_other', 'vip_cmt', 'vip_like',
          'vip_live', 'vip_share', 'vip_view_video', 'comment_youtube', 'spam_message_multi', 'view_60k_offline'].includes(type)) {
          try {
            ['calculatorPrice', 'selfCalculatorPrice'].forEach(functionName => {
              if (typeof window[functionName] == "function") {
                window[functionName]();
                throw new Error('break');
              }
            })
          } catch (e) {}
        } else {
          if ($('#count').length) {
            $('#count').trigger('change');
          } else {
            if (['poke', 'filter_friend'].includes(type)) {
              let total = applyDiscount($('[name=price]').val());
              total = getOrderTotal(total);

              $("#total").val(formatMoney(total, ' VNĐ'));
            } else {
              toastr.error('Lỗi mã giảm giá!');
            }
          }
        }
      });
    });
  }
}

function getPayment() {
  callAjaxPost('/new_update').then(async function(data) {
    var payment = data.payment;
    var refund = data.refund;

    var messages = [];
    if (payment > 0) messages.push({must_read: false, text: `Bạn đã nạp thành công ${formatMoney(payment, ' ₫')}, chúc bạn một ngày tốt lành!`});
    if (refund > 0) messages.push({must_read: false, text: `Hệ thống đã hoàn tiền cho bạn ${formatMoney(refund, ' VND')}\nHãy kiểm tra nhật ký hoàn tiền.`});
    if (data.notify) messages.push({must_read: true, text: data.notify});

    for (var i = 0; i < messages.length; i++) {
      var item = messages[i];
      if (item.must_read) {
        let contentText = item.text;
        if (contentText.includes('Token api domain con')) contentText += 'Hãy vào danh sách domain của bạn RESET TOKEN API để website hoạt động';
        await swalNotifyTimeOut(contentText);
      }
      else await swalSuccess(item.text);
    }
  });

  paymentTimeOut *= 2;
  setTimeout(function() {
    getPayment();
  }, paymentTimeOut * 1000);
}

function getVip(id) {
  return new Promise(function (resolve, reject) {
    $.post('/vip/show', {id: id}).done(function(data) {
      if (!data.status) return reject(false);
      return resolve(data.vip);
    });
  })
}

$(document).on("click", ".btn-edit-vip", function () {
  getVip($(this).data('id')).then(function(vip) {
    $('#modalUpdate input[name="id"]').val(vip.id);
    if (typeof onEditVip === "function") onEditVip(vip);
    $('#modalUpdate').modal('show');
  })
});

var handleVipAction = function(data) {
  if (data.status) {
    swalSuccess();
    reloadTable();
  } else {
    swalError(data.msg);
  }
};


$(document).on("click", ".btn-extend-vip", async function () {
  var id = $(this).data('id');

  var days = await swalInput('Nhập số ngày bạn muốn gia hạn', 30);
  if (!days) return;

  swalLoading('Đang thực thi, vui lòng không tắt hộp thoại này!');
  $.post('/vip/extend', {id, days}).done(handleVipAction)
});

/**
 * Handle submit form update service
 */
$('#formUpdate').submit(function(e) {
  e.preventDefault();

  swalLoading();
  $.ajax({
    type: "POST",
    url: $(this).attr("action"),
    data: $(this).serialize(),
    success: function (data) {
      if(data.status === 1) {
        swalSuccess(data.msg);
        $('.modal.show').modal('hide');
      } else {
        swalError(data.msg);
      }
    }
  });
});

$("#formUserAction").submit(async function (e) {
  e.preventDefault();

  if ($('body').hasClass('test-mode')) {
    return swalError('Đây là tài khoản trải nghiệm hãy đăng xuất và đăng ký tài khoản cho riêng bạn');
  }

  if (type === 'tick_youtube') {
    var confirm = await swalConfirm('Hãy thêm email" người quản lý" trước khi oder đơn hàng nhé?');
    if (!confirm) return;
  }

  if (type === 'like_page' && $('#link').val().match(/^1000/) && selectedServer === 'server_3') {
    if (!await swalConfirm('Page profile không nên mua server này, tỉ lệ thiếu cao, kbh, bạn có muốn tiếp tục?')) return;
  }

  if ($('input[name=server]').length && $('input[name="server"]:checked')) {
    // Check server before submit
    var parent = $('input[name="server"]:checked').closest('.radio-server');
    if (parent.hasClass('pause')) return swalError('Server này đang tạm bảo trì. Hãy chọn server khác nhé');
    if (parent.hasClass('slow') && !await swalConfirm('Server này đang bị chậm. Nếu cần nhanh hãy lựa chọn server khác.', 'Tiếp tục', 'Huỷ')) return;
  }

  if (typeof selfValidator === "function") {
    var msg = await selfValidator();
    if (msg === null) return; // null on silent
    if (msg !== true) return swalError(msg);
  }

  // Format fields
  var formatFields = ['#name'];
  formatFields.forEach(function(field) {
    if (!$(field).length) return;
    var value = $(field).val();
    if (value.length > 150) value = value.substr(0, 140);
    $(field).val(value);
  });

  if ($('#switch_multi_order').is(':checked')) return preparePurchaseMultiOrder();

  var url = $(this).attr("action");
  var buttonText = $("#submit").html();
  $("#submit").attr("disabled", true).html(buttonText + ' <i class="fas fa-spinner fa-spin"></i>');

  swalLoading('Đang xử lý, vui lòng chờ');

  $.ajax({
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function (data) {
      if (data.status == 1) {
        swalSuccess(data.msg);

        onCreateOrderSuccess();

        $([document.documentElement, document.body]).animate({
          scrollTop: $("#formUserAction").offset().top - 300
        }, 500);
      }
      else {
        if (data.msg && data.msg.toString().includes('nhấn "Tiếp tục mua" để thử lại')) {
          swalConfirm(data.msg, 'Tiếp tục mua').then(function (confirm) {
            if (confirm) $("#formUserAction").trigger('submit');
          })
        } else {
          swalError(data.msg);
        }
      }
    },
    error: function (xhr) {
      console.error(xhr);
      swalError('Quá thời gian chờ khi tạo đơn, đơn hàng của bạn đang được xử lý.' +
          ' Vui lòng đợi 1 vài phút rồi tải lại trang, nếu đơn hàng chưa được tạo thì mới mua đơn mới!');
    },
    complete: function() {
      $("#submit").removeAttr("disabled").html(buttonText);
    }
  });
});

$('input').on('paste', function () {
  var that = this;
  setTimeout(function () {
    $(that).blur();
  }, 10);
});

function applyDiscount(total) {
  $('#discount-status').attr('class', '');

  if (!sDiscount) return total;
  if (total < sDiscount.min_order) {
    $('#discount-status').addClass('text-danger').html(`Vui lòng tạo đơn tối thiểu
        <span>${formatMoney(sDiscount.min_order, 'd')}</span> để sử dụng mã giảm giá này!`);
    return total;
  }

  var willDiscount = Math.floor(total * (sDiscount.discount_percent / 100));
  if (willDiscount > sDiscount.max_discount) willDiscount = sDiscount.max_discount;

  $('#discount-status').addClass('text-success').html(`Mã giảm giá đã được áp dụng! `+
    `Bạn được giảm <span>${formatMoney(willDiscount, 'd')}</span>`);

  console.log(`Apply discount: ${total} - ${willDiscount} = ${total - willDiscount}`);
  return total - willDiscount;
}

$("#count").change(function () {
  if (typeof selfCalculatorPrice === "function") return selfCalculatorPrice();

  var count = $(this).val();
  var price = $("#price").val();
  var total;
  if (!(count > 0)) return toastr.error("Số lượng không được bé hơn 0");
  if (type === 'view_live_v2') {
    var minuteElement = $('#minutes');
    var minutes = parseInt(minuteElement.val());

    var minMinute = parseInt(minuteElement.attr('min'));
    var maxMinute = parseInt(minuteElement.attr('max'));

    // Case has minutes
    if (minutes < minMinute || minutes > maxMinute) {
      toastr.error("Số phút xem video chưa hợp lệ (" +minMinute+ " - " +maxMinute+ ")");
      return;
    } else {
      total = Number(count) * Number(price) * Number(minutes);
    }
  } else if (type === 'view_live') {
    var selectedMinutes = parseInt($('#minutes').val());
    total = Number(count) * Number(price) * selectedMinutes;
  } else {
    total = Number(count) * Number(price);
  }

  if (type === 'view_telegram' && selectedServer === 'server_3') {
    total *= Number($('#formUserAction [name="post_count"]').val());
  }

  if (typeof selectedPrice == "object" && selectedPrice.allow_interval_order && $('#switch_interval_order').is(':checked')) {
    const orderCount = $('#section_interval_order [name=total_order]').val();
    if (orderCount && orderCount > 0) total *= orderCount;
  }

  total = applyDiscount(total);
  total = getOrderTotal(total);

  $("#total").val(formatMoney(total, ' VND'));
  toastr.success("Cập nhật giá thành công");
});

$("#cookie").change(function () {
  var cookie = $("#cookie").val();

  if (!cookie) return;

  toastr.info("Đang get info...");
  $.ajax({
    type: "POST",
    url: "/facebook/get_cookie",
    data: {cookie: cookie},
    success: function (response) {
      if (response.status == 1) {
        $("#name").val(response.data.name);
        $("#uid").val(response.data.uid);
        toastr.success("Get thông tin cookie thành công");
      } else {
        toastr.error(response.msg);
      }
    }
  });
});
$(document).on("click", ".btn-delete-expired", function () {
  var id = $(this).attr("data-id");
  var type = $(this).attr("data-type");
  swalConfirm().then(confirm => {
    if (!confirm) return;
    $.ajax({
      type: "POST",
      url: '/vip/delete_expired',
      data: {
        id: id,
        type: type
      },
      success: function (response) {
        if (response.status == 1) {
          swalSuccess();
          reloadTable();
        } else {
          swalError(response.msg);
        }
      }
    });
  });
});

$(document).on("click", ".btn-refund-vip", async function () {
  let alertMsg = 'Bạn có chắc chắn muốn thực thi?';
  if (type.match(/twitter/)) alertMsg = 'Hệ thống sẽ xóa uid khỏi website, không hoàn tiền dịch vụ này?';

  if (!await swalConfirm(alertMsg)) return;

  var id = $(this).attr("data-id");
  swalLoading();
  $.ajax({
    type: "POST",
    url: '/vip/refund',
    data: {id: id},
    success: function (response) {
      if (response.status != 1) return swalError(response.msg);
      swalSuccess();
      reloadTable();
    }
  });
});

$(document).on("click", ".btn-re-check", async function() {
  var tType = $(this).data('type');
  var server = $(this).data('server');
  if (tType === 'follow' && server == 'server_1') {
    if (!await swalConfirm('Hãy kiểm tra lại nút theo dõi và bấm tiếp tục?')) return;
  }

  swalLoading('Đang thực thi...');
  var id = $(this).attr("data-id");
  $.ajax({
    type: "POST",
    url: `/facebook/check_id`,
    data: {id: id},
    success: function(response) {
      if(response.status === 1) {
        swalSuccess('Thao thác thành công, chúng tôi sẽ kiểm tra lại trong thời gian sớm nhất');
        reloadTable();
      } else {
        swalError(response.msg);
      }
    }
  });
});

$(document).on("click",".btn-refund-buff", async function() {
  var confirm = await swalConfirm('Huỷ đơn sẽ hoàn tiền số lượng chưa chạy và trừ 2k phí?');
  if (!confirm) return;
  swalLoading();
  var id = $(this).attr("data-id");
  $.ajax({
    type: "POST",
    url: `/facebook/refund`,
    data: {id: id},
    success: function(response) {
      if(response.status === 1) {
        swalSuccess();
        reloadTable();
      } else {
        swalError(response.msg);
      }
    }
  });
});

$(document).on("click",".btn-delete-buff",function() {
  toastr.info('Đang thực thi...');
  var id = $(this).attr("data-id");
  $.ajax({
    type: "POST",
    url: `/facebook/delete-m`,
    data: {id: id},
    success: function(response) {
      if(response.status === 1) {
        swalSuccess();
        reloadTable();
      } else {
        swalError(response.msg);
      }
    }
  });
});

$('#price').keyup(function () {
  $('#count').trigger('change');
});

$('.btn-view-history').click(function() {
  var target = $(this).data('target');
  $('a.nav-link[href="' +target+ '"]').trigger('click');
  $([document.documentElement, document.body]).animate({
    scrollTop: $(target).offset().top - 100
  }, 500);
});

$('input[name="reaction_on"]').change(function() {
  var willShow = $(this).is(':checked');
  $(this).closest('form').find('.area-reaction')[willShow ? 'show' : 'hide'](500);
});

$('select[name="reaction_with"]').change(function() {
  $(this).closest('form').find('.reaction-with-wrapper').hide(500);
  var value = $(this).val();
  var hasGender = value === 'FRIEND';
  $(this).closest('form').find('.wrapper-gender')[hasGender ? 'show' : 'hide'](500);

  if (typeof onChangeReactionWith === "function") onChangeReactionWith(this, value);
});

$('.has_count').keyup(function() {
  $($(this).data('counter')).html(countLine($(this).val()));
});

function uniqueArray(array) {
  try {
    return array.filter(function(value, index, self) {
      return self.indexOf(value) === index;
    });
  } catch (e) {
    console.error(e);
    return [];
  }
}

$('[name="list_comment"], [name="comment"], [name=comments]').change(function() {
  $(this).val(getContentArray($(this).val()).join("\n"));
});

// Lay post uid danh do cac dich vu mua #uid
async function getPostUid(input, silent = true) {
  let data = formatLink(input);
  if (data.match(/(^[\d_]+$|^pfbid\w+)/)) return [true, data];

  let uid;
  if (data.match(/facebook\.com|fb\.watch/)) {
    let info;

    if(data.includes("/posts/") || data.includes("/videos/")) {
      info = data.split("/");
      uid = info[info.length-1];
      if (uid.includes("?")) uid = uid.split("?")[0];
      if (!uid) uid = info[info.length-2];
    } else if(data.includes("fbid=")) {
      uid = explode_by("fbid=","&",data);
    } else if(data.includes("story_fbid=")) {
      uid = explode_by("story_fbid=","&",data);
    } else if (data.includes("/photos/")) {
      info = data.split("/");
      uid = info[info.length-2];
    } else if (data.match(/\/permalink\/([0-9]+)/)) {
      uid = data.match(/\/permalink\/([0-9]+)/)[1];
    } else if (data.match(/watch\/live\/\?v=/)) {
      uid = data.match(/watch\/live\/\?v=([0-9]+)/)[1];
    } else if (data.match(/watch\/\?v=/)) {
      uid = data.match(/watch\/\?v=([0-9]+)/)[1];
    } else if (data.match(/\/stories\//)) {
      uid = data.split('?')[0];
    } else if (data.match(/\/reel\//)) {
      let match1 = data.match(/reel\/(\d+)/);
      if (match1) uid = match1[1];
    } else if (data.match(/\/events\//)) {
      let match1 = data.match(/events\/(\d+)/);
      if (match1) uid = match1[1];
    } else if (data.match(/(fb\.watch|facebook\.com\/share\/p)/)) {
      if (!silent) swalBlock('Đang get link...');
      let apiResponse = await callAjaxPost('/facebook/get_link_uid', {link: data});
      if (!silent) swalClose();
      if (!apiResponse) return [false, apiResponse.msg];

      return [true, apiResponse.msg];
    }
  }
  else if(data.includes("instagram.com")) {
    let match = data.match(/com\/p\/([a-zA-Z0-9_.-]+)/);
    if (!match) match = data.match(/com\/([a-zA-Z0-9_.-]+)/);
    if (match) uid = match[1];
  }

  if (!uid) return [false, 'Không nhận ra uid'];

  if ($('#switch_uid_reply').is(':checked')) {
    let match = input.match(/reply_comment_id=([0-9]+)/);
    if (!match) match = input.match(/comment_id=([0-9]+)/);
    if (match) uid = uid + '_' + match[1];
  }

  return [true, uid];
}

// Lay profile info danh cho các dich vu mua bang info #link
async function getProfileInfo(input, silent = true) {
  let link;

  if (input.includes("facebook.com") || input.includes('fb.com')) {
    if (input.includes("profile.php") && !(typeof type !== "undefined" && type === 'review')) {
      if (input.includes("&")) link = explode_by("profile.php?id=","&",input);
      else link = input.replace('https://www.facebook.com/profile.php?id=', '');

      return [true, {
        id: link,
        name: 'Tên khách hàng'
      }]
    }
    else {
      let username = "";
      if(input.includes("/posts/")) {
        username = explode_by("facebook.com/","/posts/",input);
      } else if(input.includes("/videos/")) {
        username = explode_by("facebook.com/","/videos/",input);
      } else {
        let regex = /(facebook|fb)\.com\/(.*)/gm;
        let m;
        while ((m = regex.exec(input)) !== null) {
          if (m.index === regex.lastIndex) {
            regex.lastIndex++;
          }
          m.forEach((match, groupIndex) => {
            if(groupIndex === 2) username = match;
          });
        }
      }
      if (!username) return [false, 'Không nhận ra link'];

      if (!silent) swalBlock('Đang get link...');
      return await getFbInfoFromUsername(username);
    }
  }
  else if(input.includes("instagram")) {
    if (!input.includes("/p/")) {
      link = explode_by("instagram.com/", "/", input);

      return [true, {
        id: link,
        name: 'Tên khách hàng'
      }]
    } else {
      return [false, 'Không nhận ra link'];
    }
  }
  else {
    if (!silent) swalBlock('Đang get link...');
    return await getFbInfoFromUsername(input);
  }
}

// Like comment
async function getCommentLink(input) {
  // Neu da dung dinh dang
  if (input.match(/\w+_\d+/)) return [true, input];

  // output should be {post_id}_{comment_id}
  let [success, post_id] = await getPostUid(input, false);
  if (success) {
    let match = input.match(/reply_comment_id=([0-9]+)/);
    if (!match) match = input.match(/comment_id=([0-9]+)/);
    if (match) return [true, post_id + '_' + match[1]];
  }

  return [false, 'Không nhận dạng được link!'];
}

async function getTiktokLink(link, silent = true) {
  if (link.match(/tiktok\.com\/([^\/]+)\/video\/([0-9]+)/)) {
    return [true, formatLink(link)];
  }
  else if (link.match(/tiktok\.com\/@([\w\-._]+)/)) {
    return [true, formatLink(link)];
  }

  if (!silent) swalLoading("Đang get link...");
  let data = await callAjaxPost('/tiktok/get-tiktok-info', { link });

  if (data.status == 1) return [true, data.msg];
  return [false, data.msg];
}

//
function reFormatUrl(input) {
  if (typeof type !== "undefined" && !type.match(/(youtube|view_live_v2|view_other|video)/) && input.includes('?')) return [true, formatLink(input)];

  return [true, input];
}

// Nhung dich vu mua theo id post
$(document).on("change", "#uid", async function() {
  let inputText = $(this).val();
  if ($('#url').length) $('#url').val(inputText);

  let [success, uid] = await getPostUid(inputText, false);

  if (success) {
    $("#uid").val(uid);
    if (typeof toastr !== "undefined") toastr.success("Cập nhật objectId thành công");
  } else {
    if (typeof toastr !== "undefined" && inputText) toastr.error("Không nhận ra uid");
  }
});

// Post id, thuong la bu bai
$(document).on("change", ".post-id", async function() {
  let [success, uid] = await getPostUid($(this).val(), false);

  if (success) $(this).val(uid);
});

// Dac biet trong comment link
$(document).on("change", "#comment_link", async function() {
  let [success, data] = await getCommentLink($(this).val());
  if (!success) return toastr.error(data);

  $(this).val(data);
  toastr.success('Cập nhật comment ID thành công');
});

// Cac dich vu mua bang URL
$(document).on("change", "#url", function() {
  let url = $(this).val();

  let [success, newUrl] = reFormatUrl(url);
  if (success && newUrl != url) $(this).val(newUrl);
});

// nhung dich vu theo profile/page/group
$(document).on("change", "#link", function() {
  getProfileInfo($(this).val(), false).then(response => {
    swalClose();

    let [success, data] = response;
    if (!success) {
      toastr.error(data);
      $('#user_input_uid').show();
      return;
    }

    $("#link").val(data.id);
    if ($("#name").length) $("#name").val(data.name || 'Tên khách hàng');
    toastr.success("Cập nhật link thành công");
    $('#user_input_uid').hide();
  });
});

async function getFbInfoFromUsername(username) {
  let data = await callAjaxPost('/api/tools/get_uid', { username });

  if (data.status == 1) return [true, data.data];
  return [false, data.msg];
}

function formatLink(link) {
  link = link.toString();
  if (!link.includes('?') || link.match(/\?fbid|\?story_fbid|watch\//) || link.includes('?story_fbid')) return link;
  return link.split("?")[0];
}

function onCreateOrderSuccess(resetForm = true) {
  if (datatableLog || datatableVip || typeof allPrices !== "undefined") {
    reloadTable();
    sDiscount = null;
    checkDiscount();

    if (typeof app === "undefined" && resetForm) {
      $('#formUserAction').trigger("reset");

      if ($('input[name="server"]').length) {
        if (!$('.radio-server input[type="radio"][name="server"]:checked').val())
          $('.radio-server:not(.pause) input[name="server"]').first().prop('checked', true);
        $('input[name="server"]:checked').trigger('change');
      }
    }
    if (type === 'view_live_v2') $('[name="server_id"]').trigger('change');
    if (typeof selectedServer !== "undefined") $(`input[name="server"][value="${selectedServer}"]`).prop('checked', true).trigger('change');
  }
}

function changePurchaseMultiOrderStatus(showStartBtn = true) {
  $('.multi_order_btn_start')[showStartBtn ? 'show' : 'hide']();
  $('#multi_order_btn_stop')[!showStartBtn ? 'show' : 'hide']();
}

function renderText(text) {
  return ejs.render('<%= text %>', {text})
}

async function preparePurchaseMultiOrder() {
  changePurchaseMultiOrderStatus(true);

  multiOrderData.purchaseData = [];

  const uidElement = $(multiOrderData.uidElementSelector);
  if (!uidElement.length) return;
  uidElement.val('');

  const listUid = getContentArray($('#list_uid').val());

  $('#modalMultiOrder').modal('show');
  $('#multi_order_current_uid').text('N/A');
  $('#multi_order_progress').text('N/A');

  let index = 1;
  for await (let string of listUid) {
    swalLoading(`Đang get link ${index}/${listUid.length}`);

    let purchaseInfo = await mo_getPurchaseInfo(string);
    multiOrderData.purchaseData.push(purchaseInfo);
    index++;

    mo_showPurchaseInfo();
  }

  swalSuccess('Get UID hoàn tất, vui lòng kiểm tra lại các đơn hàng sẽ tạo trước khi tạo đơn!');
}

async function mo_getPurchaseInfo(string) {
  let purchaseInfo = {
    originId: string,
    purchaseId: '',
    purchaseName: '',
    errorMsg: '',
    uidError: false,
    success: false,
  }

  if (multiOrderData.idMap[string]) {
    // Using data from cache
    purchaseInfo.purchaseId = multiOrderData.idMap[string].purchaseId;
    purchaseInfo.purchaseName = multiOrderData.idMap[string].purchaseName;
  }
  else {
    let success, data;
    switch (multiOrderData.elementType) {
      case 'uid':
        [success, data] = await getPostUid(string);
        if (!success) {
          purchaseInfo.errorMsg = data;
        } else {
          purchaseInfo.purchaseId = data;
        }
        break;

      case 'link':
        [success, data] = await getProfileInfo(string);
        if (!success) {
          purchaseInfo.errorMsg = data;
        } else {
          purchaseInfo.purchaseId = data.id;
          purchaseInfo.purchaseName = data.name;
        }
        break;

      case 'comment_link':
        [success, data] = await getCommentLink(string);
        if (!success) {
          purchaseInfo.errorMsg = data;
        } else {
          purchaseInfo.purchaseId = data;
        }
        break;

      case 'url':
        [success, data] = await reFormatUrl(string);
        if (!success) {
          purchaseInfo.errorMsg = data;
        } else {
          purchaseInfo.purchaseId = data;
        }
        break;

      case 'tiktok_post_link':
        [success, data] = await getTiktokLink(string);
        if (!success) {
          purchaseInfo.errorMsg = data;
        } else {
          purchaseInfo.purchaseId = data;
        }
        break;

      default:
        purchaseInfo.purchaseId = string;
        break;
    }

    if (purchaseInfo.purchaseId) multiOrderData.idMap[string] = purchaseInfo;
    else purchaseInfo.uidError = true;
  }

  return purchaseInfo;
}

function mo_showPurchaseInfo() {
  $('#modalMultiOrder tbody').html('');

  multiOrderData.purchaseData.forEach((purchaseInfo, index) => {
    // Append data to table
    let htmlStatus = '';
    if (purchaseInfo.errorMsg) htmlStatus = `<span class="text-danger">Lỗi: ${ renderText(purchaseInfo.errorMsg) }</span>`;
    if (purchaseInfo.success) htmlStatus = `<span class="text-success">OK</span>`;

    let extraText = '';
    if (purchaseInfo.purchaseName) extraText = ` (${purchaseInfo.purchaseName})`;
    let td2 = `<td class="text-success text-break-line">${ renderText(purchaseInfo.purchaseId + extraText) }</td>`;

    if (purchaseInfo.uidError) {
      td2 = `<td class="text-success"><button class="btn btn-success multi_order_btn_get_uid" data-index="${index}">Get UID</button></td>`
    }

    $('#modalMultiOrder tbody').append(
        `
            <tr>
              <td class="text-primary text-break-line">${ renderText(purchaseInfo.originId) }</td>
              ${td2}
              <td class="text-warning">${ formatMoney(multiOrderData.orderSubTotal) }VND</td>
              <td>${ htmlStatus }</td>
            </tr>
        `
    );
  })
}

function getOrderTotal(total) {
  if ($('#switch_multi_order').is(':checked')) {
    const totalOrder = countLine($('#list_uid').val());
    multiOrderData.orderSubTotal = Number(total);
    total *= totalOrder;
    $("#total")
        .closest('.form-group')
        .find('label')
        .html(`Tổng Giá (<span class="text-success">${formatMoney(totalOrder)} đơn, mỗi đơn: ${formatMoney(multiOrderData.orderSubTotal)}VND</span>)`)
  }

  return total;
}



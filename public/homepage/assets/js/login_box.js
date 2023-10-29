var scrollDelay, requesting = false;
function changeTab(tab, navigate = false) {
  if (typeof scrollDelay === "undefined") scrollDelay = 500;
  $('.auth-widget').hide();
  $('#' + tab).show();
  if (navigate) {
    $([document.documentElement, document.body]).animate({
      scrollTop: $('#' + tab).offset().top - 100
    }, scrollDelay);
  }
}

// $(".auth-widget form").submit(function(e) {
//   e.preventDefault();
//   if (requesting) return swalError('Thao tác quá nhanh, vui lòng chậm lại!');

//   var isRegister = $(this).attr('action').match('register');
//   if (isRegister && $('.area-captcha').length && !grecaptcha.getResponse()) {
//     return swalError('Bạn chưa xác nhận capcha');
//   }

//   if ($(this).find('[name="re_password"]').length) {
//     let password = $(this).find('[name="password"]').val();
//     let re_password = $(this).find('[name="re_password"]').val();

//     if (password !== re_password) return swalError('Mật khẩu xác nhận chưa chính xác!');
//   }

//   swalLoading('Đang xử lý...', false);
//   var url = $(this).attr("action");
//   $(this).find('button[type="submit"]').prop('disabled', true);
//   var that = this;

//   requesting = true;
//   $.ajax({
//     type: "POST",
//     url: url,
//     data: $(this).serialize(),
//     success: function(data) {
//       $(that).find('button[type="submit"]').prop('disabled', false);

//       if (data.telegram_otp) {
//         swal.close();
//         toggleOtpModal(true);
//         $('#otp').val('');
//         return;
//       }

//       if(data.status !== 1) {
//         if (isRegister && typeof grecaptcha !== "undefined" && grecaptcha) grecaptcha.reset();
//         return swalError(data.msg);
//       }

//       swalSuccess(data.msg);
//       window.location.href = '/home';
//     },
//     complete: function () {
//       requesting = false;
//     }
//   });
// });

// function toggleOtpModal(show = false) {
//   $('body')[show ? 'addClass' : 'removeClass']('modal-open');

//   $('#modalOTP')[show ? 'addClass' : 'removeClass']('show');
//   $('.modal-backdrop-otp')[show ? 'addClass' : 'removeClass']('show');
// }

$(window).ready(function() {
  $('.text-lower').change(function() {
    $(this).val($(this).val().toLowerCase());
  });

  $('.btn-confirm-otp').click(function() {
    var otp = $('#otp').val();
    if (!otp.match(/^\d{6}$/)) return swalError('Mã OTP phải bao gồm 6 số!');

    $.post('/login/auth_otp', {otp: otp}).done(function(response) {
      if (response.status) {
        swalSuccess(response.msg);
        window.location.href = '/home';
      } else {
        swalError(response.msg);
        if (response.msg && response.msg.match(/OTP sai quá|đã hết hạn/)) toggleOtpModal(false);
      }
    });
  });

  $('.modal-backdrop-otp, .modal [data-dismiss="modal"]').click(function() {
    toggleOtpModal(false);
  });
});
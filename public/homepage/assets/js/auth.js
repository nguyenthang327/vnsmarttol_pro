var requesting = false;
$("#formAuth").submit(function(e) {
  e.preventDefault();
  if (requesting) return swalError('Thao tác quá nhanh, vui lòng chậm lại!');

  if (window.location.pathname.match('/register/')) {
    var password = $('input[name="password"]').val();
    var confirm = $('input[name="re_password"]').val();
    if (password !== confirm) {
      swalError("Xác nhận mật khẩu không đúng");
      return;
    }

    // if ($('.area-captcha').length && !grecaptcha.getResponse()) return swalError('Bạn chưa xác nhận capcha');
  }

  swalLoading('Đang xử lý...', false);
  var url = $(this).attr("action");
  $('button[type="submit"]').prop('disabled', true);

  requesting = true;
  $.ajax({
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function(data) {
      $('button[type="submit"]').prop('disabled', false);
      if(data.status === 1) {

        // if (data.telegram_otp) {
        //   swal.close();
        //   $('#modalOTP').modal('show');
        //   $('#otp').val('');
        //   return;
        // }

        swalSuccess(data.msg);
        var pathName = window.location.pathname;
        if (pathName.indexOf('login') !== -1 || pathName.indexOf('register') !== -1 || pathName.indexOf('logout') !== -1) {
          window.location.href = '/home';
        } else {
          window.location.reload();
        }
      } else {
        swalError(data.msg);
        // if (window.location.pathname.match('/register/') && $('.area-captcha').length) grecaptcha.reset();
      }
      // if(data.status !== 1) {
      //   if (isRegister && typeof grecaptcha !== "undefined" && grecaptcha) grecaptcha.reset();
      //   return swalError(data.msg);
      // }

      // swalSuccess(data.msg);
      // window.location.href = '/home';
    },
    error: function(xhr){
      requesting = false;
      var errorMsg = '';
      if(xhr.status == 422){
        var errors  = Object.values(xhr.responseJSON.errors);
        errors.forEach((item, index) => {
          errorMsg += item + ' ';
        });
        
      }
      $('button[type="submit"]').prop('disabled', false);
      return swalError(errorMsg);
    },
    complete: function () {
      requesting = false;
    }
  });
});


$(window).ready(function() {
  $('.text-lower').change(function() {
    $(this).val($(this).val().toLowerCase());
  });

  $('.btn-confirm-otp').click(function() {
    var otp = $('#otp').val();
    if (!otp.match(/^\d{6}$/)) return swalError('Mã OTP phải bao gồm 6 số!');

    $.post('/login/auth_otp', {otp: otp}).done(function(response) {
      if (response.status) {
        window.location.href = '/home';
      } else {
        swalError(response.msg);
        if (response.msg && response.msg.match(/OTP sai quá|đã hết hạn/)) $('#modalOTP').modal('hide');
      }
    });
  });
});




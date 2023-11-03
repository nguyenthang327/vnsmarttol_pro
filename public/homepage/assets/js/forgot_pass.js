$("#emailForm").submit(function(e) {
  e.preventDefault();
  var url = $(this).attr("action");
  swalLoading('Đang xử lý, vui lòng chờ...');
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function(data) {
      if (data.status == 1) {
        swalSuccess(data.msg);
        $("#modalChangePass input[name=user_id]").val(data.data);
        $('#modalChangePass').modal('show');
      } else {
        swalError(data.msg);
        $("#modalChangePass input[name=user_id]").val('');
        if (data.msg.match(/Bạn đang có một/)) $('#modalChangePass').modal('show');
      }
    },
    error: function(xhr){
      swalError('Xảy ra lỗi, Vui lòng thử lại');
    }
  });
});

$("#passwordForm").submit(function(e) {
  e.preventDefault();
  var url = $(this).attr("action");
  swalLoading('Đang xử lý, vui lòng chờ...');
  console.log($(this).serialize());
  $.ajax(
    {
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function(data) {
      if (data.status == 1) {
        // $("#modalChangePass input[name=user_id]").value(data.data);
        swalSuccess(data.msg).then(function() {
          window.location.href = '/login';
        });
      } else {
        swalError(data.msg);
      }
    },
    error: function(xhr){
      requesting = false;
      var errorMsg = 'Lỗi';
      if(xhr.status == 422){
        errorMsg = '';
        var errors  = Object.values(xhr.responseJSON.errors);
        errors.forEach((item, index) => {
          errorMsg += item + ' ';
        });
        
      }
      return swalError(errorMsg);
    }
  });
});
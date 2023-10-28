$("#emailForm").submit(function(e) {
  e.preventDefault();
  var url = $(this).attr("action");
  swalLoading('Đang xử lý, vui lòng chờ...');
  $.ajax({
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function(data) {
      if (data.status == 1) {
        swalSuccess(data.msg);
        $('#modalChangePass').modal('show');
      } else {
        swalError(data.msg);
        if (data.msg.match(/Bạn đang có một/)) $('#modalChangePass').modal('show');
      }
    }
  });
});

$("#passwordForm").submit(function(e) {
  e.preventDefault();
  var url = $(this).attr("action");
  swalLoading('Đang xử lý, vui lòng chờ...');
  $.ajax({
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function(data) {
      if (data.status == 1) {
        swalSuccess(data.msg).then(function() {
          window.location.href = '/login';
        });
      } else {
        swalError(data.msg);
      }
    }
  });
});
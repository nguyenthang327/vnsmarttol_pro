$('.btn-try').click(function(e) {
    e.preventDefault();

    swalTimeOut('Bạn chỉ có thể xem dịch vụ và giá hệ thống, không thể thao tác mua bán và giao dịch trên tài khoản trải nghiệm',
        'question', 3000, 'Tiếp tục', 'Bỏ qua').then(function() {
        swalLoading();

        $.post('/try').done(function(response) {
            if (response.status) {
                swalSuccess(response.msg);
                window.location.href = '/home';
            } else {
                swalError(response.msg);
            }
        });
    });
})
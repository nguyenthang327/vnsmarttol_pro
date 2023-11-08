$(document).ready(function() {
    $('#btn_generate_browser_id').click(function() {
        toastr.info('Đang xử lý...');

        const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
            .then(FingerprintJS => FingerprintJS.load())

        // Get the visitor identifier when you need it.
        fpPromise
            .then(fp => fp.get())
            .then(result => {
                console.log('visitorId', result)
                $('#vcb_browser_id').val(result.visitorId);
                toastr.success('Đã khởi tạo thành công!');
            })
    });

    ckEditor('payment_note');
    ckEditor('payment_popup_content');
    ckEditor('referral_note');

    $('.btn[type=submit]').click(function() {
        // required_text
        var requiredFields = [];
        // Check all required fields
        $('input,textarea,select').filter('[required]').each(function() {
            if ($(this).val() == '') {
                requiredFields.push($(this).closest('.form-group').find('label').first().html());

                // Open div collapse
                var collapse = $(this).closest('.collapse');
                if (!collapse.hasClass('show')) {
                    collapse.addClass('show');
                    collapse.prev().removeClass('collapsed');
                }
            }
        })

        if (requiredFields.length) {
            $('#required_area').show();
            $('#required_area ul').html('');
            requiredFields.forEach(label => {
                $('#required_area ul').append(`<li>${label}</li>`);
            })
        } else {
            $('#required_area').hide();
        }
    });

    $('[name=menu_color]').change(function() {
        var value = $(this).val();
        $('body').removeClass (function (index, className) {
            console.log(className)
            return (className.match (/(^|\s)menu-\S+/g) || []).join(' ');
        }).addClass('menu-' + value);
    });

    $('.input-daterange input').each(function() {
        $(this).datetimepicker({
            format: momentFormat.full_reverse,
            locale: 'vi'
        });
    });

    $('.btn-delete-range').click(function() {
        $(this).closest('.input-daterange').find('.form-control').val('');
    });

    ckEditor('level_note_content');
    $('.btn-edit-level-note').click(function() {
        var level = $(this).data('level');
        callAjaxPost(baseUrl + '/settings/get_level_note', {level: level}).then(function(data) {
            var modal = $('#modalLevelNote');
            modal.find('[name="level"]').val(level);
            updateSingleEditor('level_note_content', data.note || '');
            modal.modal('show');
        });
    });

    $('.change-css').on('input', function() {
        let match = $(this).attr('name').match(/\[([^\]]+)]/);
        if (!match) return;

        var element = $(this).data('element');
        let cssType = $(this).data('css');
        let value = $(this).val();

        $(element).css(cssType, value);
    });
});

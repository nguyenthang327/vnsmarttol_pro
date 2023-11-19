<!DOCTYPE html>
<html lang="vi">

<head>
    <title>VNSMARTTOL.COM | Hệ thống Seeding hàng đầu Việt Nam</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('homepage/assets/images/favicon.ico') }}" />
    <link rel="apple-touch-icon" href="{{ asset('homepage/assets/images/favicon.ico') }}" />
    <meta name="description"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok vnsmarttol.com vnsmarttol" />
    <meta itemprop="description"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok vnsmarttol.com vnsmarttol" />
    <meta name=keyword
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng...,vnsmarttol.com,vnsmarttol" />
    <meta property="og:title" content="VNSMARTTOL.COM HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING" />
    <meta property="og:site_name" content="VNSMARTTOL.COM HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING" />
    <meta property="og:description"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok" />
    <meta property="og:type" content="services" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:keywords"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng..." />
    <meta property="og:image" content="{{ asset('homepage/assets/images/online-marketing.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ Auth::user()->api }}">
    <!-- Core css -->
    <link href="{{ asset('management/assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('management/assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <!-- page css -->
    <link href="{{ asset('management/assets/css/custom.css') }}" rel="stylesheet">
    @yield('css_page')

    <style type="text/css">
        .nav-wrap,
        .menu_header {
            background-color: #ffffff;
        }
    </style>

    <style>
        @media (max-width: 768px) {
            .mb-only {
                display: block;
            }

            .pc-only {
                display: none;
            }
        }

        @media (min-width: 767px) {
            .mb-only {
                display: none;
            }

            .pc-only {
                display: block;
            }
        }
    </style>

    <!-- Core Vendors JS -->
    <script src="{{ asset('management/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('management/assets/plugins/moment/moment.min.js') }}" type="text/javascript"></script>
    <script>
        var baseUrl = '';
        var type = 'home';
        var site_active = "dashboard";
    </script>
</head>

<body class="menu-default">
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('management.layouts.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('management.layouts.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                @yield('subHeader')

                <!-- Content Wrapper START -->
                @yield('content')

                <!-- page js -->
                <script src="{{ asset('management/assets/plugins/js.cookie/js.cookie.min.js') }}"></script>

                <script>
                    var lastNotify = 0;
                    var newestNotifyId = '2316';

                    $(document).ready(function() {


                        $('.notify-item').each(function() {
                            var time = moment(new Date($(this).data('time')));

                            $(this).find('.td-time').html(time.format('DD/MM'))

                            // Show badge new
                            if (time.diff(moment(), 'hour') > -24) $(this).addClass('new');

                            var content = $(this).find('td.content').html();
                            var newContent;
                            if (content.match(/([0-9,]+)VND/)) {
                                var match = content.match(/([0-9,]+)VND/);
                                newContent = content.replace(match[0], `<span class="text-money">${match[0]}</span>`);
                            }
                            if (newContent) $(this).find('td.content').html(newContent);
                        })

                        $('.feed-time').each(function() {
                            var time = moment(new Date($(this).data('time')));
                            $(this).html(time.format('DD/MM') + ' lúc ' + time.format('HH:mm'));
                        });

                        $('.btn-view-notify').click(function() {
                            $('#userNotifyModal').modal('show');
                            if ($.fn.dataTable.isDataTable('#table-user-notifications')) return;

                            $('#table-user-notifications').DataTable({
                                responsive: false,
                                searchDelay: 500,
                                processing: true,
                                serverSide: true,
                                ajax: xAjax(`/ajax/user_notifications`),
                                order: [
                                    [1, "desc"]
                                ],
                                columns: [
                                    makeColumn('Nội dung', 'content', components.table.text_primary),
                                    definedColumns.created_at
                                ]
                            });
                        });
                    });

                    $('.feed-image img').click(function() {
                        $('#modalZoomImage img').attr('src', $(this).attr('src'));
                        $('#modalZoomImage').modal('show');
                    })
                </script>

                <!-- Content Wrapper END -->

                <!-- Footer START -->
                @include('management.layouts.footer')
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
        </div>
    </div>
    <style>
        .icon-middle {
            position: fixed;
            right: 15px;
            bottom: 200px;
            transition: all .2s;
            z-index: 5;
        }

        .icon-middle .icon {
            margin-bottom: 10px;
            z-index: 1;
            width: 55px;
            height: 55px;
            background: #3697D7;
            color: #fff;
            display: inherit;
            text-align: center;
            line-height: 53px;
            cursor: pointer;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: all .3s;
        }

        .icon-middle .icon:hover {
            box-shadow: 0 8px 25px -8px #071666;
        }

        .icon-middle .icon img {
            width: auto;
            max-width: 100%;
        }

        .icon-middle .icon img.icon-svg {
            width: calc(100% - 25px);
            vertical-align: middle;
        }

        .icon-middle i {
            font-size: 23px;
            padding-top: 15px
        }

        .mini-icons .icon-middle {
            right: -60px;
        }

        #middle-control {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 40px;
            height: 40px;
            position: fixed;
            bottom: 30px;
            right: 20px;
            cursor: pointer;
            z-index: 90;
            background: #3697D7;
            -webkit-box-shadow: 0 0 15px 1px rgba(69, 65, 78, 0.2);
            box-shadow: 0 0 15px 1px rgba(69, 65, 78, 0.2);
            opacity: 1;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            border-radius: 4px;
            padding: 9px;
        }

        #middle-control i {
            font-size: 21px;
            color: #ffffff;
        }
    </style>
    <div class="icon-middle">
        <a class="icon" href="tel:0346999645" data-toggle="tooltip" data-placement="left" title="Liên Hệ">
            <img src="{{ asset('management/assets/images/icon_phone.svg') }}" alt="" class="icon-svg" />
        </a>
    </div>

    <div id="middle-control" data-toggle="tooltip" data-placement="left" title="Bạn cần hỗ trợ?">
        <img src="{{ asset('management/assets/images/icon_comment.svg') }}" alt="" class="icon-svg"
            style="vertical-align: top" />
    </div>

    <script>
        var miniIcon = !!localStorage.getItem('miniIcon');
        $('#middle-control').click(function() {
            miniIcon = !miniIcon;
            localStorage.setItem('miniIcon', miniIcon ? 'true' : '');
            $('body')[miniIcon ? 'addClass' : 'removeClass']('mini-icons');
        });
        // Mini icon if selected or mobile
        if (localStorage.getItem('miniIcon') || $(window).width() < 768) {
            $('body').addClass('mini-icons');
            miniIcon = true;
        }
    </script>

    <!-- page js -->
    <script src="{{ asset('management/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('management/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- page js -->
    <link rel="stylesheet" href="{{ asset('management/assets/plugins/select2/select2.min.css') }}" />
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/ejs.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/jquery.doubleScroll.js') }}"></script>
    <script src="{{ asset('management/assets/js/init.js') }}"></script>
    <script src="{{ asset('management/assets/js/user.js') }}"></script>
    <!-- site -->
    @yield('js_page')
    <!-- Core JS -->
    <script src="{{ asset('management/assets/js/app.min.js') }}"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslate"></script>
</body>

</html>

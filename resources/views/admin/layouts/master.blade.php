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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

    <style>
        .form-inline input.form-control {
        width: 130px;
        text-align: center;
        font-weight: 600;
        }

        #payment_by_level ul {
        margin-left: 30px;
        }

        #payment_by_level li {
        font-size: 14px;
        margin-bottom: 4px;
        }
    </style>

    <!-- Core Vendors JS -->
    <script src="{{ asset('management/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('management/assets/plugins/moment/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('management/assets/js/preload.js') }}" type="text/javascript"></script>
    <script>
         var baseUrl = '/qladmin';
    </script>
</head>

<body class="menu-default">
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('admin.layouts.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('admin.layouts.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                @yield('subHeader')

                <!-- Content Wrapper START -->
                @yield('content')

                <!-- page js -->
                <script src="{{ asset('management/assets/plugins/js.cookie/js.cookie.min.js') }}"></script>

                <!-- Content Wrapper END -->

                <!-- Footer START -->
                @include('admin.layouts.footer')
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
        </div>
    </div>

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
    <script src="{{ asset('management/assets/plugins/highchart/highcharts.min.js') }}"></script>

    <script src="{{ asset('management/assets/js/admin/admin.js') }}"></script>
    <script src="{{ asset('management/assets/js/admin/dashboard.js') }}"></script>

    <link href="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.js')}}" type="text/javascript"></script>
    <!-- site -->
    @yield('js_page')
    <!-- Core JS -->
    <script src="{{ asset('management/assets/js/app.min.js') }}"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslate"></script>
</body>

</html>

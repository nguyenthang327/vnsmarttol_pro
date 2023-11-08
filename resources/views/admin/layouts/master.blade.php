<!DOCTYPE html>
<html lang="vi">

<head>
    <title>{{ $settingsComposer->title ?? "Hệ thống Seeding hàng đầu Việt Nam" }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $settingsComposer->favicon ?? asset('homepage/assets/images/favicon.ico') }}" />
    <link rel="apple-touch-icon" href="{{ $settingsComposer->favicon ?? asset('homepage/assets/images/favicon.ico') }}" />
    <meta name="description"
        content="{{ $settingsComposer->description }}" />
    <meta itemprop="description"
        content="{{ $settingsComposer->description }}" />
    <meta name=keyword
        content="{{ $settingsComposer->og_keywords }}" />
    <meta property="og:title" content="{{ $settingsComposer->og_title }}" />
    <meta property="og:site_name" content="{{ $settingsComposer->og_site_name }}" />
    <meta property="og:description"
        content="{{ $settingsComposer->og_description }}" />
    <meta property="og:type" content="{{ $settingsComposer->og_type }}" />
    <meta property="og:url" content="{{ $settingsComposer->og_url }}" />
    <meta property="og:keywords"
        content="{{ $settingsComposer->og_keywords }}" />
    <meta property="og:image" content="{{ $settingsComposer->og_image ?? asset('homepage/assets/images/online-marketing.png') }}" />
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
    <script src="{{ asset('management/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/preload.js') }}"></script>
    <script>
        var baseUrl = '/qladmin';
        const currency = 'vnd';
    </script>
</head>

<body class="menu-{{ $settingsComposer->menu_color ?? 'default' }}">
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
    <script src="{{ asset('management/assets/js/jquery.doubleScroll.js') }}"></script>
    <script src="{{ asset('management/assets/js/ejs.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/init.js') }}"></script>
    <script src="{{ asset('management/assets/js/admin/admin.js') }}"></script>
    <!-- site -->
    @yield('js_page')
    <!-- Core JS -->
    <script src="{{ asset('management/assets/js/app.min.js') }}"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslate"></script>
</body>

</html>

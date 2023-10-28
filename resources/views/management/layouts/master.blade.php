<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dịch Vụ Facebook 24h</title>
    <meta name="keywords"
        content="tang like, tăng like, tăng tương tác, tang tuong tac cheo, tuongtaccheo, trao đổi sub, traodoisub, trao doi sub, tăng sub, tang theo doi, tang follow, danh gia page, tang danh gia, tang thanh vien nhom, tang cam xuc bai viet, tang like binh luan, tang theo doi fanpage, tang like fanpage, tang member nhom" />
    <meta name="author" content="WEBSITE DỊCH VỤ MẠNG XÃ HỘI" />
    <meta name="robots" content="WEBSITE DỊCH VỤ MẠNG XÃ HỘI" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Hệ thống tăng like tương tác giá rẻ, tăng theo dõi, tăng follow, tăng comment, tăng trao đổi sub, tuongtaccheo, tangmatlive, tăng tương tác giá rẻ mạng xã hội an toàn tuyệt đối" />
    <meta property="og:title" content="Dịch Vụ Facebook 24h" />
    <meta property="og:description"
        content="Hệ thống tăng like tương tác giá rẻ, tăng theo dõi, tăng follow, tăng comment, tăng trao đổi sub, tuongtaccheo, tangmatlive, tăng tương tác giá rẻ mạng xã hội an toàn tuyệt đối" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="assets/img/home-banner.jpg" />
    <link rel="shortcut icon" type="image/x-icon"
        href="https://i.pinimg.com/originals/41/ff/08/41ff08e482a4314896060bebbe40c46e.jpg">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- Mã nguồn được viết bởi respawn Developer - Nếu bạn có nhu cầu sở hữu 1 website tương tự hãy liên hệ : 0983647058 hoặc fb.com/Quynhkakaz-->
    <link rel="stylesheet" href="{{ asset('management/assets/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('management/assets/font-awesome/css/all.css') }}">
    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('management/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('management/assets/css/skin_color.css') }}">

    <style>
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        respawn {
            padding: 1px;
        }
    </style>

    @yield('css_page')

<body class="hold-transition light-skin sidebar-mini theme-success fixed">
    <div class="wrapper">
        <div id="loader"></div>

        <!-- header -->
        @include('management.layouts.header')
        <!-- / end header -->

        <!-- sidebar -->
        @include('management.layouts.sidebar')
        <!-- / end sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>

            <div class="container-full">
                <!-- Content Header (Page header) -->
                @if(!isset($noBreadcrumb))
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        {{-- breadcrumb --}}
                                        @yield('breadcrumb')
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- content --}}
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        @include('management.layouts.side-demo-panel')


    </div>

    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript">
        function copy(text) {
            document.body.insertAdjacentHTML("beforeend", "<div id=\"copy\" contenteditable>" + text + "</div>")
            document.getElementById("copy").focus();
            document.execCommand("selectAll");
            document.execCommand("copy");
            document.getElementById("copy").remove();
            swal("SUCCESS", "Bạn đã sao chép API thành công", "success");
            event.preventDefault();
        }
    </script>

    <!-- Page Content overlay -->
    <!-- Vendor JS -->
    <script src="{{ asset('management/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('management/assets/icons/feather-icons/feather.min.js') }}"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    {{-- <script src="{{ asset('management/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script> --}}
    <script src="{{ asset('management/assets/vendor_components/date-paginator/moment.min.js') }}"></script>
    <script
        src="{{ asset('management/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('management/assets/vendor_components/date-paginator/bootstrap-datepaginator.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/template.js') }}"></script>
    <script src="{{ asset('management/assets/js/pages/dashboard.js') }}"></script>

    @yield('js_page')

</body>

</html>

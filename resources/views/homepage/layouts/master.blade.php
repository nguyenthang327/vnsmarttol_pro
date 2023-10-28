<!DOCTYPE html>
<html lang="en">

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>VNSMARTTOL PRO | Hệ thống Seeding hàng đầu Việt Nam</title>


    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="apple-touch-icon" href="assets/images/favicon.ico" />

    <meta name="description"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok vnsmarttol pro" />
    <meta itemprop="description"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok vnsmarttol pro" />
    <meta name=keyword
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng...,vnsmarttol pro" />

    <meta property="og:title" content="VNSMARTTOL pro HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING" />
    <meta property="og:site_name" content="VNSMARTTOL pro HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING" />
    <meta property="og:description"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok" />
    <meta property="og:type" content="services" />
    <meta property="og:url" content="index.html" />
    <meta property="og:keywords"
        content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng..." />
    <meta property="og:image"
        content="../s3.ap-northeast-1.amazonaws.com/h.files/images/1641916441312_72B9rctC3t.png" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('homepage') }}/assets/css/icon.css">
    @yield('css_page')
</head>

<body>
    {{-- content --}}
    @yield('content')

    <div class="icon-middle">
        <a class="icon" href="tel:00" data-toggle="tooltip" data-placement="left" title="Liên Hệ">
            <img src="{{ asset('homepage') }}/assets/images/icon_phone.svg" alt="" class="icon-svg" />
        </a>

    </div>

    <div id="middle-control" data-toggle="tooltip" data-placement="left" title="Bạn cần hỗ trợ?">
        <img src="{{ asset('homepage') }}/assets/images/icon_comment.svg" alt="" class="icon-svg"
            style="vertical-align: top" />
    </div>

    {{-- javascript --}}
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
    @yield('js_page')

</body>

</html>

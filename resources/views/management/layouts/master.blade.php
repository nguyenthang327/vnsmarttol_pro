<!DOCTYPE html>
<html lang="vi">
<head>
    <title>VNSMARTTOL.COM | Hệ thống Seeding hàng đầu Việt Nam</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('homepage/assets/images/favicon.ico') }}"/>
    <link rel="apple-touch-icon" href="{{ asset('homepage/assets/images/favicon.ico') }}"/>
    <meta name="description"
          content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok vnsmarttol.com vnsmarttol"/>
    <meta itemprop="description"
          content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok vnsmarttol.com vnsmarttol"/>
    <meta name=keyword
          content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng...,vnsmarttol.com,vnsmarttol"/>
    <meta property="og:title" content="VNSMARTTOL.COM HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING"/>
    <meta property="og:site_name" content="VNSMARTTOL.COM HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING"/>
    <meta property="og:description"
          content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok"/>
    <meta property="og:type" content="services"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:keywords"
          content="Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng..."/>
    <meta property="og:image"
          content="{{ asset('homepage/assets/images/online-marketing.png') }}"/>
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
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu side-scrollbar">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fa fa-home"></i></span>
                            <span class="title">Quản Lý Chung</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="item-parent">
                                <a href="/home">
                                    <span class="menu-dot"></span>
                                    Tổng Quan
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/profile">
                                    <span class="menu-dot"></span>
                                    Thông tin tài khoản
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/payment">
                                    <span class="menu-dot"></span>
                                    Nạp Tiền
                                </a>
                            </li>
                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="menu-dot"></span>
                                    <span class="title">Liên Hệ Hỗ Trợ</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="http://t.me/TeleThongBaoHeThongBot">
                                            <span class="icon-holder"><i class="fa-brands fa-telegram"></i></span>
                                            Liên Kết Telegram
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="tel:0346999645">
                                            <span class="icon-holder"><i class="fa-solid fa-phone-flip"></i></span>
                                            Hotline: 0346999645
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="item-parent">
                                <a href="/report">
                                    <span class="menu-dot"></span>
                                    Nhật ký hoạt động
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/child_domain">
                                    <span class="menu-dot"></span>
                                    Tạo Site Đại Lý
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/referral">
                                    <span class="menu-dot"></span>
                                    Kiếm tiền
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/prices">
                                    <span class="menu-dot"></span>
                                    Bảng giá & Cấp bậc
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/qladmin">
                                    <span class="menu-dot"></span>
                                    Quản Trị Viên
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="section-title" href="javascript:void(0);">
                            <span class="title">DANH SÁCH DỊCH VỤ</span>
                        </a>
                    </li>
                    <li class="nav-item item-parent menu-item-">
                        <a class="" href="/lucky_wheel">
                    <span class="icon-holder">
                      <i class="fa-solid fa-arrows-spin fa-spin"></i>
                    </span>
                            <span class="title">Vòng quay may mắn</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fab fa-facebook-square"></i></span>
                            <span class="title">Facebook</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fas fa-hand-point-up"></i></span>
                                    <span class="title">Facebook Buff</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/fb_speed/s_like">
                                            <span class="menu-dot"></span>
                                            <span class="text-danger pl-0">Like</span> bài viết speed
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/reactions"> <span class="menu-dot"></span> <span
                                                class="text-danger pl-0">Like</span> bài viết VIP
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_speed/s_follow">
                                            <span class="menu-dot"></span>
                                            <span class="text-success pl-0">Sub</span> Trang cá nhân speed
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/follow">
                                            <span class="menu-dot"></span>
                                            <span class="text-success pl-0">Sub</span> Trang cá nhân VIP
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_speed/s_like_page">
                                            <span class="menu-dot"></span>
                                            Like Sub <span class="text-warning">FanPage</span> speed
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/like_page">
                                            <span class="menu-dot"></span>
                                            Like Sub <span class="text-warning">FanPage</span> VIP
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_speed/s_like_comment">
                                            <span class="menu-dot"></span>
                                            Like cho Bình Luận
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/comment">
                                            <span class="menu-dot"></span>
                                            Tăng Bình Luận
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/share">
                                            <span class="menu-dot"></span>
                                            Chia Sẻ Bài Viết
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/buff_group">
                                            <span class="menu-dot"></span>
                                            Tăng member Group
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/share_group"> <span class="menu-dot"></span> Share Livestream
                                            Group
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/review"> <span class="menu-dot"></span> Đánh giá 5* sao
                                            Fanpage
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/checkin"> <span class="menu-dot"></span> Check In FanPage
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/facebook/fb_event"> <span class="menu-dot"></span> Sự kiện Facebook
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fa-solid fa-film"></i></span>
                                    <span class="title">Facebook Reel</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/fb_reel/fb_like_reel"> <span class="menu-dot"></span> Tăng Like Reels
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_reel/fb_comment_reel"> <span class="menu-dot"></span> Tăng Comment
                                            Reels
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_reel/fb_view_reel"> <span class="menu-dot"></span> Tăng View Reels
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_reel/fb_view_100k_reel"> <span class="menu-dot"></span> Tăng View
                                            100k Reels
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/fb_reel/fb_share_reel"> <span class="menu-dot"></span> Tăng Share
                                            Reels
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fab fa-vimeo-square"></i></span>
                                    <span class="title">Facebook Vip</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_like"> <span class="menu-dot"></span> VIP Like Theo
                                            Tháng
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_like_group"> <span class="menu-dot"></span> VIP Like
                                            Group Tháng
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_cmt"> <span class="menu-dot"></span> VIP CMT Theo
                                            Tháng
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_live"> <span class="menu-dot"></span> VIP Mắt Theo
                                            Tháng
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_view_video"> <span class="menu-dot"></span> Vip View
                                            Video Tháng
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_share"> <span class="menu-dot"></span> Vip Share Theo
                                            Tháng
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/vipfacebook/vip_expired_soon"> <span class="menu-dot"></span> UID sắp
                                            hết hạn
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">


                                    <span class="icon-holder"><i class="fas fa-robot"></i></span>
                                    <span class="title">Facebook Bot</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/reaction/proxy"> <span class="menu-dot"></span> Mua Ip Proxy
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/reaction/bot_comment"> <span class="menu-dot"></span> BOT cảm xúc và
                                            Cmt
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/reaction/bot_love_story"> <span class="menu-dot"></span> BOT Love và
                                            Cmt Story
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/reaction/filter_friend"> <span class="menu-dot"></span> Lọc bạn bè k
                                            tương tác
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fas fa-eye"></i></span>
                                    <span class="title">Mắt lives-View video</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/view/view_live_v2"> <span class="menu-dot"></span> Buff Mắt Livestream
                                            V2
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/view/view_video"> <span class="menu-dot"></span> Tăng View Video
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/view/view_story"> <span class="menu-dot"></span> Tăng View Story
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/view/view_other"> <span class="menu-dot"></span> View 600k phút
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/view/view_60k_offline"> <span class="menu-dot"></span> View 60k
                                            Offline
                                        </a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fab fa-instagram-square"></i></span>
                            <span class="title">Instagram</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/instagram/like_instagram">
                                    <span class="menu-dot"></span>
                                    Like Instagram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/instagram/comment_instagram">
                                    <span class="menu-dot"></span>
                                    Comment Instagram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/instagram/follow_instagram">
                                    <span class="menu-dot"></span>
                                    Follow Instagram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/instagram/view_instagram">
                                    <span class="menu-dot"></span>
                                    View Instagram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/instagram/live_instagram">
                                    <span class="menu-dot"></span>
                                    Mắt Livestream Instagram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/instagram/vip_like_instagram">
                                    <span class="menu-dot"></span>
                                    Vip Like Instagram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/instagram/vip_comment_instagram">
                                    <span class="menu-dot"></span>
                                    Vip Comment Instagram
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fa fa-t"></i></span>
                            <span class="title">Threads</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/threads/like_threads">
                                    <span class="menu-dot"></span>
                                    Like Threads
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/threads/follow_threads">
                                    <span class="menu-dot"></span>
                                    Follow Threads
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fab fa-tiktok"></i></span>
                            <span class="title">TikTok</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fab fa-tiktok"></i></span>
                                    <span class="title">Tiktok Buff</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/tiktok/like_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-1">Like (Love)</span> TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/like_comment_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-1">Like</span> Comment TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/follow_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-2">Follow</span> TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/view_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-6">View</span> TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/comment_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-4">Comment</span> TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/share_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-7">Share</span> TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/favorite_tiktok"> <span class="menu-dot"></span> Yêu thích
                                            Tiktok
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fas fa-eye"></i></span>
                                    <span class="title">Tiktok Livestream</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/tiktok/like_live_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-3">Tim</span> Livestream Tiktok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/share_live_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-7">Share</span> Livestream TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/comment_live_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-4">Comment</span> Livestream TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/live_tiktok"> <span class="menu-dot"></span> <span
                                                class="pl-0 c-8">Mắt</span> LiveStream TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/pk_tiktok"> <span class="menu-dot"></span> Điểm chiến đấu (PK)
                                            Tiktok
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li class="has-child">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder"><i class="fab fa-vimeo-square"></i></span>
                                    <span class="title">Tiktok Vip tháng</span>
                                    <span class="fas fa-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="item-parent">
                                        <a href="/tiktok/vip_love_tiktok"> <span class="menu-dot"></span> Vip <span
                                                class="c-8">Love</span> TikTok
                                        </a>
                                    </li>
                                    <li class="item-parent">
                                        <a href="/tiktok/vip_view_tiktok"> <span class="menu-dot"></span> Vip <span
                                                class="c-2">View</span> TikTok
                                        </a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fa fa-shopping-cart"></i></span>
                            <span class="title">Shopee</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/shopee/follow_shopee">
                                    <span class="menu-dot"></span>
                                    Follow Shopee
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/shopee/love_shopee">
                                    <span class="menu-dot"></span>
                                    Love Shopee
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/shopee/like_review_shopee">
                                    <span class="menu-dot"></span>
                                    Like Review Shopee
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fab fa-telegram"></i></span>
                            <span class="title">Telegram</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/telegram/member_telegram">
                                    <span class="menu-dot"></span>
                                    Member & Sub Telegram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/telegram/view_telegram">
                                    <span class="menu-dot"></span>
                                    View Bài Viết Telegram
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/telegram/reaction_telegram">
                                    <span class="menu-dot"></span>
                                    Cảm Xúc Bài Viết Telegram
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fab fa-youtube"></i></span>
                            <span class="title">Youtube</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/youtube/like_youtube">
                                    <span class="menu-dot"></span>
                                    <span class="text-danger pl-0">Like</span> Youtube
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/like_youtube_short">
                                    <span class="menu-dot"></span>
                                    <span class="text-danger pl-0">Like</span> Youtube Short
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/view_youtube">
                                    <span class="menu-dot"></span>
                                    <span class="text-primary pl-0">View</span> Youtube
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/view_youtube_short">
                                    <span class="menu-dot"></span>
                                    <span class="text-primary pl-0">View</span> Youtube Short
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/view_youtube_4k">
                                    <span class="menu-dot"></span>
                                    <span class="text-primary pl-0">View</span> Youtube 4000H
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/live_youtube">
                                    <span class="menu-dot"></span>
                                    <span class="text-danger pl-0">Livestream</span> Youtube
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/comment_youtube">
                                    <span class="menu-dot"></span>
                                    <span class="text-success pl-0">Comment</span> Youtube
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/like_comment_youtube">
                                    <span class="menu-dot"></span>
                                    Like <span class="text-success">Comment</span> Youtube
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/sub_youtube">
                                    <span class="menu-dot"></span>
                                    <span class="text-warning pl-0">Subscribe</span> Youtube
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/youtube/tick_youtube">
                                    <span class="menu-dot"></span>
                                    Tick Nghệ Sĩ Youtube
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fab fa-twitter"></i></span>
                            <span class="title">Twitter</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/twitter/like_twitter">
                                    <span class="menu-dot"></span>
                                    Like Twitter
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/twitter/follow_twitter">
                                    <span class="menu-dot"></span>
                                    Follow Twitter
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/twitter/view_twitter">
                                    <span class="menu-dot"></span>
                                    View Twitter
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/twitter/retweet_twitter">
                                    <span class="menu-dot"></span>
                                    ReTweet Twitter
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/twitter/comment_twitter">
                                    <span class="menu-dot"></span>
                                    Comment Twitter
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/twitter/vip_like_twitter">
                                    <span class="menu-dot"></span>
                                    Vip Like Twitter
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/twitter/vip_view_twitter">
                                    <span class="menu-dot"></span>
                                    Vip View Twitter
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fa-solid fa-l"></i></span>
                            <span class="title">Lazada</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/lazada/sub_lazada">
                                    <span class="menu-dot"></span>
                                    Sub Lazada
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fa-brands fa-google"></i></span>
                            <span class="title">Dịch Vụ Google</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/google/google_map">
                                    <span class="menu-dot"></span>
                                    Google Map
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/google/rip_google_map">
                                    <span class="menu-dot"></span>
                                    RIP Google Map
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/google/google_map_review">
                                    <span class="menu-dot"></span>
                                    Review Google Map
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="fa-solid fa-award"></i></span>
                            <span class="title">Tiện Ích Miễn Phí</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="item-parent">
                                <a href="/tools/two_fa">
                                    <span class="menu-dot"></span>
                                    TwoFA Code
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/tools/text">
                                    <span class="menu-dot"></span>
                                    Tool Edit Text
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/tools/check_token">
                                    <span class="menu-dot"></span>
                                    Check Token
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/tools/check_uid">
                                    <span class="menu-dot"></span>
                                    Check Live UID
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/tools/get_link">
                                    <span class="menu-dot"></span>
                                    Get Link/UID
                                </a>
                            </li>


                            <li class="item-parent">
                                <a href="/tools/check_domain_expiry">
                                    <span class="menu-dot"></span>
                                    Kiểm tra hạn tên miền
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item item-parent menu-item-logout">
                        <a class="" href="/logout">
                    <span class="icon-holder">
                      <i class="fas fa-sign-out-alt"></i>
                    </span>
                            <span class="title">Đăng xuất</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
            <div class="sub-header">
                <div class="title">Trang Tổng Quan</div>
                <div class="link-logout">
                    <a href="/logout">Đăng Xuất</a>
                </div>
            </div>

            <!-- Content Wrapper START -->
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
            <div class="main-content">
                <div class="row flex-row-reverse">
                    <div class="col-xl-4 col-md-6">
                        <div class="card widget-user mb-only">
                            <div class="card-body">
                                <h4>Tổng Quan</h4>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="widget__top">
                                            <div class="widget__media hidden-">
                                                <img src="{{ asset('management/assets/images/avatar.jpg') }}" alt="image">
                                            </div>
                                            <div class="widget__content">
                                                <div class="widget__head">
                                                    <a href="/profile/" class="widget__username text-success">
                                                        temisvn
                                                        <img class="icon-tick" src="{{ asset('management/assets/images/tick.svg') }}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="widget__subhead">
                                                    <a href="javascript:void(0)" class="text-warning">
                                                        <i class="fa fa-envelope"></i>
                                                        admin@example.com
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-primary">
                                                        <i class="fa fa-user"></i>Nhà phân phối
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="widget-statistic">
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon text-success far fa-money-bill-alt"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">Số Dư</div>
                                                        <div class="text-2 text-money">
                                                            <span>376,842₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon fas fa-money-check text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">Đã Sử Dụng</div>
                                                        <div class="text-2 text-money">
                                                            <span>2,123,158₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon fas fa-money-check-alt text-danger"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">Đã Nạp</div>
                                                        <div class="text-2 text-money">
                                                            <span>2,500,000₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon fa fa-star text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">VIP Đang chạy</div>
                                                        <div class="text-2 text-money">
                                                            <span>0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card box-shadow-1">
                            <div class="card-header menu_header">Hoạt động mới</div>
                            <div class="card-body">
                                <div class="list-user-notifications custom-scroll">
                                    <table id="table-notifications">
                                        <tbody>
                                        <tr class="notify-item notify-type-notify_popup"
                                            data-time="Fri Sep 29 2023 13:38:40 GMT+0700 (Indochina Time)"
                                            data-type="notify_popup">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                VIETCOMBANK bị ép đổi mật khẩu, mọi người đổi xong cập nhật lại mật khẩu
                                                và id trình duyệt nếu sử dụng auto bank và test auto lại nha
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify"
                                            data-time="Thu Sep 28 2023 14:50:05 GMT+0700 (Indochina Time)"
                                            data-type="notify">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Hoàn 1,360₫ từ dịch vụ comment
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify"
                                            data-time="Wed Sep 27 2023 17:40:05 GMT+0700 (Indochina Time)"
                                            data-type="notify">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Hoàn 1,360₫ từ dịch vụ comment
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify_popup"
                                            data-time="Thu Aug 17 2023 19:27:29 GMT+0700 (Indochina Time)"
                                            data-type="notify_popup">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Mở lại share tiktok v4, giá rẻ lên rất nhanh. Update (website phụ) chức
                                                năng thông báo nổi cho từng dịch vụ.
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify_popup"
                                            data-time="Tue Jun 27 2023 11:55:58 GMT+0700 (Indochina Time)"
                                            data-type="notify_popup">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Momo: Hiện tại bên momo chặn giới hạn đăng nhập tần suất nhiều hơn. dễ
                                                bị chặn 24 giờ, mọi người nên sử dụng 2 sdt momo. để nếu bị chặn thì
                                                thay thế cho khách hàng nạp tiền.
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify"
                                            data-time="Tue May 30 2023 08:36:25 GMT+0700 (Indochina Time)"
                                            data-type="notify">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Nạp thành công 1,000,000VND
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify"
                                            data-time="Sat May 20 2023 21:58:52 GMT+0700 (Indochina Time)"
                                            data-type="notify">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Nạp thành công 500,000VND
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify"
                                            data-time="Wed May 17 2023 22:41:01 GMT+0700 (Indochina Time)"
                                            data-type="notify">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Nạp thành công 500,000VND
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        <tr class="notify-item notify-type-notify"
                                            data-time="Wed May 17 2023 22:39:26 GMT+0700 (Indochina Time)"
                                            data-type="notify">
                                            <td class="td-time"></td>
                                            <td class="content">
                                                Nạp thành công 500,000VND
                                                <span class="badge-new"></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>


                                <div class="text-center">
                                    <button class="btn btn-view-notify">Xem tất cả thông báo</button>
                                </div>

                            </div>
                        </div>


                        <div class="card box-shadow-1">
                            <div class="card-header menu_header">Bạn cần hỗ trợ?</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <a class="widget-support" target="_blank"
                                           href="https://www.facebook.com/nhanvien.support/">
                                            <img
                                                src="{{ asset('management/assets/images/icons/message.png') }}"
                                                alt=""/>
                                            <div class="support-text">Nhân viên hỗ trợ</div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <a class="widget-support" target="_blank"
                                           href="https://www.youtube.com/channel/UCLAc8u4ojo7U8GmB_l_ohDg">
                                            <img
                                                src="{{ asset('management/assets/images/icons/youtube.png') }}"
                                                alt=""/>
                                            <div class="support-text">Youtube HDSD</div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card box-shadow-1">
                            <div class="card-header menu_header">Câu hỏi thường gặp (nhấn để xem)</div>
                            <div class="card-body">
                                <div class="question mt-2 mb-2" data-toggle="collapse" data-target="#question_0"
                                     aria-expanded="false">
                                    <i class="far fa-hand-point-right"></i> Dịch vụ mua không chạy?
                                </div>
                                <div class="collapse" id="question_0">
                                    <div class="card card-body p-2 text-ln">Hãy kiểm tra tình trạng tại mục quản lý uid
                                        trước, sau đó báo lỗi tại fanpage support nhé.
                                    </div>
                                </div>
                                <div class="question mt-2 mb-2" data-toggle="collapse" data-target="#question_1"
                                     aria-expanded="false">
                                    <i class="far fa-hand-point-right"></i> Tôi cần nạp tiền
                                </div>
                                <div class="collapse" id="question_1">
                                    <div class="card card-body p-2 text-ln">Tại menu website, có mục nạp tiền, các bạn
                                        bấm và hãy đọc lưu ý tại đó và chuyển tiền đúng nội dung nha
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-shadow-1 pc-only">
                            <div class="card-header menu_header">Video hướng dẫn sử dụng</div>
                            <div class="card-body">
                                <div class="video-container">
                                    <iframe style="width: 560px;height:315px"
                                            src="https://www.youtube.com/embed/9mW_zsdq_2U"
                                            title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-6">
                        <div class="card widget-user pc-only">
                            <div class="card-body">
                                <h4>Tổng Quan</h4>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="widget__top">
                                            <div class="widget__media hidden-">
                                                <img src="{{ asset('management/assets/images/avatar.jpg') }}" alt="image">
                                            </div>
                                            <div class="widget__content">
                                                <div class="widget__head">
                                                    <a href="/profile/" class="widget__username text-success">
                                                        temisvn
                                                        <img class="icon-tick" src="{{ asset('management/assets/images/tick.svg') }}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="widget__subhead">
                                                    <a href="javascript:void(0)" class="text-warning">
                                                        <i class="fa fa-envelope"></i>
                                                        admin@example.com
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-primary">
                                                        <i class="fa fa-user"></i>Nhà phân phối
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="widget-statistic">
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon text-success far fa-money-bill-alt"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">Số Dư</div>
                                                        <div class="text-2 text-money">
                                                            <span>376,842₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon fas fa-money-check text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">Đã Sử Dụng</div>
                                                        <div class="text-2 text-money">
                                                            <span>2,123,158₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-left">
                                                        <i class="icon fas fa-money-check-alt text-danger"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-1">Đã Nạp</div>
                                                        <div class="text-2 text-money">
                                                            <span>2,500,000₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-body text-danger">
                                Đề nghị mọi người liên kết Telegram <a href="/profile" target="_self">tại đây</a> <br/>
                                Liên kết Telegram giúp bảo mật tài khoản, cũng như cập nhật các thông tin mới nhất từ hệ
                                thống!
                            </div>
                        </div>


                        <div class="card mb-2 box-shadow-1">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('management/assets/images/admin.png') }}" class="feed-icon align-self-end" alt="">
                                    <div>
                                        <a class="feed-title" href="/">
                                            Quản Trị Viên </a>
                                        <div class="feed-time"
                                             data-time="Mon May 15 2023 19:39:56 GMT+0700 (Indochina Time)"></div>
                                    </div>
                                </div>

                                <div class="feed-content">
                                    <p><span style="color:#e74c3c"><strong>Chào mừng bạn tới website số 1 VN.<br>Cung cấp các giải pháp markerting digital</strong></span>
                                    </p>
                                </div>


                                <div class="feed-image">
                                    <img src="{{ asset('management/assets/images/feed-image.jpeg') }}" alt="feed-image"/>
                                </div>

                            </div>
                        </div>


                        <div class="card box-shadow-1 mb-only">
                            <div class="card-header menu_header">Video hướng dẫn sử dụng</div>
                            <div class="card-body">
                                <div class="video-container">
                                    <iframe style="width: 560px;height:315px"
                                            src="https://www.youtube.com/embed/9mW_zsdq_2U"
                                            title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal fade" id="userNotifyModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thông báo mới</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="table-user-notifications" class="table table-bordered"></table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalZoomImage" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                            <img src="#" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page js -->
            <script src="{{ asset('management/assets/plugins/js.cookie/js.cookie.min.js') }}"></script>

            <script>
                var lastNotify = 0;
                var newestNotifyId = '2316';

                $(document).ready(function () {


                    $('.notify-item').each(function () {
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

                    $('.feed-time').each(function () {
                        var time = moment(new Date($(this).data('time')));
                        $(this).html(time.format('DD/MM') + ' lúc ' + time.format('HH:mm'));
                    });

                    $('.btn-view-notify').click(function () {
                        $('#userNotifyModal').modal('show');
                        if ($.fn.dataTable.isDataTable('#table-user-notifications')) return;

                        $('#table-user-notifications').DataTable({
                            responsive: false,
                            searchDelay: 500,
                            processing: true,
                            serverSide: true,
                            ajax: xAjax(`/ajax/user_notifications`),
                            order: [[1, "desc"]],
                            columns: [
                                makeColumn('Nội dung', 'content', components.table.text_primary),
                                definedColumns.created_at
                            ]
                        });
                    });
                });

                $('.feed-image img').click(function () {
                    $('#modalZoomImage img').attr('src', $(this).attr('src'));
                    $('#modalZoomImage').modal('show');
                })
            </script>

            <!-- Content Wrapper END -->

            <!-- Footer START -->
            <footer class="footer">
                <div class="footer-content">
                    <p class="m-b-0">
                        vnsmarttol.com&nbsp;&copy;&nbsp;Digital Marketing
                    </p>
                </div>
            </footer>
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
    <a class="icon" href="tel:0346999645" data-toggle="tooltip"
       data-placement="left" title="Liên Hệ">
        <img src="{{ asset('management/assets/images/icon_phone.svg') }}" alt="" class="icon-svg"/>
    </a>
</div>

<div id="middle-control" data-toggle="tooltip" data-placement="left" title="Bạn cần hỗ trợ?">
    <img src="{{ asset('management/assets/images/icon_comment.svg') }}" alt="" class="icon-svg"
         style="vertical-align: top"/>
</div>

<script>
    var miniIcon = !!localStorage.getItem('miniIcon');
    $('#middle-control').click(function () {
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
<link rel="stylesheet" href="{{ asset('management/assets/plugins/select2/select2.min.css') }}"/>
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

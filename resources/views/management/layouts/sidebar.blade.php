@php
    $currentRoute = Route::current()->getName();
    $user = auth()->user();
    $role = $user->roles->pluck('name')->toArray();

@endphp
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu side-scrollbar">
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="fa fa-home"></i></span>
                    <span class="title">Quản Lý Chung</span>
                    <span class="fas fa-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">
                    @php
                        $routeHome = ['dashboard.index'];
                    @endphp
                    <li class="item-parent {{ in_array($currentRoute, $routeHome) ? 'active' : ''}}">
                        <a href="{{ route('dashboard.index') }}">
                            <span class="menu-dot"></span>
                            Tổng Quan
                        </a>
                    </li>
                    @php
                        $routeProfile = ['information.index'];
                    @endphp
                    <li class="item-parent {{ in_array($currentRoute, $routeProfile) ? 'active' : ''}}">
                        <a href="{{ route('information.index') }}">
                            <span class="menu-dot"></span>
                            Thông tin tài khoản
                        </a>
                    </li>
                    @php
                        $routeCard = ['phoneCard.index'];
                        $routeBanking = ['bank.atm.index'];
                        $routePaypal = ['paypal.index'];
                        $routePayment = array_merge($routeBanking, $routeCard, $routePaypal);
                    @endphp
                    <li class="has-child {{ in_array($currentRoute, $routePayment) ? 'open' : ''}}">
                        {{-- <a href="/payment">
                            <span class="menu-dot"></span>
                            Nạp Tiền
                        </a> --}}
                        <a class="dropdown-toggle {{ in_array($currentRoute, $routePayment) ? 'active' : ''}}" href="javascript:void(0);">
                            <span class="menu-dot"></span>
                            <span class="title">Nạp tiền</span>
                            <span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" style="display:{{ in_array($currentRoute, $routePayment) ? 'block' : 'none'}}">
                            <li class="item-parent {{ in_array($currentRoute, $routeBanking) ? 'active' : ''}}">
                                <a href="{{ route('bank.atm.index') }}">
                                    <span class="icon-holder"></span>
                                    Banking
                                </a>
                            </li>
                            <li class="item-parent {{ in_array($currentRoute, $routeCard) ? 'active' : ''}}">
                                <a href="{{ route('phoneCard.index') }}">
                                    <span class="icon-holder"></span>
                                    Thẻ cào
                                </a>
                            </li>
                            <li class="item-parent {{ in_array($currentRoute, $routePaypal) ? 'active' : ''}}">
                                <a href="{{ route('paypal.index') }}">
                                    <span class="icon-holder"></span>
                                    Paypal
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="has-child">
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
                    </li> --}}
                    <li class="item-parent">
                        <a href="{{route('report.index')}}">
                            <span class="menu-dot"></span>
                            Nhật ký hoạt động
                        </a>
                    </li>
                    {{-- <li class="item-parent">
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
                    </li> --}}
                    @if(in_array(\App\Models\Role::ROLE_ADMIN, $role))
                    <li class="item-parent">
                        <a href="/qladmin">
                            <span class="menu-dot"></span>
                            Quản Trị Viên
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            {{-- <li class="nav-item">
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
            --}}
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
                                <a href="/service/facebook/like-speed">
                                    <span class="menu-dot"></span>
                                    <span class="text-danger pl-0">Like</span> bài viết speed
                                </a>
                            </li>
                            {{-- <li class="item-parent">
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
                            </li> --}}

                        </ul>
                    </li>

                    {{--
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

                --}}
                </ul>
            </li>

            {{--
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
            </li> --}}


            <li class="nav-item item-parent menu-item-logout">
                <a class="" href="#"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span class="icon-holder">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="title">Đăng xuất</span>
                </a>
            </li>

        </ul>
    </div>
</div>

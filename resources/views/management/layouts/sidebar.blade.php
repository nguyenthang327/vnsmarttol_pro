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
                        <a href="/report">
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
                             <li class="item-parent">
                                <a href="/service/facebook/like-sale"> <span class="menu-dot"></span> <span
                                        class="text-danger pl-0">Like</span> bài viết sale
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/sub-sale">
                                    <span class="menu-dot"></span>
                                    <span class="text-success pl-0">Sub</span> Trang cá nhân sale
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/sub-vip">
                                    <span class="menu-dot"></span>
                                    <span class="text-success pl-0">Sub</span> Trang cá nhân VIP
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/like-page-sale">
                                    <span class="menu-dot"></span>
                                    Like Sub <span class="text-warning">FanPage</span> sale
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/like-page-speed">
                                    <span class="menu-dot"></span>
                                    Like Sub <span class="text-warning">FanPage</span> speed
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/like-comment">
                                    <span class="menu-dot"></span>
                                    Tăng like bình luận
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/comment-sale">
                                    <span class="menu-dot"></span>
                                    Tăng bình luận (sale)
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/share-profile">
                                    <span class="menu-dot"></span>
                                    Tăng chia sẻ (profile)
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/member-group">
                                    <span class="menu-dot"></span>
                                    Tăng thành viên nhóm
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
                                <a href="/service/facebook/eye-live"> <span class="menu-dot"></span> Buff Mắt Livestream
                                    V2
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/view-video"> <span class="menu-dot"></span> Tăng View Video
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/facebook/view-story"> <span class="menu-dot"></span> Tăng View Story
                                </a>
                            </li>
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
                --}}
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
                        <a href="/service/instagram/like-instagram">
                            <span class="menu-dot"></span>
                            Like Instagram
                        </a>
                    </li>

                    <li class="item-parent">
                        <a href="/service/instagram/follow-instagram">
                            <span class="menu-dot"></span>
                            Follow Instagram
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
                                <a href="/service/tiktok/like-tiktok"> <span class="menu-dot"></span> <span
                                        class="pl-0 c-1">Like (Love)</span> TikTok
                                </a>
                            </li>

                            <li class="item-parent">
                                <a href="/service/tiktok/comment-tiktok"> <span class="menu-dot"></span> <span
                                        class="pl-0 c-4">Comment</span> TikTok
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/tiktok/share-tiktok"> <span class="menu-dot"></span> <span
                                        class="pl-0 c-7">Share</span> TikTok
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/tiktok/sub-tiktok"> <span class="menu-dot"></span> <span
                                        class="pl-0 c-2">Follow</span> TikTok
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/tiktok/view-tiktok"> <span class="menu-dot"></span> <span
                                        class="pl-0 c-6">View</span> TikTok
                                </a>
                            </li>
                            <li class="item-parent">
                                <a href="/service/tiktok/eye-live-tiktok"> <span class="menu-dot"></span> <span
                                        class="pl-0 c-8">Mắt</span> LiveStream TikTok
                                </a>
                            </li>
                        </ul>
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
                        <a href="/service/twitter/like-twitter">
                            <span class="menu-dot"></span>
                            Like Twitter
                        </a>
                    </li>
                    <li class="item-parent">
                        <a href="/service/twitter/follow-twitter">
                            <span class="menu-dot"></span>
                            Follow Twitter
                        </a>
                    </li>
                </ul>
            </li>
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

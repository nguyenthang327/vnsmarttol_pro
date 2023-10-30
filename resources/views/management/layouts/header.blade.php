<div class="header">
    <div class="logo">
        <a href="{{ route('dashboard.index') }}">
            <img src="{{ asset('management/assets/images/logo/default.png') }}" alt="Logo">
            <img class="logo-fold" src="{{ asset('management/assets/images/logo/default.png') }}" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="icon-toggle"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="icon-toggle"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right nav-right-actions">

            <li class="scale-left li-service-select">
                <div class="mr-3">
                    <div class="service-select-wrapper">
                        <select id="service-select" class="form-control" style="width: 500px">
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Facebook Speed">
                                <option value="/fb_speed/s_like">Like bài viết speed</option>
                                <option value="/fb_speed/s_follow">Sub Trang cá nhân speed</option>
                                <option value="/fb_speed/s_like_page">Like Sub FanPage speed</option>
                            </optgroup>
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Facebook Buff">
                                <option value="/facebook/reactions">Tăng Like bài viết chậm</option>
                                <option value="/facebook/follow">Sub trang cá nhân VIP</option>
                                <option value="/facebook/like_page">Like Sub Fanpage VIP</option>
                                <option value="/fb_speed/s_like_comment">Tăng Like Comment</option>
                                <option value="/facebook/comment">Tăng Bình Luận</option>
                                <option value="/facebook/share">Chia Sẻ Bài Viết</option>
                                <option value="/facebook/buff_group">Tăng member Group</option>
                                <option value="/facebook/share_group">Share Lives Group</option>
                                <option value="/facebook/review">Đánh giá 5 Sao</option>
                                <option value="/facebook/checkin">Check In FanPage</option>
                                <option value="/facebook/fb_event">Sự kiện Facebook</option>
                            </optgroup>
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Facebook Reel">
                                <option value="/fb_reel/fb_like_reel">Tăng Like Reels</option>
                                <option value="/fb_reel/fb_comment_reel">Tăng Comment Reels</option>
                                <option value="/fb_reel/fb_view_reel">Tăng View Reels</option>
                                <option value="/fb_reel/fb_view_100k_reel">Tăng View 100k Reels</option>
                                <option value="/fb_reel/fb_share_reel">Tăng Share Reels</option>
                            </optgroup>
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Facebook Vip">
                                <option value="/vipfacebook/vip_like">VIP Like Theo Tháng</option>
                                <option value="/vipfacebook/vip_like_group">VIP Like Group Tháng</option>
                                <option value="/vipfacebook/vip_cmt">VIP CMT Theo tháng</option>
                                <option value="/vipfacebook/vip_live">VIP Mắt Theo Tháng</option>
                                <option value="/vipfacebook/vip_view_video">Vip View Video Tháng</option>
                                <option value="/vipfacebook/vip_share">Vip Share Theo Tháng</option>
                            </optgroup>
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Facebook Bot">
                                <option value="/reaction/proxy">Proxy</option>
                                <option value="/reaction/bot_comment">Bot cảm xúc và Cmt</option>
                                <option value="/reaction/bot_love_story">Bot Love và cmt Story</option>
                                <option value="/reaction/poke">Bot Chọc Tương Tác</option>
                                <option value="/reaction/filter_friend">Lọc bạn bè k tương tác</option>
                            </optgroup>
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Mắt-View">
                                <option value="/view/view_live_v2">Buff Mắt Livestream</option>
                                <option value="/view/view_video">Tăng View Video</option>
                                <option value="/view/view_story">Tăng View Story</option>
                                <option value="/view/view_other">View 600k phút</option>
                                <option value="/view/view_60k_offline">View 60k Offline</option>
                            </optgroup>

                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Threads">
                                <option value="/threads/like_threads">Like Threads</option>
                                <option value="/threads/follow_threads">Follow Threads</option>
                            </optgroup>
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Instagram">
                                <option value="/instagram/like_instagram">Like Instagram</option>
                                <option value="/instagram/comment_instagram">Comment Instagram</option>
                                <option value="/instagram/follow_instagram">Follow Instagram</option>
                                <option value="/instagram/view_instagram">View Instagram</option>
                                <option value="/instagram/live_instagram">Mắt Livestream Instagram</option>
                                <option value="/instagram/vip_like_instagram">Vip Like Instagram</option>
                                <option value="/instagram/vip_comment_instagram">Vip Comment Instagram</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </li>

            {{-- <li class="scale-left">
                <div class="mr-3">
                    <div class="switch d-inline">
                        <label for="switch_dark_mode" class="dark-mode-label">Dark Mode</label>
                        <input type="checkbox" name="switch_dark_mode" id="switch_dark_mode">
                        <label for="switch_dark_mode"></label>
                    </div>
                </div>
            </li> --}}
            <li class="scale-left">
                <div class="translate-wrapper">
                    <div id="button_translate"></div>
                </div>
            </li>
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="{{ asset('management/assets/images/avatar.jpg') }}" alt="">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="{{ asset('management/assets/images/avatar.jpg') }}" alt="">
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">temisvn</p>
                                <p class="m-b-0 opacity-07">Nhà phân phối</p>
                            </div>
                        </div>
                    </div>
                    <a href="/profile" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="opacity-04 font-size-16 fa fa-user"></i>
                                <span class="m-l-10">Cập nhật thông tin</span>
                            </div>
                            <i class="font-size-10 fa fa-chevron-right"></i>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-block p-h-15 p-v-10" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="opacity-04 font-size-16 fa fa-sign-out"></i>
                                <span class="m-l-10">Đăng xuất</span>
                            </div>
                            <i class="font-size-10 fa fa-chevron-right"></i>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="nav-right toggle-mobile-container">
            <li>
                <a href="javascript:void(0);">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="{{ asset('management/assets/images/avatar.jpg') }}" alt="">
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

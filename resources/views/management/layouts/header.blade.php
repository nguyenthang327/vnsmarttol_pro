@php
    $user = auth()->user();
@endphp
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
                        <select id="service-select" class="form-control">
                            <option value="">Chọn dịch vụ</option>
                            <optgroup label="Facebook">
                                <option value="facebook/like-post-sale">Tăng like sale Facebook</option>
                                <option value="facebook/like-post-speed">Tăng like speed Facebook</option>
                                <option value="facebook/like-comment">Tăng like comment Facebook</option>
                                <option value="facebook/comment-sale">Tăng comment sale Facebook</option>
                                <option value="facebook/comment-speed">Tăng comment speed Facebook</option>
                                <option value="facebook/sub-vip">Tăng sub vip Facebook</option>
                                <option value="facebook/sub-sale">Tăng sub sale Facebook</option>
                                <option value="facebook/sub-speed">Tăng sub speed Facebook</option>
                                <option value="facebook/like-page-quality">Tăng like page quality Facebook</option>
                                <option value="facebook/like-page-sale">Tăng like page sale Facebook</option>
                                <option value="facebook/like-page-speed">Tăng like page speed Facebook</option>
                                <option value="facebook/eye-live">Tăng eye live Facebook</option>
                                <option value="facebook/view-video">Tăng view video Facebook</option>
                                <option value="facebook/share-profile">Tăng share profile Facebook</option>
                                <option value="facebook/member-group">Tăng member group Facebook</option>
                                <option value="facebook/view-story">Tăng view story Facebook</option>
                                <option value="facebook/vip-like">Tăng vip like Facebook</option>
                            </optgroup>

                            <optgroup label="Instagram">
                                <option value="instagram/like-instagram">Like bài viết Instagram</option>
                                <option value="instagram/follow-instagram">Theo dõi tài khoản Instagram</option>
                            </optgroup>

                            <optgroup label="TikTok">
                                <option value="tiktok/like-tiktok">Like Tiktok</option>
                                <option value="tiktok/comment-tiktok">Comment Tiktok</option>
                                <option value="tiktok/share-tiktok">Share Tiktok</option>
                                <option value="tiktok/sub-tiktok">Follow Tiktok</option>
                                <option value="tiktok/view-tiktok">View Tiktok</option>
                                <option value="tiktok/eye-live-tiktok">Mắt live</option>
                            </optgroup>

                            <optgroup label="Twitter">
                                <option value="twitter/like-twitter">Like bài viết Twitter</option>
                                <option value="twitter/sub-twitter">Theo dõi tài khoản Twitter</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </li>

             <li class="scale-left">
                <div class="mr-3">
                    <div class="switch d-inline">
                        <label for="switch_dark_mode" class="dark-mode-label">Dark Mode</label>
                        <input type="checkbox" name="switch_dark_mode" id="switch_dark_mode">
                        <label for="switch_dark_mode"></label>
                    </div>
                </div>
            </li>
            <li class="scale-left">
                <div class="translate-wrapper">
                    <div id="button_translate"></div>
                </div>
            </li>
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="{{ $user->avatar ?? asset('management/assets/images/avatar.jpg') }}" alt="">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="{{  $user->avatar ?? asset('management/assets/images/avatar.jpg') }}" alt="">
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">{{$user->username}}</p>
                                <p class="m-b-0 opacity-07"> {{ session()->get('uGroup')[$user->ugroup] ?? 'Thành viên' }}</p>
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

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

            {{-- <li class="scale-left">
                <div class="mr-3">
                    <div class="switch d-inline">
                        <label for="switch_dark_mode" class="dark-mode-label">Dark Mode</label>
                        <input type="checkbox" name="switch_dark_mode" id="switch_dark_mode">
                        <label for="switch_dark_mode"></label>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="scale-left">
                <div class="translate-wrapper">
                    <div id="button_translate"></div>
                </div>
            </li> --}}
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

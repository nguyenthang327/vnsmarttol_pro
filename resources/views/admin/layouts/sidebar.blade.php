@php
    $currentRoute = Route::current()->getName();
@endphp
<div class="side-nav">
    <div class="side-nav-inner">

        <ul class="side-nav-menu side-scrollbar">
            <li class="item-parent menu-item-">
                <a href="/qladmin">
                    <span class="icon-holder">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="title">Trang Quản Trị</span>
                </a>
            </li>

            <li class="item-parent menu-item-prices">
                <a href="/qladmin/prices">
                    <span class="icon-holder">
                        <i class="fa fa-list"></i>
                    </span>
                    <span class="title">Chỉnh giá dịch vụ</span>
                </a>
            </li>




            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-users"></i>
                    </span>
                    <span class="title">Thành Viên</span>
                    <span class="fas fa-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">


                    <li class="item-parent">
                        <a href="/qladmin/user/addPrice">
                            <span class="menu-dot"></span>
                            Cộng tiền thành viên
                        </a>
                    </li>



                    <li class="item-parent">
                        <a href="/qladmin/user/subtractPrice">
                            <span class="menu-dot"></span>
                            Trừ tiền thành viên
                        </a>
                    </li>



                    <li class="item-parent">
                        <a href="/qladmin/user">
                            <span class="menu-dot"></span>
                            Danh Sách Thành Viên
                        </a>
                    </li>



                    <li class="item-parent">
                        <a href="/qladmin/user/export">
                            <span class="menu-dot"></span>
                            Get info member
                        </a>
                    </li>



                    <li class="item-parent">
                        <a href="/qladmin/user/upgrade">
                            <span class="menu-dot"></span>
                            Nâng cấp Thành Viên
                        </a>
                    </li>


                </ul>
            </li>

            <li>
                <a class="sidebar-title">
                    <span class="title">Chức năng</span>
                </a>
            </li>




            <li class="item-parent menu-item-payment">
                <a href="/qladmin/payment">
                    <span class="icon-holder">
                        <i class="fas fa-money-check-alt"></i>
                    </span>
                    <span class="title">Nhật ký cộng tiền</span>
                </a>
            </li>




            <li class="item-parent menu-item-refunds">
                <a href="/qladmin/refunds">
                    <span class="icon-holder">
                        <i class="fas fa-money-bill-wave"></i>
                    </span>
                    <span class="title">Lịch sử hoàn tiền</span>
                </a>
            </li>




            <li class="item-parent menu-item-discount_codes">
                <a href="/qladmin/discount_codes">
                    <span class="icon-holder">
                        <i class="fas fa-tag"></i>
                    </span>
                    <span class="title">Mã Giảm Giá</span>
                </a>
            </li>




            <li class="item-parent menu-item-notes">
                <a href="/qladmin/notes">
                    <span class="icon-holder">
                        <i class="far fa-sticky-note"></i>
                    </span>
                    <span class="title">Ghi chú</span>
                </a>
            </li>




            <li class="item-parent menu-item-news">
                <a href="/qladmin/news">
                    <span class="icon-holder">
                        <i class="fas fa-newspaper"></i>
                    </span>
                    <span class="title">Cập nhật tính năng mới</span>
                </a>
            </li>




            <li>
                <a class="sidebar-title">
                    <span class="title">Quản Lý Đơn</span>
                </a>
            </li>




            <li class="item-parent menu-item-logs">
                <a href="/qladmin/logs">
                    <span class="icon-holder">
                        <i class="fas fa-thumbs-up"></i>
                    </span>
                    <span class="title">Quản lý đơn Buff</span>
                </a>
            </li>




            <li class="item-parent menu-item-sim_otp">
                <a href="/qladmin/sim_otp">
                    <span class="icon-holder">
                        <i class="fas fa-sim-card"></i>
                    </span>
                    <span class="title">Quản lý đơn Sim</span>
                </a>
            </li>




            <li class="item-parent menu-item-vips">
                <a href="/qladmin/vips">
                    <span class="icon-holder">
                        <i class="fab fa-vimeo-square"></i>
                    </span>
                    <span class="title">Quản lý đơn Vips</span>
                </a>
            </li>




            <li class="item-parent menu-item-bots">
                <a href="/qladmin/bots">
                    <span class="icon-holder">
                        <i class="fas fa-robot"></i>
                    </span>
                    <span class="title">Quản lý đơn Bots</span>
                </a>
            </li>




            <li class="item-parent menu-item-referral">
                <a href="/qladmin/referral">
                    <span class="icon-holder">
                        <i class="fas fa-hand-holding-usd"></i>
                    </span>
                    <span class="title">Nhật ký Kiếm tiền</span>
                </a>
            </li>




            <li class="item-parent menu-item-tickets/setting">
                <a href="/qladmin/tickets/setting">
                    <span class="icon-holder">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </span>
                    <span class="title">Cấu hình Hộp thư hỗ trợ</span>
                </a>
            </li>





            <li class="item-parent menu-item-lucky_wheel">
                <a href="/qladmin/lucky_wheel">
                    <span class="icon-holder">
                        <i class="fa-solid fa-arrows-spin fa-spin"></i>
                    </span>
                    <span class="title">Vòng quay quay mắn</span>
                </a>
            </li>




            <li>
                <a class="sidebar-title">
                    <span class="title">Phần thiết lập web</span>
                </a>
            </li>




            <li class="item-parent menu-item-settings">
                <a href="/qladmin/settings">
                    <span class="icon-holder">
                        <i class="fas fa-cogs"></i>
                    </span>
                    <span class="title">Thiết lập hệ thống</span>
                </a>
            </li>




            <li class="item-parent menu-item-home_settings">
                <a href="/qladmin/home_settings">
                    <span class="icon-holder">
                        <i class="fas fa-cogs"></i>
                    </span>
                    <span class="title">Support và câu hỏi</span>
                </a>
            </li>




            <li class="item-parent menu-item-banks">
                <a href="/qladmin/banks">
                    <span class="icon-holder">
                        <i class="fas fa-money-bill-wave"></i>
                    </span>
                    <span class="title">Thiết lập ngân hàng</span>
                </a>
            </li>




            <li>
                <a class="sidebar-title">
                    <span class="title">Thông báo</span>
                </a>
            </li>




            <li class="item-parent menu-item-notifications">
                <a href="/qladmin/notifications">
                    <span class="icon-holder">
                        <i class="fas fa-bell"></i>
                    </span>
                    <span class="title">Thông báo trang chủ</span>
                </a>
            </li>




            <li class="item-parent menu-item-child_domains">
                <a href="/qladmin/child_domains">
                    <span class="icon-holder">
                        <i class="fas fa-sitemap"></i>
                    </span>
                    <span class="title">Domains</span>
                </a>
            </li>




            <li class="item-parent menu-item-logout">
                <a href="/logout">
                    <span class="icon-holder">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="title">Đăng xuất</span>
                </a>
            </li>


        </ul>
    </div>
</div>
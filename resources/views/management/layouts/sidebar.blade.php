<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <br>
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-user-cog"></i>
                            <span>Trang cá nhân</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('information.index') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Thông tin tài
                                    khoản</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Biến động số dư</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Lịch sử đơn hàng</a>
                            </li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Lịch sử mua Clone</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-wallet"></i>
                            <span>Nạp Tiền</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('phoneCard.index') }}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Nạp Bằng Thẻ
                                    Cào</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Nạp Bằng
                                    ATM</a></li>
                        </ul>
                    </li>
                    {{-- comment  --}}
                    <!--
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-code"></i>
                            <span>API</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>API
                                    DVMXH</a></li>
                            <li><a href="#l"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>API
                                    SHOPCLONE</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fas fa-life-ring"></i>
                            <span>Hỗ trợ IT - Báo Lỗi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-store"></i>
                            <span>Mua Clone - Tool FB</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-facebook-square"></i></i>
                            <span>Facebook</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Like Facebook <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/2"><i class="icon-Commit"><span class="path1"></span><span
                                                    class="path2"></span></i>Like
                                            Nhanh</a></li>
                                    <li><a href="/services/3"><i class="icon-Commit"><span class="path1"></span><span
                                                    class="path2"></span></i>Like
                                            Comment</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Đánh giá & checkin page <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/50"><i class="icon-Commit"><span class="path1"></span><span
                                                    class="path2"></span></i>Buff
                                            đánh giá & checkin nhanh</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Comment Facebook <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/5"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Comment
                                            Rẻ</a></li>
                                    <li><a href="/services/41"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Comment tích
                                            xanh</a></li>
                                    <li><a href="/services/6"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Comment
                                            Nhanh</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Follow Facebook <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/12"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Follow
                                            Facebook Rẻ</a></li>
                                    <li><a href="/services/13"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Follow
                                            Facebook Nhanh</a></li>
                                    <li><a href="/services/33"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Sub
                                            Vip Rẻ</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Mắt Live <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/7"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Mắt
                                            Live Rẻ</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Share <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/8"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Share Rẻ</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Like Fanpage <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/9"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Like
                                            Fanpage Rẻ</a></li>
                                    <li><a href="/services/10"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Like
                                            Fanpage Nhanh</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Member Group <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/11"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Member Group
                                            Rẻ</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>View Facebook <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/14"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>View
                                            Video</a></li>
                                    <li><a href="/services/15"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>View
                                            Story</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Vip Facebook <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/16"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Vip
                                            Like</a></li>
                                    <li><a href="/services/17"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Vip
                                            Comment</a></li>
                                    <li><a href="/services/18"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Vip
                                            Mắt Live</a></li>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-instagram"></i></i>
                            <span>Instagram</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Tim Instagram <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/19"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Tim
                                            Instagram</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Follow Instagram <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/20"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Follow
                                            Instagram</a></li>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-youtube"></i></i>
                            <span>Youtube</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Like Youtube <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/21"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Like
                                            Youtube</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Follow Youtube <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/22"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Follow
                                            Youtube</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>View Youtube <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/23"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>View
                                            Youtube</a></li>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-tiktok"></i> </i>
                            <span>Tiktok</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Tim Tiktok <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/24"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Tim
                                            Tiktok</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Follow Tiktok <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/25"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Follow
                                            Tiktok</a></li>
                                    <li><a href="/services/51"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Sub
                                            TEST</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>View Tiktok <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/26"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>View
                                            Tiktok</a></li>
                                    <li><a href="/services/52"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>View
                                            TEST</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Comment Tiktok <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/services/27"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Comment
                                            Tiktok</a></li>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-telegram"></i></i>
                            <span>Telegram</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Member Telegram <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <p>Không có tính năng</p>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-twitter"></i></i>
                            <span>Twitter</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview">
                                <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Follow Twitter <span
                                        class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <p>Không có tính năng</p>

                                </ul>
                            </li>

                        </ul>
                    </li>



                </ul>
                -->

                    <div class="sidebar-widgets">
                        <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
                            <div class="text-center">
                                <img src="../images/respawn/social.png" class="sideimg p-5" alt="">
                                <h4 class="title-bx text-primary">Dịch vụ mạng xã hội</h4>
                                <a href="#" class="py-10 fs-14 mb-0 text-primary">
                                    Giá rẻ chất lượng <i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="copyright text-center m-25">
                            <p><strong class="d-block">Giao diện độc quyền</strong> ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> dichvufb24h.com All Rights Reserved
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</aside>

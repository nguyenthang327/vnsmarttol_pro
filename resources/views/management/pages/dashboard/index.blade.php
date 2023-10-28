@extends('management.layouts.master', ['noBreadcrumb' => true])

@section('css_page')
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-primary-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/wallet.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">SỐ DƯ (VNĐ)</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/wallet.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">TỔNG NẠP (VNĐ)</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/running.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">ĐƠN ĐANG CHẠY</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/finish.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">ĐƠN HOÀN THÀNH</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-primary-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/purchase.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">TỔNG DÙNG (VNĐ)</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/wallet.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">TIỀN HOÀN (VNĐ)</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/running.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">ĐƠN CHỜ XỬ LÝ</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body text-center">
                                <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                                    <img src="{{asset('management/assets')}}/images/respawn/finish.png" class="" alt="" />
                                </div>
                                <p class="text-fade mt-15 mb-5">ĐƠN LỖI</p>
                                <h4 class="mt-0">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <h4 class="card-title">Danh Sách Server</h4>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" id="chonsv" name="chonsv">
                            <option value="1">ID[2] - [Facebook] - (Giá 7 VNĐ / 1 Seeding) - [Like Rẻ] - Chỉ Tăng Like
                            </option>
                            <option value="2">ID[5] - [Facebook] - (Giá 15 VNĐ / 1 Seeding) - [Like Nhanh] - - Tốc độ
                                lên nhanh, max 10k like, không bảo hành</option>
                            <option value="3">ID[8] - [Facebook] - (Giá 65 VNĐ / 1 Seeding) - [Like Comment] - - Tốc
                                độ: 1-10k/ngày</option>
                            <option value="3">ID[9] - [Facebook] - (Giá 35 VNĐ / 1 Seeding) - [Like Comment] - - Tốc
                                độ: 1-10k/ngày</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><button type="submit" name="submit" id="submit" class="btn btn-danger"
                                    onclick="submit();"><i class="fas fa-star-of-david"></i> MUA NGAY <i
                                        class="fas fa-star-of-david"></i></button></center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Cấp Độ Ưu Đãi</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>Số Thứ Tự</th>
                                        <th>Nạp Kích Hoạt</th>
                                        <th>Tên Gói</th>
                                        <th>Ưu Đãi</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>500,000 VNĐ</td>
                                        <td>CTV PRO</td>
                                        <td>Hưởng giá dịch vụ ưu đãi</td>
                                        <td><span class="badge badge-info" type="button" onclick="update1();">Nâng
                                                Cấp</span> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>1,000,000 VNĐ</td>
                                        <td>CTV VIP</td>
                                        <td>Hưởng giá dịch vụ tốt + Support chat riêng</td>
                                        <td><span class="badge badge-info" type="button" onclick="update2();">Nâng
                                                Cấp</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>5,000,000 VNĐ</td>
                                        <td>Đại Lý PRO</td>
                                        <td>Hưởng giá dịch vụ siêu ưu đãi + Support chat riêng + Thêm nhiều dịch vụ free
                                        </td>
                                        <td><span class="badge badge-info" type="button" onclick="update3();">Nâng
                                                Cấp</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>10,000,000 VNĐ</td>
                                        <td>Đại Lý VIP</td>
                                        <td>Hưởng giá dịch vụ siêu Tốt + Support chat riêng + Thêm nhiều dịch vụ free- Hỗ
                                            trợ mọi vấn đề về tool</td>
                                        <td><span class="badge badge-info" type="button" onclick="update4();">Nâng
                                                Cấp</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>30,000,000 VNĐ</td>
                                        <td>Nhà Phân Phối VIP</td>
                                        <td>Hưởng giá dịch vụ tốt nhất thị trường + Support chat riêng + Thêm nhiều dịch vụ
                                            free- Hỗ trợ mọi vấn đề về tool + Hỗ trợ tạo website</td>
                                        <td><span class="badge badge-info" type="button" onclick="update5();">Nâng
                                                Cấp</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Thông Báo Hệ Thống</h4>
                    </div>
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-bordered-sm rounded-circle" src="/images/adminnoti.png"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">ADMIN</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                    </span>
                                    <span class="description">2023-04-23 23:19:12</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="activitytimeline">
                                    <h4>Thông báo hỗ trợ dịch vụ Website của chúng tôi</h4>
                                    <p>
                                    <h3 class=""><span style="font-family: Arial;">Trong quá trình sử dụng web, việc
                                            gặp phải lỗi là khó tránh khỏi. Đừng ngần ngại hãy inbox cho Admin để được hỗ
                                            trợ nhanh nhất. Chúng tôi cam kết hoàn tiền 100% nếu lỗi thuộc về phía Website.
                                        </span><a href="#" target="_blank"><span
                                                style="font-family: Arial;">Zalo Admin: 0123456789</span></a></h3>
                                    </p>
                                    <ul class="list-inline">
                                        <li><a href="#" class="link-black text-sm"><i
                                                    class="fa fa-share margin-r-5"></i> Share</a></li>
                                        <li><a href="#" class="link-black text-sm"><i
                                                    class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                        </li>
                                        <li class="pull-right">
                                            <a href="#" class="link-black text-sm"><i
                                                    class="fa fa-comments-o margin-r-5"></i> Comments</a>
                                        </li>
                                    </ul>
                                    <form class="form-element">
                                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN: MÃ NGUỒN ĐƯỢC VIẾT BỞI RESPAWN DEVELOPER MUASITE.COM -->

            <div class="col-xl-12 col-12">
                <div class="box">
                    <div class="box-body">
                        <h4 class="box-title">FACEBOOK</h4>
                        <h6> Đơn giá: 1 sản phẩm / giá tiền </h6>
                        <div class="table-responsive">
                            <table class="table b-1 border-primary">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center">THƯƠNG HIỆU</th>
                                        <th class="text-center">TÊN SẢN PHẨM</th>
                                        <th class="text-center">QUỐC GIA</th>
                                        <th class="text-center">CÒN LẠI</th>
                                        <th class="text-center">ĐÃ BÁN</th>
                                        <th class="text-center">GIÁ BÁN</th>
                                        <th class="text-center">CHỨC NĂNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><img src="/brand/facebook/facebook.png" width="50px">
                                        </td>
                                        <td class="text-center">VIA Việt<br>UID|PASS|2FA</td>
                                        <td class="text-center"><img src="/brand/flags/vn.png" width="30px"></td>
                                        <td class="text-center text-success">

                                            10
                                        </td>
                                        <td class="text-center text-danger">

                                            2

                                        </td>

                                        <td class="text-center">1.000 VNĐ</td>
                                        <td class="text-center"> <a type="button" href="/clound/1"
                                                class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp;Mua
                                                ngay</a>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="font-semibold text-gray-800 "> Dùng điện thoại <i class="fas fa-mobile-alt"></i>, hãy
                            vuốt bảng từ phải qua trái <i class="fas fa-arrow-left"></i> để xem đầy đủ thông tin! </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-12 col-12">
                <div class="box">
                    <div class="box-body">
                        <h4 class="box-title">HOTMAIL</h4>
                        <h6> Đơn giá: 1 sản phẩm / giá tiền </h6>
                        <div class="table-responsive">
                            <table class="table b-1 border-danger">
                                <thead class="bg-danger">
                                    <tr>
                                        <th class="text-center">THƯƠNG HIỆU</th>
                                        <th class="text-center">TÊN SẢN PHẨM</th>
                                        <th class="text-center">QUỐC GIA</th>
                                        <th class="text-center">CÒN LẠI</th>
                                        <th class="text-center">ĐÃ BÁN</th>
                                        <th class="text-center">GIÁ BÁN</th>
                                        <th class="text-center">CHỨC NĂNG</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="font-semibold text-gray-800 "> Dùng điện thoại <i class="fas fa-mobile-alt"></i>, hãy
                            vuốt bảng từ phải qua trái <i class="fas fa-arrow-left"></i> để xem đầy đủ thông tin! </div>
                    </div>

                </div>
            </div>

            {{-- <div class="col-xl-12 col-12">
                <div class="box">
                    <div class="box-body">
                        <h4 class="box-title">TOOL SPAM BĂM LIVE</h4>
                        <h6> Đơn giá: 1 sản phẩm / giá tiền </h6>
                        <div class="table-responsive">
                            <table class="table b-1 border-success">
                                <thead class="bg-success">
                                    <tr>
                                        <th class="text-center">THƯƠNG HIỆU</th>
                                        <th class="text-center">TÊN SẢN PHẨM</th>
                                        <th class="text-center">QUỐC GIA</th>
                                        <th class="text-center">CÒN LẠI</th>
                                        <th class="text-center">ĐÃ BÁN</th>
                                        <th class="text-center">GIÁ BÁN</th>
                                        <th class="text-center">CHỨC NĂNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><img
                                                src="https://banner2.cleanpng.com/20180412/kye/kisspng-python-programming-language-computer-programming-language-5acfdc3636bac7.8891188615235717662242.jpg"
                                                width="50px"></td>
                                        <td class="text-center">TOOL KÍT ĐỖ CRACK <br>Chỉ gồm 1 chế độ ( tự chọn ) nhắn tin
                                            cho ADMIN để nhận file tool và hỗ trợ cài đặt </td>
                                        <td class="text-center"><img src="/brand/flags/vn.png" width="30px"></td>
                                        <td class="text-center text-success">

                                            17
                                        </td>
                                        <td class="text-center text-danger">

                                            0

                                        </td>

                                        <td class="text-center">888.888 VNĐ</td>
                                        <td class="text-center"> <a type="button" href="/clound/2"
                                                class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp;Mua
                                                ngay</a>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><img
                                                src="https://banner2.cleanpng.com/20180412/kye/kisspng-python-programming-language-computer-programming-language-5acfdc3636bac7.8891188615235717662242.jpg"
                                                width="50px"></td>
                                        <td class="text-center">TOOL SPAM PYTHON 1 MODE<br>Chỉ gồm 1 chế độ ( tự chọn )
                                            nhắn tin cho ADMIN để nhận file tool và hỗ trợ cài đặt</td>
                                        <td class="text-center"><img src="/brand/flags/vn.png" width="30px"></td>
                                        <td class="text-center text-success">

                                            10
                                        </td>
                                        <td class="text-center text-danger">

                                            2

                                        </td>

                                        <td class="text-center">555.555 VNĐ</td>
                                        <td class="text-center"> <a type="button" href="/clound/1"
                                                class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp;Mua
                                                ngay</a>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="font-semibold text-gray-800 "> Dùng điện thoại <i class="fas fa-mobile-alt"></i>, hãy
                            vuốt bảng từ phải qua trái <i class="fas fa-arrow-left"></i> để xem đầy đủ thông tin! </div>
                    </div> --}}

                </div>
            </div>

            <!-- END: KẾT THÚC MỘT CUỘC TÌNH -->






        </div>
    </section>
@endsection

@section('js_page')
@endsection

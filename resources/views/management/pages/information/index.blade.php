@extends('management.layouts.master')

@section('css_page')
@endsection

{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="mdi mdi-home-outline"></i>Trang Chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Thông Tin Tài Khoản</li>
@endsection --}}

@section('content')
    <div class="main-content">

        <div class="card">
            <div class="card-body">
                <h4>Thông Tin Tài Khoản</h4>

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="d-md-flex align-items-center">
                                    <div class="text-center text-sm-left ">
                                        <div class="avatar avatar-image" style="width: 150px; height:150px">
                                            <img src="{{ $user->avatar ?? asset('management/assets/images/avatar.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="text-center text-sm-left m-v-15 p-l-30">
                                        <h2 class="m-b-5">{{$user->full_name}}
                                            <img class="icon-tick" src="{{ asset('management/assets/images/tick.svg') }}"
                                                alt="" />
                                        </h2>
                                        <p class="text-opacity font-size-15">
                                            <i class="fas fa-envelope text-success"></i>
                                            {{ $user->email }}
                                        </p>
                                        <p class="text-dark m-b-20">
                                            <i class="fas fa-user text-primary"></i>
                                            Nhà phân phối
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="d-md-block d-none border-left col-1"></div>
                                    <div class="col">
                                        <ul class="list-unstyled m-t-10">
                                            <li class="row">
                                                <p class="col-sm-5 col-5 font-weight-semibold text-dark m-b-5">
                                                    <i class="text-success far fa-money-bill-alt"></i>
                                                    <span>Số dư: </span>
                                                </p>
                                                <p class="col font-weight-semibold text-money"> 376,842 VND</p>
                                            </li>
                                            <li class="row">
                                                <p class="col-sm-5 col-5 font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 fas fa-money-check-alt text-danger"></i>
                                                    <span>Đã nạp: </span>
                                                </p>
                                                <p class="col font-weight-semibold text-money"> 2,500,000 VND</p>
                                            </li>
                                            <li class="row">
                                                <p class="col-sm-5 col-5 font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary fa fa-phone"></i>
                                                    <span>Số điện thoại: </span>
                                                </p>
                                                <p class="col font-weight-semibold"> {{$user->phone}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Cập Nhật Tài Khoản</h5>
                                <p class="text-primary">Bạn nên cập nhật mật khẩu thường xuyên để giữ tài khoản được an
                                    toàn.</p>
                                <hr>
                                <form class="form-json" method="POST" action="{{route('information.update')}}">
                                    <div class="m-t-20">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label" for="username">Tài Khoản</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" name="username" value="{{$user->username}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Họ tên</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" name="full_name" value="{{$user->full_name}}" required
                                                    minlength="2" maxlength="100">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Link ảnh đại diện</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="url" class="form-control" name="avatar" value="{{$user->avatar}}">

                                                <div class="alert alert-success">
                                                    Website hỗ trợ get link ảnh: <a href="https://imgur.com/upload"
                                                        target="_blank">Tại Đây</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label" for="email">Email

                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>


                                        {{-- <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="text-danger mb-1">Vui lòng xác nhận "Xác nhận email". Email sau
                                                    khi xác nhận sẽ được dùng để khôi phục mật khẩu...</div>
                                                <label class="cb-container">Xác nhận email
                                                    <input type="checkbox" name="email_verified">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div> --}}


                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Số Điện Thoại</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </span></div>
                                                    <input type="number" id="phone" name="phone"
                                                        class="form-control" value="{{$user->phone}}"
                                                        placeholder="Số Điện Thoại" minlength="10" maxlength="11"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Link Facebook</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" type="url" id="url"
                                                    name="facebook" value="{{$user->facebook}}" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Mật Khẩu Cũ</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" type="password" name="old_password"
                                                    autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Mật Khẩu Mới</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" type="password" name="new_password"
                                                    minlength="6" maxlength="32">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Xác Nhận Mật Khẩu</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" type="password" name="confirm_password"
                                                    minlength="6" maxlength="32">

                                                <div class="alert alert-danger mt-2">
                                                    Nếu bạn có website con, Cần cập nhật lại API KEY khi đổi mật khẩu
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row telegram-configs">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Hạn chế thông báo từ web
                                                con</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h6 class="mt-2">Chỉ thông báo hoàn tiền ở tài khoản mua (nếu bạn có
                                                    website con, khách đó mua bị hoàn chỉ họ nhận được thông báo, còn bạn sẽ
                                                    không nhận được để hạn chế spam)</h6>
                                                <div class="d-flex align-items-center switch-wrapper">
                                                    <label>Tắt</label>
                                                    <div class="switch m-r-10">
                                                        <input type="checkbox" id="less_notify" checked>
                                                        <label for="less_notify"></label>
                                                    </div>
                                                    <label>Bật</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Trạng thái Telegram:</label>
                                            <div class="col-lg-9 col-xl-6 pt-2">

                                                <span class="text-danger fa fa-times pr-1"></span>Chưa liên kết
                                                <p>Nhấn vào <a href="http://t.me/TeleThongBaoHeThongBot"
                                                        target="_blank">Đây</a> để xem hướng dẫn</p>

                                                <p class="pt-2">Đổi ngôn ngữ tiếng việt cho Telegram Click: <a
                                                        href="https://t.me/setlanguage/abcxyz" target="_blank">Tại đây</a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Chức năng Telegram</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <ol style="color: black;padding-left: 10px">
                                                    <li>Cảnh báo đăng nhập, đổi mật khẩu v.v để bảo mật nick an toàn</li>
                                                    <li>Nhận mã OTP khi đăng nhập vào hệ thống</li>
                                                    <li>Thông báo tin tức cập nhật mới quan trọng của website(tăng giảm giá,
                                                        khuyến mại, gói mới, gói hot v.v)</li>
                                                    <li>Thông báo nạp tiền thành công, hết tiền để nạp tiền cho khách hàng
                                                        sử dụng v.v</li>
                                                    <li>Thông báo dịch vụ bị hoàn tiền và uid hết hạn.</li>
                                                </ol>
                                            </div>
                                        </div> --}}



                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Lưu Thông Tin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js_page')
@endsection

@extends('admin.layouts.master')

@section('css_page')
    <link rel="stylesheet" href="{{ asset('management/assets/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Thêm Thanh Toán</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thêm Thanh Toán</h4>
            </div>
            <div class="card-body">
                <form id="formAdminAction" class="kt-form" method="POST" action="{{ route('admin.user.addMoney') }}">
                    <div class="form-group">
                        <label for="user_id">Chọn Tài Khoản</label>
                        <select class="form-control select2-hidden-accessible" id="user_id" name="user_id" autocomplete="off" required="">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->username . " - " . number_format($user->price) . " VNĐ" }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Số tiền cộng thêm</label>
                        <input type="number" min="0" max="99999999" class="form-control" name="amount" value="0" autocomplete="off" required="">
                    </div>

                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" id="note" name="note" autocomplete="off">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Hoàn Tất</button>
                        <button type="reset" class="btn btn-secondary">Đặt lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#user_id").select2({
                placeholder: "Chọn tài khoản",
                allowClear: !0
            });
        });
    </script>

@endsection

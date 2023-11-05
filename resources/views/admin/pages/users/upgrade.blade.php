@extends('admin.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Nâng cấp Thành Viên</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Nâng cấp Thành Viên</h4>
            </div>
            <div class="card-body">
                <form id="formAdminAction" class="kt-form" method="POST" action="{{ route('admin.user.upgrade_user') }}">
                    <div class="form-group">
                        <label for="user_id">Chọn Tài Khoản</label>
                        <select class="form-control" id="user_id" name="user_id"
                                autocomplete="off" required="">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->username . " - " . number_format($user->price) . " VNĐ - " . \App\Helpers\StringHelper::getUserRole($user->ugroup) }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ugroup">Chức Vụ</label>
                        <select id="ugroup" name="ugroup" class="form-control">
                            <option value="0">Thành Viên</option>
                            <option value="1">Cộng tác viên</option>
                            <option value="2">Đại lý</option>
                            <option value="3">Nhà phân phối</option>
                        </select>
                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Hoàn Tất</button>
                            <button type="reset" class="btn btn-secondary">Đặt lại</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script>
        $(document).ready(function () {
            $("#user_id").select2({
                placeholder: "Chọn tài khoản",
                allowClear: !0
            });
        });
    </script>

@endsection

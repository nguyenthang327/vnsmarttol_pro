@extends('management.layouts.master')

@section('css_page')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="mdi mdi-home-outline"></i>Trang Chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Thông Tin Tài Khoản</li>
@endsection

@section('content')
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="box">
                            <!-- /.box-header -->

                            <div class="box-body">
                                <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i>Thông
                                    tin tài khoản</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <h5 class="card-title">Thông tin tài khoản</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email tài khoản</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" value="minhquynhhue1@gmail.com"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">API Token </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" value="iEngoASKUY26juLm8NOrcbHwZ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="box">
                            <!-- /.box-header -->

                            <div class="box-body">
                                <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Cập
                                    nhật mật khẩu</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h5 class="card-title">Mật khẩu</h5>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Mật khẩu mới</label>
                                            <div class="col-lg-12">
                                                <input type="password" class="form-control" name="oldpass" id="oldpass">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Nhập lại</label>
                                            <div class="col-lg-12">
                                                <input type="password" class="form-control" name="newpass" id="newpass">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-lg-12">
                        <span class="badge badge-info" type="button" onclick="copy('iEngoASKUY26juLm8NOrcbHwZ');"><i
                                class="fas fa-copy"></i>
                            Token</span>
                        <span class="badge badge-primary" type="button" onclick="update6();"><i
                                class="fas fa-exchange-alt"></i> Token</span>
                        <span class="badge badge-danger" type="button" onclick="update7();">Cập Nhật Mật
                            khẩu</span>
                    </div>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
@endsection

@section('js_page')

@endsection

@extends('admin.layouts.master')

@section('css_page')

@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Mã Giảm Giá</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="alert alert-primary">
                    Đối với Mã quà tặng, "Giới hạn" là tổng số lần áp dụng mã (mỗi user được áp dụng tối đa 1 lần).<br/>
                    Mã code sẽ được tự động chuyển về ký tự in hoa, và cắt khoảng trắng ở đầu và cuối.
                </div>

                <div class="mt-3">
                    <div class="label-bold">
                        Lọc theo loại
                    </div>
                    <ul class="nav nav-pills tab-filter tab-type" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-success" data-toggle="tab" href="#" data-status="all">
                                  <span class="nav-icon">
                                    <i class="fa fa-list text-success"></i>
                                  </span>
                                <span class="nav-text">Tất cả</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" data-toggle="tab" href="#" data-type="discount">
                                  <span class="nav-icon">
                                    <i class="fa fa-tags text-success"></i>
                                  </span>
                                <span class="nav-text"> Mã giảm giá</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" data-toggle="tab" href="#" data-type="money_gift">
              <span class="nav-icon">
                <i class="fas fa-money-bill-wave text-primary"></i>
              </span>
                                <span class="nav-text"> Mã quà tặng</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive mb-3 mt-4">
                    <table class="table table-bordered table-hover" id="datatable-list"></table>
                </div>
                <button class="btn btn-success btn-add"><span class="fas fa-plus"></span> THÊM MỚI</button>
            </div>
        </div>
    </div>


    <!--begin::Modal-->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="form-json" action="{{ route('admin.discount.store') }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm / Sửa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" class="form-control" value=""/>

                        <div class="form-group">
                            <label>Mã code</label>
                            <input name="code" class="form-control" required style="text-transform: uppercase"
                                   placeholder="Các mã ngăn cách bởi dấu |"/>

                            <div class="alert alert-primary">
                                Bạn có thể nhập nhiều mã giảm giá cùng lúc theo cũ pháp CODE1|CODE2|CODE3... (chỉ có tác
                                dụng khi "Thêm mới")
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Loại</label>
                            <select class="form-control" name="code_type">
                                <option value="discount">Mã giảm giá</option>
                                <option value="money_gift">Mã quà tặng (tiền)</option>
                            </select>

                            <div class="text-danger mt-1">Vui lòng không đổi loại nếu bạn đang sửa mã code</div>
                        </div>

                        <div class="form-group discount-item">
                            <label>Phần trăm</label>
                            <input type="number" name="discount_percent" class="form-control" max="100" required/>
                        </div>

                        <div class="form-group">
                            <label>Hiệu lực</label>
                            <select name="enable" class="form-control">
                                <option value="1">Có</option>
                                <option value="0">Không</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="discount-item">Giới hạn / User</label>
                            <label class="gift-item">Tổng số lần áp dụng</label>
                            <input type="number" name="limit_per_user" class="form-control" required/>
                        </div>

                        <div class="form-group discount-item">
                            <label>Đơn tối thiểu</label>
                            <input type="number" name="min_order" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label class="discount-item">Giảm tối đa</label>
                            <label class="gift-item">Giá trị (VND)</label>
                            <input type="number" name="max_discount" class="form-control" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hoàn tất</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Modal-->
@endsection

@section('js_page')
    <script src="{{ asset('admin/datatable-discount-codes.js') }}"></script>
@endsection

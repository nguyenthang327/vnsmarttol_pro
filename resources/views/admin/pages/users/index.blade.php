@extends('admin.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.dashboard.index') }}" class="breadcrumb-item"><i
                            class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Danh Sách Thành Viên</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Danh Sách Thành Viên</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <button id="btn-add-user" class="btn btn-success mb-4">Thêm người dùng mới</button>
                    <div id="datatable-ajax_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable no-footer" id="datatable-ajax">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Username</th>
                                        <th>Chức vụ</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Số dư</th>
                                        <th>Tổng nạp</th>
                                        <th>Lượt quay</th>
                                        <th>Thời gian tạo</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--begin::Modal-->
    <div class="modal fade" id="modalAddMoney" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm tiền vào tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form-json" action="https://vnsmarttol.com/qladmin/user/addMoney" method="post">
                    <input type="hidden" name="user_id" value="">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="price">Số tiền cộng thêm</label>
                            <input type="number" min="0" max="99999999" class="form-control" name="amount" value="0"
                                   autocomplete="off" required="">
                        </div>

                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <input type="text" class="form-control" name="note" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hoàn tất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalSubtractMoney" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Trừ tiền trong tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form-json" action="https://vnsmarttol.com/qladmin/user/subtractMoney" method="post">
                    <input type="hidden" name="user_id" value="">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="price">Số tiền trừ đi</label>
                            <input type="number" min="0" class="form-control" name="amount" value="0" autocomplete="off"
                                   required="">
                        </div>

                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <input type="text" class="form-control" name="note" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hoàn tất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalAddUser" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng ký người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-json" action="{{ route('admin.user.create') }}" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control text-lowercase" name="username" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control text-lowercase" name="email" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" class="form-control" name="full_name" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="number" class="form-control" name="phone" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="url" class="form-control" name="facebook" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label for="ugroup">Chức Vụ</label>
                            <select name="ugroup" id="ugroup" class="form-control">
                                <option value="0">Thành Viên</option>
                                <option value="1">Cộng tác viên</option>
                                <option value="2">Đại lý</option>
                                <option value="3">Nhà phân phối</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hoàn tất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalEditUser" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa thông tin người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form-json" action="{{ route('admin.user.update') }}" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" class="form-control" name="full_name" autocomplete="off" required="">
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="number" class="form-control" name="phone" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="url" class="form-control" name="facebook" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Lượt quay vòng quay may mắn</label>
                            <input type="number" class="form-control" name="spin_count" autocomplete="off" required="">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới (Chỉ điền khi bạn muốn thay đổi mật khẩu cho người dùng)</label>
                            <input type="password" class="form-control" name="password" autocomplete="off">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ugroup">Chức Vụ</label>
                                    <select name="ugroup" class="form-control">
                                        <option value="0">Thành Viên</option>
                                        <option value="1">Cộng tác viên</option>
                                        <option value="2">Đại lý</option>
                                        <option value="3">Nhà phân phối</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Bình thường</option>
                                        <option value="0">Bị khoá</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Lý do khoá (Chỉ điền khi bạn khoá tài khoản này)</label>
                            <textarea class="form-control" name="reason"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hoàn tất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script src="{{ asset("admin/datatable-user.js") }}"></script>
@endsection

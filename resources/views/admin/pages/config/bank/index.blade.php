@extends('admin.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">

            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Thông tin ngân hàng</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thông tin ngân hàng</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="datatable-ajax-manual">
                    <thead>
                        <tr>
                            <th>Ngân hàng</th>
                            <th>Tên ngân hàng</th>
                            <th>Số Tài Khoản</th>
                            <th>Tên Tài Khoản</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <div class="form-actions">
                    <button class="btn btn-success btn-add-bank" data-toggle="modal" data-target="#modalBank">Tạo
                        mới</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBank" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin ngân hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/qladmin/banks" method="post" class="form-json" data-reload="1">
                    <input type="hidden" name="id" id="id" />
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Ngân hàng</label>
                            <select class="form-control" name="mabank" required>

                                {{-- <option value="vietcombank">Vietcombank</option> --}}

                                {{-- <option value="techcombank">Techcombank</option> --}}

                                <option value="mbb">MB Bank</option>

                                {{-- <option value="momo">Ví MoMo</option>

                                <option value="acb">ACB - Á châu</option> --}}

                                {{-- <option value="agribank">Agribank</option>

                                <option value="bidv">BIDV</option>

                                <option value="sacombank">Sacombank</option>

                                <option value="vietinbank">Viettinbank</option>

                                <option value="vpbank">VP Bank</option>

                                <option value="tpbank">TPBank - Tiên Phong</option>

                                <option value="vib">VIB - Quốc tế</option>

                                <option value="seabank">SeABank</option>

                                <option value="dab">Đông Á Bank</option>

                                <option value="baoviet">Bảo Việt Bank</option>

                                <option value="lpb">LienVietPostBank</option>

                                <option value="abbank">ABBANK</option>

                                <option value="bacabank">BacABank</option>

                                <option value="eximbank">Eximbank</option>

                                <option value="shinhanbank">Shinhan Bank</option>

                                <option value="scb">Sài Gòn – SCB</option>

                                <option value="msb">Hàng Hải Việt Nam</option>

                                <option value="pvcom">PVcom Bank</option>

                                <option value="ocb">Phương Đông – OCB</option>

                                <option value="hdbank">HDBank</option>

                                <option value="pgbank">Petrolimex – PG Bank</option>

                                <option value="saigonbank">Sài Gòn – Saigonbank</option>

                                 --}}
                                <option value="other">Khác</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tên ngân hàng</label>
                            <input class="form-control" name="bank_name" maxlength="200" />
                        </div>

                        <div class="form-group">
                            <label>Chủ thẻ</label>
                            <input class="form-control" name="card_holder" maxlength="200" required />
                        </div>

                        <div class="form-group">
                            <label>Số tài Khoản</label>
                            <input class="form-control" name="account_number" maxlength="200" required />
                        </div>

                        <!--          <div class="form-group">-->
                        <!--            <small class="form-text text-danger font-weight-bold">Ngân hàng nào bạn đã setup auto thì để chế độ Có auto để khách ưu tiên chuyển tiền hơn.</small>-->
                        <!--            <label>Nạp tiền tự động (nếu đã cài auto rồi thì mới chọn có)</label>-->

                        <!--            <select class="form-control" name="is_auto" required>-->
                        <!--              <option value="0">Không</option>-->
                        <!--              <option value="1">Có</option>-->
                        <!--            </select>-->
                        <!--          </div>-->

                        <div class="form-group">
                            <label>Ảnh/Mã QR</label>
                            <p class="text-primary">Hệ thống sẽ tự tạo mã QR với nội dung chuyển khoản và ngân hàng đã chọn.
                                Bạn vẫn có thể điền Ảnh/Mã QR cho Momo và các ngân hàng không nằm trong danh sách</p>
                            <input class="form-control" name="image" type="url_image" maxlength="240" />

                            <div class="alert alert-warning">
                                Website hỗ trợ get link ảnh: <a href="https://linkanh.xyz/" target="_blank">Tại Đây</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nội dung nạp</label>
                            <input class="form-control" name="note" required />
                        </div>

                        <div class="form-group">
                            <label>Mốc nạp tối thiểu</label>
                            <input type="number" class="form-control" placeholder="10000" name="min_bank" required
                                min="1" />
                        </div>

                        <div class="form-group">
                            <label>Tỷ giá nạp (100 ATM = 100 VNĐ)</label>
                            <input type="number" class="form-control" name="discount" placeholder="10000" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Mật khẩu internet Banking (MOMO nhập SĐT)</label>
                            <input type="text" class="form-control" id="password_bank" name="password_bank" badge bg
                                value="Không dùng">
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Token Đối Tác (Web2M)</label>
                            <input type="text" class="form-control" id="token" name="token" badge bg
                                value="Không dùng">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Hoàn thành</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js_page')
    <script src="{{ asset('admin/pages/config-bank.js') }}"></script>
@endsection

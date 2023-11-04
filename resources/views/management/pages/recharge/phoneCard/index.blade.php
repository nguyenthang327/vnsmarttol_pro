@extends('management.layouts.master')

@section('css_page')
@endsection

@section('content')
    <div class="main-content">

        <div class="card">
            <div class="card-body">
                <h4>Nạp Thẻ Cào</h4>

                <div class="card">
                    <div class="card-body">
                        <section class="content">

                            <!-- Basic Forms -->
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form class="form-json" action="{{ route('phoneCard.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Loại thẻ</label>
                                                    <select class="form-control" name="NetworkCode" id="NetworkCode">
                                                        <option value="VIETTEL">VIETTEL (Chiết khấu 25%) </option>
                                                        <option value="MOBIFONE">MOBIFONE (Chiết khấu 25%) </option>
                                                        <option value="VINAPHONE">VINAPHONE (Chiết khấu 25%) </option>
                                                        <option value="VIETNAMOBILE">VIETNAMOBILE (Chiết khấu 25%)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Mệnh giá</label>
                                                    <select class="form-control" name="PricesExchange" id="PricesExchange">
                                                        <option value="10000">10.000 VNĐ</option>
                                                        <option value="20000">20.000 VNĐ</option>
                                                        <option value="30000">30.000 VNĐ</option>
                                                        <option value="50000">50.000 VNĐ</option>
                                                        <option value="100000">100.000 VNĐ</option>
                                                        <option value="200000">200.000 VNĐ</option>
                                                        <option value="300000">300.000 VNĐ</option>
                                                        <option value="500000">500.000 VNĐ</option>
                                                        <option value="1000000">1.000.000 VNĐ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Seri</label>
                                                    <input type="text" id="SeriCard" name="SeriCard"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Mã thẻ</label>
                                                    <input type="text" id="NumberCard" name="NumberCard"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <button onclick="submit();" type="submit" name="submit" id="submit"
                                                        class="btn btn-primary btn-block">Nạp ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </form>

                                    {{-- <div class="page-header">
                        <div class="page-title">
                            <h4>Lịch sử nạp tiền</h4>
                            <h6>(Hệ thống tự động cộng tiền sau 1 phút)</h6>
                        </div>
                    </div>
                    <form method="GET">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Thời Gian</label>
                                    <div class="input-groupicon">
                                        <input name="date" id="date" type="date" placeholder="DD-MM-YYYY"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Mã Đơn</label>
                                    <input type="text" id="code" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Hành động</label>
                                    <button class="btn btn-success" type="submit">Tìm kiếm</button>
                                    <a href="/clound/card.html" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Loại thẻ</th>
                                        <th>Mã giao dịch</th>
                                        <th>Seri</th>
                                        <th>Mã thẻ</th>
                                        <th>Số tiền</th>
                                        <th>Thực nhận</th>
                                        <th>Thời gian nạp</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Viettel</td>
                                        <td>4132930</td>
                                        <td>10004526652256</td>
                                        <td>569966334587896</td>
                                        <td>10,000 VNĐ</td>
                                        <td>7,500 VNĐ</td>
                                        <td>2023-03-10 13:45:35</td>
                                        <td> <span class="badge badge-danger">error</span> </td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <center>
                        <ul class="pagination">

                        </ul>
                    </center> --}}

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                        </section>
                    </div>
                </div>
            </div>
            {{-- <div class="card"> --}}
                <div class="card-header">
                    <h4 class="card-title">Lịch sử nạp tiền</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-ajax_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable no-footer" id="datatable-ajax">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Loại thẻ</th>
                                            <th>Mã giao dịch</th>
                                            <th>Seri</th>
                                            <th>Mã thẻ</th>
                                            <th>Số tiền</th>
                                            <th>Thực nhận</th>
                                            <th>Thời gian nạp</th>
                                            <th>Trạng thái</th>
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
            {{-- </div> --}}
        </div>
    </div>
@endsection

@section('js_page')
    <script src="{{ asset("management/assets/js/pages/recharge-card.js") }}"></script>
@endsection

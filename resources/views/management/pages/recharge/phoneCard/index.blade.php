@extends('management.layouts.master')

@section('css_page')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="mdi mdi-home-outline"></i>Trang Chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Nạp Thẻ Cào</li>
@endsection

@section('content')
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Loại thẻ</label>
                            <select class="form-select" name="NetworkCode" id="NetworkCode">
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
                            <select class="form-select" name="PricesExchange" id="PricesExchange">
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
                            <input type="text" id="SeriCard" name="SeriCard" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Mã thẻ</label>
                            <input type="text" id="NumberCard" name="NumberCard" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <button onclick="submit();" type="submit" name="submit" id="submit"
                                class="btn btn-primary btn-block">Nạp ngay</button>
                        </div>
                    </div>


                    <div class="page-header">
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
                    </center>
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

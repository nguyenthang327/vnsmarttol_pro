@extends('management.layouts.master')

@section('css_page')
    <link href="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .payment-note {
            padding: 5px 10px;
            font-weight: 600;
        }

        .payment-note p {
            margin-bottom: 3px
        }

        .payment-widget {
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .payment-widget .icon {
            font-size: 20px;
        }

        .payment-widget .text {
            font-size: 18px;
        }

        .payment-widget.active {
            border-color: green;
            color: green;
        }

        .content-toggle:not(.show) {
            display: none;
        }

        .btn-copy {
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-copy:hover {
            font-size: 110%;
        }

        .text-intro-payment {
            font-size: 19px;
            text-transform: uppercase;
            font-weight: 600;
            color: #2a2a2a;
            margin-bottom: 5px;
        }

        .payment-content {
            font-weight: bold;
            font-size: 22px;
        }

        .list-banks {
            margin-top: 20px;
        }

        .list-banks .nav-item img {
            max-height: 35px;
            max-width: 100px;
        }

        .list-banks .nav-link {
            padding: 7px 10px !important;
            border-radius: 0;
            height: 100%;
        }

        .list-banks+.tab-content .tab-pane {
            text-align: center;
        }

        .bank-name {
            margin-top: 10px;
        }

        .bank-name,
        .account-number {
            font-size: 22px;
            font-weight: 600;
            color: brown;
        }

        .account-name {
            font-size: 22px;
            font-weight: 600;
            color: #2d4373;
            margin-bottom: 7px;
        }

        .qr-code {
            width: 450px;
            max-width: 100%;
            height: auto;
        }

        .alert {
            display: block !important;
        }

        .list-banks a {
            position: relative;
        }

        /*.list-banks a .hot-icon {*/
        /*  position: absolute;*/
        /*  bottom: -15px;*/
        /*  right: -3px;*/
        /*}*/
        /*.payment-note .hot-icon {*/
        /*  width: 30px;*/
        /*  display: inline;*/
        /*}*/
        .offer-intro {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .momo-qr img {
            margin: 0 auto;
        }

        .alert-card i.fa {
            color: chartreuse;
        }

        #momo_qr {
            margin: 30px;
        }

        #momo_qr img {
            max-width: 100%;
            max-height: 450px;
        }

        @media only screen and (max-width: 576px) {
            .payment-widget {
                margin-bottom: 5px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .payment-widget .icon {
                font-size: 17px;
            }

            .payment-widget .text {
                font-size: 14px;
            }

            #momo_qr {
                margin: 15px;
            }
        }

        @media only screen and (max-width: 500px) {
            .offer-intro {
                font-size: 15px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content">

        <div class="card">
            <div class="card-body">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="content-toggle show" id="banking">

                            <div class="row">
                                <div class="col-md-7 mb-2">
                                    <div class="card card-body">
                                        <div class="text-center">
                                            <div class="text-intro-payment">Các ngân hàng thụ hưởng</div>

                                            {{-- <div class="payment-content alert alert-success">
                                                <span id="payment-message">naptien temisvn</span> <span
                                                    class="btn-copy fas fa-copy" data-target="#payment-message"></span>
                                            </div> --}}
                                        </div>

                                        <div class="has-border-top">
                                            <ul class="nav nav-tabs list-banks">
                                                @foreach ($listBanker as $index => $banker)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$index == 0 ? 'active' : ''}}" data-toggle="tab"
                                                            href="#bank_tab_{{ $index }}">
                                                            <img src="{{ asset("assets/images/banks/$banker->bank_code.png") }}"
                                                                alt="" />

                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>


                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                @foreach ($listBanker as $index => $banker)
                                                    <div class="tab-pane container {{$index == 0 ? 'active' : ''}}" id="bank_tab_{{ $index }}">
                                                        <div class="bank-name">{{ $banker->bank_name }}</div>

                                                        <div class="account-name">{{ $banker->account_number }}</div>
                                                        <div class="mb-2 account-number">
                                                            <span
                                                                id="bank_{{ $index }}">{{ $banker->card_holder }}</span>
                                                            <span class="btn-copy fas fa-copy"
                                                                data-target="#bank_{{ $index }}"></span>
                                                        </div>

                                                        @if ($banker->url_image)
                                                            <img class="qr-code" src="{{ $banker->url_image }}"
                                                                width="300px" height="auto" alt="" />
                                                        @endif
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mb-2">
                                    <div class="card card-body">
                                        <h5 class="text-success">Ghi Chú</h5>

                                        <div class="payment-note">

                                        </div>

                                        <hr />

                                        <h5 class="text-primary">Thống kê</h5>

                                        <div class="chart-area">
                                            <div class="widget-date-range">
                                                <div class="form-inline">

                                                    <div class="form-group">
                                                        <span class="far fa-calendar-alt"></span>
                                                        <input class="form-control" type="text" id="time_from"
                                                            autocomplete="off" />
                                                    </div>

                                                    <div class="form-group">
                                                        <span>Đến</span>
                                                        <input class="form-control" type="text" id="time_to"
                                                            autocomplete="off" />
                                                    </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-success" id="btn_view_payment">Xem</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="chart-area" style="min-height: 400px;">
                                                <div id="chart"></div>
                                            </div>

                                            <div>
                                                <h5>Tổng nạp: <span id="value_in" class="text-success">0</span><span
                                                        class="tomato">₫</span></h5>
                                                <h5>Tổng chi: <span id="value_out" class="text-danger">0</span><span
                                                        class="tomato">₫</span></h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <hr />
                        </div>



                        {{-- <div class="content-toggle" id="gift_code">
                            <div class="row">
                                <div class="col-sm-7 mb-2">
                                    <div class="card card-body has-shadow">
                                        <div class="offer-intro">
                                            Bạn có mã quà tặng? hãy nhập vào bên dưới và nhấn "Áp dụng"
                                        </div>

                                        <div class="widget-offer">
                                            <div class="input-group mb-3">
                                                <input id="offer" type="text" class="form-control"
                                                    placeholder="Mã quà tặng">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success btn-apply-offer" type="button">Áp
                                                        dụng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="card card-body has-shadow offer-note" style="min-height: 136px">
                                        <h5 class="text-danger">Lưu ý</h5>
                                        <ul style="padding-left: 25px">
                                            <li>Mỗi mã quà tặng chỉ được áp dụng 1 lần duy nhất.</li>
                                            <li>Nhập sai quá 10 lần sẽ bị cấm nhập mã quà tặng trong 24h.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Thanh Toán</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="datatable-payment"></table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js_page')
    <script src="{{ asset('management/assets/plugins/highchart/highcharts.min.js') }}"></script>
    <script src="{{ asset('management/assets/plugins/bootstrap-datetimepicker/datetimepicker.min.js') }}"></script>
    <script src="{{ asset('management/assets/js/pages/bank-atm.js') }}"></script>
@endsection

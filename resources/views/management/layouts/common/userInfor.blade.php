<div class="card widget-user">
    <div class="card-body p-b-0">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="widget__top">
                    <div class="widget__media hidden-">
                        <img src="{{ $user->avatar ?? asset('management/assets/images/avatar.jpg') }}" alt="image">
                    </div>
                    <div class="widget__content">
                        <div class="widget__head">
                            <a href="/profile/" class="widget__username text-success">
                                {{$user->username}}
                                <img class="icon-tick" src="{{ asset('management/assets/images/tick.svg') }}" alt="" />
                            </a>
                        </div>

                        <div class="widget__subhead">
                            <a href="javascript:void(0)" class="text-warning">
                                <i class="fa fa-envelope"></i><span class="__cf_email__"> {{$user->email}}</span>
                            </a>
                            <a href="javascript:void(0)" class="text-primary">
                                <i class="fa fa-user"></i> {{ session()->get('uGroup')[$user->ugroup] ?? 'Thành viên' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="widget-statistic mb-3">
                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon text-success far fa-money-bill-alt"></i>
                            </div>
                            <div>
                                <div class="text-1">Số Dư</div>
                                <div class="text-2 text-money">
                                    <span>
                                        <div class="dropdown currency-dropdown">
                                            <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                <span class="money-value">{{ number_format($user->price, 0, '', ',') }}</span>
                                                <span class="tomato currency-unit">₫</span>
                                                {{-- <span class="fa fa-chevron-down"></span> --}}
                                            </span>

                                            {{-- <div class="dropdown-menu">
                                                <div class="currency-item">
                                                    <label>Chọn tiền tệ</label>

                                                    <select class="form-control currency-select"></select>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon fas fa-money-check text-primary"></i>
                            </div>
                            <div>
                                <div class="text-1">Đã Sử Dụng</div>
                                <div class="text-2 text-money">
                                    <span>
                                        <span class="money-value">{{ number_format($user->all_money - $user->price, 0, '', ',') }}</span>
                                        <span class="currency-unit tomato">₫</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon fas fa-money-check-alt text-danger"></i>
                            </div>
                            <div>
                                <div class="text-1">Đã Nạp</div>
                                <div class="text-2 text-money">
                                    <span>
                                        <span class="money-value">{{ number_format($user->all_money, 0, '', ',') }}</span>
                                        <span class="currency-unit tomato">₫</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="icon fas fa-percent text-warning"></i>
                            </div>
                            <div>
                                <div class="text-1">Chiết Khấu</div>
                                <div class="text-2 text-money">
                                    <span>

                                        20%

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
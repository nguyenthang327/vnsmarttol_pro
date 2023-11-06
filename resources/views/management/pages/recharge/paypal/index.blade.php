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
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Nhập số tiền muốn nạp (USD) :</label>
                                                <input type="number" id="money" name="money" class="form-control"
                                                    value="" min="0" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div id="paypal-button"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js_page')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AZIhNx97wNfK2Wzz2sTU4z1y3UlUZJDcZWINIoMf4hSykQ3T5g-_fbMC2YrNELKg07WzknrQM22CUmmd',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'medium',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                var money = $("#money").val() ? $("#money").val() : 0;
                money = Math.round(money * 100) / 100;

                if(!money){
                    swalError("Vui lòng nhập số tiền muốn nạp!");
                }
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: `${money}`,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
            }
        }, '#paypal-button');
    </script>
@endsection

@extends('layouts.user')

@section('css')

@endsection

@section('user')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">


        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12"><pre id="token_response"></pre></div>
            </div>
            <div class="card">
                <h5 class="card-header">Pay With Paypal</h5>
                <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                <div class="card-body">

                    <div class='col-md-12 form-group'>
                        <div id="paypal-button"></div>
                        <input type="hidden" name="amount" class="amount" value="{{$amount->plan_amount}}">
                        <input type="hidden" name="amount" class="time" value="{{$amount->plandate}}">
                        <input type="hidden" name="amount" class="plan" value="{{$amount->id}}">
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
@section('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>


    <script>
        $(document).ready(function () {
            var amout = $('.amount').val();
            var time = $('.time').val();
            var plan = $('.plan').val();
            paypal.Button.render({
                // Configure environment
                env: 'sandbox',
                client: {
                    sandbox: 'Adhk40y6c24jvaHZbJiQuKfNgmFokZ7MxRBlcl--HBPXw4kDeVsfiXymnaPXkOGdarlrINQOwlcTNGsG',
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function(data, actions) {
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: amout,
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function(data, actions) {

                    return actions.payment.execute().then(function() {
                        // Show a confirmation message to the buyer

                        $.ajax({
                            type : "POST",
                            url: "{{route('user.pay.save')}}",
                            data : {
                                '_token' : "{{csrf_token()}}",
                                'amout':amout,
                                'time':time,
                                'plan':plan,
                            },
                            success:function(data){
                                if (data == 'success'){
                                    swal("Account Upgrade Successfull", "", "success");
                                }
                            }
                        });
                    });
                }
            }, '#paypal-button');


        })


    </script>

@endsection

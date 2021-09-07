@extends('layouts.app')
@section('content')
    @include('layouts.menubar')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
    <style>
        /**
     * The CSS shown here will not be introduced in the Quickstart guide, but shows
     * how you can use CSS to style your Element's container.
     */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>
    @php
    $setting = DB::table('settings')->first();
    $shippingcharge = $setting->shipping_charge;
    $vat = $setting->vat;
    $cart = Cart::content();

    @endphp
    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Checkout</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $item)
                                    <li class="cart_item clearfix ">
                                        <div class="cart_item_image"><img src="{{ asset($item->options->image) }}" alt="">
                                        </div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $item->name }}</div>
                                            </div>
                                            @if ($item->options->color == null)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text"><span
                                                            style="background-color:{{ $item->options->color }};"></span>{{ $item->options->color }}
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($item->options->size == null)

                                            @else
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $item->options->size }}</div>
                                                </div>
                                            @endif

                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">
                                                    <form method="post" action=" {{ route('update.Cartitem') }} ">
                                                        @csrf
                                                        <input type="hidden" value="" name="productid">
                                                        <span>{{ $item->qty }}</span>
                                                            
                                                        
                                                    </form>
                                                </div>


                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">${{ $item->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">${{ $item->price * $item->qty }}</div>
                                            </div>

                                            {{-- <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text"><a
                                                        href="{{ url('remove/cart/' . $item->rowId) }}"
                                                        class="btn btn-sm btn-danger">X</a></div>
                                            </div> --}}
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total_content my-3">
                            @if (Session::has('coupon'))

                            @else

                                {{-- <form action=" {{ route('apply.coupon') }} " method="post">
                                    @csrf
                                    <div class="form-gorup col-lg-12">
                                        <h4 class="col-lg-4" style="display: inline">Apply Coupon :</h4>
                                        <input type="text" name="coupon" class="form-control col-lg-3"
                                            placeholder="Enter coupon code" required="" style="display: inline">
                                        <button type="submit" class="btn btn-success my-1 col-lg-2"
                                            style="display: inline">Apply</button>
                                    </div>

                                </form> --}}


                            @endif
                        </div>
                        <ul class="list-group col-lg-4 p-2" style="float:right;">
                            <li class="list-group-item">Subtotal: <span style="float: right">${{ Cart::subtotal() }}</span>
                            </li>
                            @if (Session::has('coupon'))
                                <li class="list-group-item">Coupon: ({{ Session::get('coupon')['name'] }})
                                    <a href=" {{ route('coupon.remove') }} "> <i class=" fas fa-minus-circle"
                                            style="color: red;" title="remove coupon"></i></a>
                                    <span style="float: right">- ${{ Session::get('coupon')['discount'] }}</span>
                                </li>
                            @else

                            @endif

                            <li class="list-group-item">Shipping Charge: <span
                                    style="float: right">${{ $shippingcharge }}</span></li>
                            <li class="list-group-item">Vat: <span style="float: right">${{ $vat }}</span></li>
                            @if (Session::has('coupon'))
                                <li class="list-group-item">Total: <span
                                        style="float: right">${{ Session::get('coupon')['balance'] + $shippingcharge + $vat }}</span>
                                </li>
                            @else
                                <li class="list-group-item">Total: <span
                                        style="float: right">${{ Cart::subtotal() + $shippingcharge + $vat }}</span></li>

                            @endif


                        </ul>


                        <div class="col-lg-8 card my-5">
                            <div class="card-header">
                                <h3>Payment Process </h3>
                            </div>
                            <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                                @csrf
                                <div class="form-row">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    
                                    <input type="hidden" name="vat" value=" {{$vat}} " >
                                    <input type="hidden" name="shipping_charge" value=" {{$shippingcharge}} " >
                                    
                                    
                                    <input type="hidden" name="total" value=" {{Cart::subtotal()+$shippingcharge+$vat}} " >

                                    <input type="hidden" name="ship_name" value=" {{$data['full_name']}} " >
                                    <input type="hidden" name="ship_phone" value=" {{$data['phone']}} " >
                                    <input type="hidden" name="ship_email" value=" {{$data['email']}} " >
                                    <input type="hidden" name="ship_address" value=" {{$data['address']}} " >
                                    <input type="hidden" name="ship_city" value=" {{$data['city']}} " >
                                    <input type="hidden" name="payment_type" value=" {{$data['payment']}} " >
                                   
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div><br>
                                <button class="btn btn-info">Pay Now</button>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe(
            'pk_test_51ImKNhDDUFgsaiyyH1EfixV8jP4Yrkh7kum7pRZ0nVuxatLCIOWTUF0GDGTV6boMkUb5uQEvjj2868ZSduWHiaWx00YZWuvJgl'
            );

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

    </script>
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endsection

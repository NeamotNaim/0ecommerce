@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">

@php
	$setting=DB::table('settings')->first();
	$shippingcharge=$setting->shipping_charge;
	$vat=$setting->vat;
	
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
									<div class="cart_item_image"><img src="{{asset($item->options->image)}}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{$item->name}}</div>
										</div>
                                        @if ($item->options->color==NULL)
                                            
                                        @else
                                         <div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:{{$item->options->color}};"></span>{{$item->options->color}}</div>
										</div>   
                                        @endif
                                        @if ($item->options->size==NULL)
                                            
                                        @else
                                        <div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{$item->options->size}}</div>
										</div> 
                                        @endif
										
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
												<form method="post" action=" {{route('update.Cartitem')}} ">
												@csrf
												<input type="hidden" value="{{$item->rowId}}" name="productid">
												<input type="number" value="{{$item->qty}}" name="qty" style="width: 50px;">
												<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check-square"></i></button>
											</form></div>
											
											
										</div>

										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{$item->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">${{$item->price*$item->qty}}</div>
										</div>

                                        <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text"><a href="{{url('remove/cart/'.$item->rowId)}}" class="btn btn-sm btn-danger">X</a></div>
										</div>
									</div>
								</li>   
                                @endforeach
								
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total_content my-3">
						@if (Session::has('coupon'))

						@else
							
								<form action=" {{route('apply.coupon')}} " method="post">
									@csrf
									<div class="form-gorup col-lg-12" >
										<h4 class="col-lg-4" style="display: inline">Apply Coupon :</h4>
										<input type="text" name="coupon" class="form-control col-lg-3" placeholder="Enter coupon code" required=""  style="display: inline">
                                        <button type="submit" class="btn btn-success my-1 col-lg-2"  style="display: inline" >Apply</button>
									</div>
									
								</form>
							
							
						@endif
						</div>	
							<ul class="list-group col-lg-4 " style="float:right;">
								<li class="list-group-item">Subtotal: <span style="float: right">${{Cart::subtotal()}}</span></li>
								@if (Session::has('coupon'))
								<li class="list-group-item">Coupon: ({{Session::get('coupon')['name']}})
									<a href=" {{route('coupon.remove')}} "> <i class=" fas fa-minus-circle" style="color: red;" title="remove coupon"></i></a>
									 <span style="float: right">- ${{Session::get('coupon')['discount']}}</span></li>
							    @else

								@endif
								
								<li class="list-group-item">Shipping Charge: <span style="float: right">${{$shippingcharge}}</span></li>
								<li class="list-group-item">Vat: <span style="float: right">${{$vat}}</span></li>
								@if (Session::has('coupon'))
								<li class="list-group-item">Total: <span style="float: right">${{Session::get('coupon')['balance']+$shippingcharge+$vat}}</span></li>
                                @else
								<li class="list-group-item">Total: <span style="float: right">${{Cart::subtotal()+$shippingcharge+$vat}}</span></li>
									
								@endif
								

							</ul>
					</div>
				</div>
			</div>
							
						

						<div class="cart_buttons col-lg-11">
							
							<button type="button" class="button cart_button_clear">Cancel</button>
							<a  href=" {{route('user.payment.page')}} " class="button cart_button_checkout">Proceed to pay</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{asset('frontend/js/cart_custom.js')}}"></script>
@endsection
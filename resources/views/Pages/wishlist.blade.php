@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Wishlist Proudct</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach ($product as $item)
                                 <li class="cart_item clearfix ">
									<div class="cart_item_image" style="width: 80px;height:8px"><img src="{{asset($item->image_one)}}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{$item->product_name}}</div>
										</div>
                                        @if ($item->product_color==NULL)
                                            
                                        @else
                                         <div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:{{$item->product_color}};"></span>{{$item->product_color}}</div>
										</div>   
                                        @endif
                                        @if ($item->product_size==NULL)
                                            
                                        @else
                                        <div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{$item->product_size}}</div>
										</div> 
                                        @endif
										
										

										
										

                                        <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text"><a href="" class="btn btn-sm btn-success">Add to Cart</a></div>
										</div>
									</div>
								</li>   
                                @endforeach
								
							</ul>
						</div>
						
					
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{asset('frontend/js/cart_custom.js')}}"></script>
@endsection
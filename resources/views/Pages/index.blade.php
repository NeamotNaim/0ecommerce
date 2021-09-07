@extends('layouts.app')
@section('content')
@include('layouts.menubar')
@include('layouts.slider')
@php
	$feature=DB::table('products')->where('status',1)->orderBy('id','desc')->get();
	$trend=DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','desc')->limit(15)->get();
	$week_trend=DB::table('products')->where('status',1)->where('trend',1)->where('main_slider',1)->orderBy('id','desc')->limit(15)->get();
	$week_best_rated=DB::table('products')->where('status',1)->where('best_rated',1)->where('main_slider',1)->orderBy('id','asc')->limit(15)->get();
	$week_deal=DB::table('products')->join('brands','products.brand_id','brands.id')
	->select('products.*','brands.brand_name')
	->where('status',1)->where('main_slider',1)->limit(15)->get();
	$mid_slider=DB::table('products')->where('status',1)->where('mid_slider',1)->orderBy('id','desc')->limit(15)->get();
	$best_rated=DB::table('products')->join('subcategories','products.subcategory_id','subcategories.id')
	->select('products.*','subcategories.subcategory_name')
	->where('status',1)->where('best_rated',1)->orderBy('id','desc')->limit(20)->get();
	$hot_new=DB::table('products')->where('status',1)->where('hot_new',1)->orderBy('id','desc')->limit(15)->get();
	$hot_deal=DB::table('products')->join('brands','products.brand_id','brands.id')
	->select('products.*','brands.brand_name')
	->where('status',1)->where('hot_deal',1)->orderBy('id','desc')->limit(15)->get();	
@endphp
{{-- banner down section --}}
    <div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_1.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_2.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Return Product</div>
							<div class="char_subtitle">If sophisticated</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_3.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Wallet Payment</div>
							<div class="char_subtitle">from $5</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_4.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Quick Delivery</div>
							<div class="char_subtitle">1-7 days</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Deals of the week Main slider-->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								@foreach ($week_deal as $item)
									<!-- Deals Item -->
									<div class="owl-item deals_item">
										<div class="deals_image"><img src=" {{asset($item->image_one)}} " alt=""></div>
										<div class="deals_content">
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_category"><a href="#">{{$item->brand_name}}</a></div>
												@if ($item->discount_prize==NULL)
												@else
													<div class="deals_item_price_a ml-auto">${{$item->selling_prize}}</div>	
												@endif
												
											</div>
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_name"><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div>

												@if ($item->discount_prize==NULL)
													<div class="deals_item_price ml-auto">${{$item->selling_prize}}</div>

												@else
													<div class="deals_item_price ml-auto">${{$item->discount_prize}}</div>
												@endif
												
											</div>
											<div class="available">
												<div class="available_line d-flex flex-row justify-content-start">
													<div class="available_title">Available: <span>{{$item->product_quantity}}</span></div>
													<div class="sold_title ml-auto">Already sold: <span>28</span></div>
												</div>
												<div class="available_bar"><span style="width:17%"></span></div>
											</div>
											<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
												<div class="deals_timer_title_container">
													<div class="deals_timer_title">Hurry Up</div>
													<div class="deals_timer_subtitle">Offer ends in:</div>
												</div>
												<div class="deals_timer_content ml-auto">
													<div class="deals_timer_box clearfix" data-target-time="">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>hours</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>mins</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>secs</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach	
							</div>
						</div>
						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
					 </div>
					</div>
					
	              <!-- Featured trend best rated-->				
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
									<li>Trend</li>
									<li>Best Rated</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel for feature -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
								@foreach ($week_deal as $item)
									<!-- Slider Item -->
								<div class="featured_slider_item">
									<div class="border_active"></div>
									<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
										<div class="product_image d-flex flex-column align-items-center justify-content-center">
											<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
										<div class="product_content">
											@if ($item->discount_prize==NULL)
												<div class="product_price discount">${{$item->selling_prize}}</div>
											@else
											<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

											@endif
											
											<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
											<div class="product_extras">
												
												<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)"  class="product_cart_button addcart" >Add to Cart</button>
											</div>
										</div>
										<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
											<div class="product_fav"><i class="fas fa-heart"></i></div>
										</button>                
										


										<ul class="product_marks"> 
											@if ($item->discount_prize==NULL)
												<li class="product_mark product_discount" style="background: blue;">new</li>
											@else
													<li class="product_mark product_discount">
												@php
												$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

											@endphp
												-{{ceil($percentage)}}%</li>

											@endif
										</ul>		
									</div>
								</div>
								@endforeach
		
									

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

                           <!-- Product Panel for trend  -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

								@foreach ($week_trend as $item)
									<!-- Slider Item -->
								<div class="featured_slider_item">
									<div class="border_active"></div>
									<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
										<div class="product_image d-flex flex-column align-items-center justify-content-center">
											<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
										<div class="product_content">
											@if ($item->discount_prize==NULL)
												<div class="product_price discount">${{$item->selling_prize}}</div>
											@else
											<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

											@endif
											
											<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
											<div class="product_extras">
												
												<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)" class="product_cart_button">Add to Cart</button>
											</div>
										</div>
										<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
											<div class="product_fav"><i class="fas fa-heart"></i></div>
										</button>                
										


										<ul class="product_marks"> 
											@if ($item->discount_prize==NULL)
												<li class="product_mark product_discount" style="background: blue;">new</li>
											@else
													<li class="product_mark product_discount">
												@php
												$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

											@endphp
												-{{ceil($percentage)}}%</li>

											@endif
										</ul>		
									</div>
								</div>
								@endforeach
		

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

                           <!-- Product Panel Best rated -->						

							<div class="product_panel panel">
								<div class="featured_slider slider">
								@foreach ($week_best_rated as $item)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<img src=" {{asset($item->image_one)}} " style="height:120px; width:100px;" alt=""></div>
											<div class="product_content">
												@if ($item->discount_prize==NULL)
													<div class="product_price discount">${{$item->selling_prize}}</div>
												@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>
											
												@endif
												
												<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}"> {{$item->product_name}} </a></div></div>
												<div class="product_extras">
													{{-- <div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div> --}}
													<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)" class="product_cart_button">Add to Cart</button>
												</div>
											</div>
												{{-- <button class="addwishlist" data-id="{{$item->id}}">
												<div class="product_fav"><i class="fas fa-heart"></i></div>
											</button> --}}
											<ul class="product_marks">
												@if ($item->discount_prize==NULL)
													<li class="product_mark product_discount" style="background:blue;">new</li>
												@else
													<li class="product_mark product_discount">
														@php
															$percentage=($item->selling_prize-$item->discount_prize)/$item->selling_prize*100
														@endphp -{{ceil($percentage)}}%</li>	
												@endif
												
												
											</ul>
										</div>
									</div>
								@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	

<!-- Explore slider mid slider-->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(frontend/images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">
		@php
			$mid=DB::table('products')
			->join('categories','products.category_id','categories.id')
			->join('brands','products.brand_id','brands.id')
			->select('products.*','categories.category_name','brands.brand_name')
			->where('status',1)->where('mid_slider',1)->limit(15)
			->orderBy('id','asc')->skip(1)->get();
		@endphp
            @foreach ($mid as $item)
				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category"><h4>{{$item->category_name}}</h4></div>
										<div class="banner_2_title">{{$item->product_name}}</div>
										<div class="banner_2_text"> <h4>{{$item->brand_name}} </h4> <br>
										<h2>${{$item->selling_prize}}</h2>  </div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="{{asset($item->image_one)}}" style="height: 550px;width:440px" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			@endforeach
				

				
			</div>
		</div>
	</div>


<!-- Mens Fashion Hot New Arrivals -->
	@php
		$cat=DB::table('categories')->first();
		$cat_id=$cat->id;
		$product=DB::table('products')->where('category_id',$cat_id)->where('status',1)->orderBy('id','desc')->get();
		$shirt=DB::table('products')->where('category_id',$cat_id)->where('subcategory_id',12)->where('status',1)->orderBy('id','desc')->get();
		$pant=DB::table('products')->where('category_id',$cat_id)->where('subcategory_id',13)->where('status',1)->orderBy('id','desc')->get();
	@endphp	
	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">{{($cat->category_name)}}</div>
							<ul class="clearfix">
								<li class="active">Featured</li>
								<li>Shirt</li>
								<li>Pant</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel for feature-->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">
                        
										<!-- Slider Item -->
										@foreach ($product as $item)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											   <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
												<div class="product_content">
													@if ($item->discount_prize==NULL)
														<div class="product_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
													
													<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
													<div class="product_extras">
														
														<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)"  class="product_cart_button addcart" >Add to Cart</button>
													</div>
												</div>
													<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													</button>                
												


												<ul class="product_marks"> 
													@if ($item->discount_prize==NULL)
														<li class="product_mark product_discount" style="background: blue;">new</li>
													@else
															<li class="product_mark product_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
												</ul>		
											</div>
										</div>	
										@endforeach
										

										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel shirt-->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach ($shirt as $item)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											   <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
												<div class="product_content">
													@if ($item->discount_prize==NULL)
														<div class="product_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
													
													<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
													<div class="product_extras">
														
														<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)" class="product_cart_button">Add to Cart</button>
													</div>
												</div>
													<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													</button>                
												


												<ul class="product_marks"> 
													@if ($item->discount_prize==NULL)
														<li class="product_mark product_discount" style="background: blue;">new</li>
													@else
															<li class="product_mark product_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
												</ul>		
											</div>
										</div>	
										@endforeach

										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel pant -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach ($pant as $item)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											   <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
												<div class="product_content">
													@if ($item->discount_prize==NULL)
														<div class="product_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
													
													<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
													<div class="product_extras">
														
														<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)" class="product_cart_button">Add to Cart</button>
													</div>
												</div>
													<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													</button>                
												


												<ul class="product_marks"> 
													@if ($item->discount_prize==NULL)
														<li class="product_mark product_discount" style="background: blue;">new</li>
													@else
															<li class="product_mark product_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
												</ul>		
											</div>
										</div>	
										@endforeach

										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							</div>

							{{-- <div class="col-lg-3">
								<div class="arrivals_single clearfix">
									<div class="d-flex flex-column align-items-center justify-content-center">
										<div class="arrivals_single_image"><img src="images/new_single.png" alt=""></div>
										<div class="arrivals_single_content">
											<div class="arrivals_single_category"><a href="#">Smartphones</a></div>
											<div class="arrivals_single_name_container clearfix">
												<div class="arrivals_single_name"><a href="#">LUNA Smartphone</a></div>
												<div class="arrivals_single_price text-right">$379</div>
											</div>
											<div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<form action="#"><button class="arrivals_single_button">Add to Cart</button></form>
										</div>
										<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
										<ul class="arrivals_single_marks product_marks">
											<li class="arrivals_single_mark product_mark product_new">new</li>
										</ul>
									</div>
								</div>
							</div> --}}

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>



<!--watch Hot New Arrivals 2  -->
	@php
		$cat=DB::table('categories')->skip(3)->first();
		$cat_id=$cat->id;
		$product=DB::table('products')->where('category_id',$cat_id)->where('status',1)->orderBy('id','desc')->get();
		$men=DB::table('products')->where('category_id',$cat_id)->where('subcategory_id',20)->where('status',1)->orderBy('id','desc')->get();
		$womennchild=DB::table('products')->where('category_id',$cat_id)->where('subcategory_id',21)->orWhere('subcategory_id',22)->where('status',1)->orderBy('id','desc')->get();
	@endphp	
	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">{{($cat->category_name)}}</div>
							<ul class="clearfix">
								<li class="active">Featured</li>
								<li>Men</li>
								<li>Women & Children</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel for feature-->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">
                        
										<!-- Slider Item -->
										@foreach ($product as $item)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											   <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
												<div class="product_content">
													@if ($item->discount_prize==NULL)
														<div class="product_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
													
													<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>

													{{-- <div class="product_extras">	
														<button class="product_cart_button addcart" data-id="{{$item->id}}">Add to Cart</button>
													</div> --}}

													<div class="product_extras">	
														<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)"  class="product_cart_button addcart" >Add to Cart</button>
													</div>
												</div>
													<button class="addwishlist " style="border: 0;" data-id="{{$item->id}}">
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													</button>                
												


												<ul class="product_marks"> 
													@if ($item->discount_prize==NULL)
														<li class="product_mark product_discount" style="background: blue;">new</li>
													@else
															<li class="product_mark product_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
												</ul>		
											</div>
										</div>	
										@endforeach
										

										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach ($men as $item)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											   <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
												<div class="product_content">
													@if ($item->discount_prize==NULL)
														<div class="product_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
													
													<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
													<div class="product_extras">
														{{-- <div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div> --}}
														<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)" class="product_cart_button">Add to Cart</button>
													</div>
												</div>
													<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													</button>                
												


												<ul class="product_marks"> 
													@if ($item->discount_prize==NULL)
														<li class="product_mark product_discount" style="background: blue;">new</li>
													@else
															<li class="product_mark product_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
												</ul>		
											</div>
										</div>	
										@endforeach

										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach ($womennchild as $item)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											   <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src=" {{asset($item->image_one)}} " style="height: 120px; width:100px;" alt=""></div>
												<div class="product_content">
													@if ($item->discount_prize==NULL)
														<div class="product_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
													
													<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
													<div class="product_extras">
														{{-- <div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div> --}}
														<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)" class="product_cart_button">Add to Cart</button>
													</div>
												</div>
													<button class="addwishlist" style="border: 0;" data-id="{{$item->id}}">
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													</button>                
												


												<ul class="product_marks"> 
													@if ($item->discount_prize==NULL)
														<li class="product_mark product_discount" style="background: blue;">new</li>
													@else
															<li class="product_mark product_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
												</ul>		
											</div>
										</div>	
										@endforeach

										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							</div>

							{{-- <div class="col-lg-3">
								<div class="arrivals_single clearfix">
									<div class="d-flex flex-column align-items-center justify-content-center">
										<div class="arrivals_single_image"><img src="images/new_single.png" alt=""></div>
										<div class="arrivals_single_content">
											<div class="arrivals_single_category"><a href="#">Smartphones</a></div>
											<div class="arrivals_single_name_container clearfix">
												<div class="arrivals_single_name"><a href="#">LUNA Smartphone</a></div>
												<div class="arrivals_single_price text-right">$379</div>
											</div>
											<div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<form action="#"><button class="arrivals_single_button">Add to Cart</button></form>
										</div>
										<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
										<ul class="arrivals_single_marks product_marks">
											<li class="arrivals_single_mark product_mark product_new">new</li>
										</ul>
									</div>
								</div>
							</div> --}}

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{asset('frontend/images/adv_1.png')}}" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{asset('frontend/images/adv_2.png')}}" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{asset('frontend/images/adv_3.png')}}" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

<!-- Trends 2021 -->
   
	<div class="trends">
		<div class="trends_background" style="background-image: {{ asset('frontend/images/trends_background.jpg')}}"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trends 2021</h2>
						<div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

					@php
					$trend_product=DB::table('products')
					->join('brands','products.brand_id','brands.id')
					->select('products.*','brands.brand_name')
					->where('status',1)->where('trend',1)->orderBy('id','desc')->get();
					@endphp
				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->
          
						<div class="owl-carousel owl-theme trends_slider">

							
							@foreach($trend_product as $item)
                            <!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset( $item->image_one )}}" alt=""></div>
									<div class="trends_content">
									<div class="trends_category"><a href="#">{{ $item->brand_name }}</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{ $item->product_name }}</a></div>
											

											@if($item->discount_prize == NULL)
											<div class="product_price discount">${{ $item->selling_prize }}<span> </div>
												@else
											<div class="product_price discount">${{ $item->discount_prize }}<span>${{ $item->selling_prize }}</span></div>
												@endif 

											<button id=" {{$item->id}} " data-bs-toggle="modal" data-bs-target="#cartmodal"
															onclick="productView(this.id)"    class="btn btn-danger ">Add to Cart</button>
												</div>
											</div>
											<ul class="trends_marks">


												@if ($item->discount_prize!=NULL)
												<li class="trends_mark trends_new" style="background: red">
													@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>
												</li>
														{{-- <li class="product_mark product_discount" style="background: blue;">new</li> --}}
												@else
															{{-- <li class="product_mark product_discount"> --}}
																<li class="trends_mark trends_new">new</li>
														

												@endif
											
										
										
									</ul>	
											<button class="addwishlist" style="border: 0;" data-id="{{ $item->id }}" >
											<div class="trends_fav"><i class="fas fa-heart"></i></div>
											</button>

								</div>
							</div>

                            @endforeach
                        

							

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<!--Hot  Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot Best Sellers</div>
							<ul class="clearfix">
								<li class="active">Top 20</li>
								<li>This Month</li>
								<li>This Year</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">
                               @foreach ($best_rated as $item)
								  <!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset($item->image_one)}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="{{url('products/subcategory/'.$item->subcategory_id)}}">{{$item->subcategory_name}}</a></div>
											<div class="bestsellers_name"><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											@if ($item->discount_prize==NULL)
														<div class="bestsellers_price discount">${{$item->selling_prize}}</div>
													@else
													<div class="bestsellers_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

													@endif
											
										</div>
									</div>
									{{-- <a data-id="{{$item->id}}" class=" addwishlist bestsellers_fav "><div class=""><i class="fas fa-heart"></i></div></a> --}}
									
									<ul class="bestsellers_marks">
										@if ($item->discount_prize==NULL)
														<li class="bestsellers_mark bestsellers_new" style="background: blue">new</li>
													@else
															<li class="bestsellers_mark bestsellers_discount">
														@php
														$percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

														@endphp
														-{{ceil($percentage)}}%</li>

													@endif
									</ul>
								</div> 
							   @endforeach
								

								
							</div>
						</div>

						<div class="bestsellers_panel panel">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

							</div>
						</div>

						<div class="bestsellers_panel panel">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								
								

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>
								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>
								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>


								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="{{asset('frontend/product.html')}}">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

							</div>
						</div>
					</div>
						
				</div>
			</div>
		</div>
	</div>


<!--Latest Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Latest Reviews</h3>
						<div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							
							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="{{asset('frontend/images/review_1.jpg')}}" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="{{asset('frontend/images/review_2.jpg')}}" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="{{asset('frontend/images/review_3.jpg')}}" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="{{asset('frontend/images/review_1.jpg')}}" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="{{asset('frontend/images/review_2.jpg')}}" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="{{asset('frontend/images/review_3.jpg')}}" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('frontend/images/view_1.jpg')}}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('frontend/images/view_2.jpg')}}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('frontend/images/view_3.jpg')}}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225</div>
										<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('frontend/images/view_4.jpg')}}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('frontend/images/view_5.jpg')}}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('frontend/images/view_6.jpg')}}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$375</div>
										<div class="viewed_name"><a href="#">Speedlink...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_1.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_2.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_3.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_4.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_5.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_6.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_7.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_8.jpg')}}" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{asset('frontend/images/send.png')}}" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="{{route('newsletter.store')}} " method="post" class="newsletter_form">
								@csrf
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
								<button class="newsletter_button" type="submit">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- <script type="text/javascript">
        $(document).ready(function(){
			$('.addwishlist').on('click',function(){
				var id=$(this).data('id');
				if(id){
					$.ajax({
						url:"{{url('wishlist/add/')}}"+id,
						type:"GET",
						datType:"json",
						success:function(data){
							const Toast=Swal.mixin({
								toast:true,
								position:'top-end',
								showConfirmButton:false,
								timer:3000,
								timerProgressBar:true,
								onOpen:(toast)=>{
									toast.addEnentListener('mouseenter',Swal.stopTimer)
									toast.addEnentListener('mouseleave',Swal.resumeTimer)
								}
							})
							if ($.isEmptyObject(data.error)) {
													Toast.fire({
								icon:'success',
								title:data.success
							})

							}else{
								Toast.fire({
								icon:'error',
								title:data.error
							})

							}


		
						},
					});
				}else{
					alert('danger')
				}
			});
		});
	</script> --}}

	<!-- Modal -->
	<div class="modal fade" id="cartmodal"  tabindex="-1" aria-labelledby="exampleModalLavel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLavel">Product quick view</h5>
			<button type="button" class=" btn btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
		</div>
		<form method="post" action=" {{route('insert.into.cart')}} ">
		@csrf
		<div class="modal-body">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<img id="pimage" src="">
						<div class="card-body text-center">
							<h4 class="card-title " id="pname"></h4>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<ul class="list-group">
						<li class="list-group-item">Product Code:<strong><span id="pcode"></span></strong>  </li>
						<li class="list-group-item">Category: <span id="pcat"></span> </li>
						<li class="list-group-item">Sub Category: <span id="psubcat"></span> </li>
						<li class="list-group-item">Brand: <strong><span id="pbrand"></span> </strong> </li>
						<li class="list-group-item">Stock: <span id="pstock" class="badge" style="background: green;color:white;"> available</span> </li>
					</ul>
				</div>
                
					<input type="hidden" name="product_id" id="product_id">
				<div class="col-md-4">
					<div class="form-group">
						<label for="exampleinputcolor">Color</label>
						<select name="color" id="color" class="form-control">
							
						</select>
					</div>
					<div class="form-group">
						<label for="exampleinputsize">Size</label>
						<select name="size" id="size" class="form-control">
							
						</select>
					</div>
					<div class="form-group">
						<label for="exampleinputqty">Quantity</label>
						<input name="qty" id="exampleinputqty" type="number" value="1" class="form-control">
					</div>
				</div>
			</div>
			
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Add to Cart</button>
		</div>
		</form>
		</div>
	</div>
	</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


  <script type="text/javascript">
  
	  function productView(id) {
		  $.ajax({
		  url:"{{url('cart/product/quick/view/')}}/"+id,
		  type:"GET",
		  dataType:"json",
		  success:function(data){
                  $('#pname').text(data.product.product_name);
                  $('#pimage').attr('src',data.product.image_one);

				  $('#pcode').text(data.product.product_code);
				  $('#pcat').text(data.product.category_name);
				  $('#psubcat').text(data.product.subcategory_name);
				  $('#pbrand').text(data.product.brand_name);
				  $('#product_id').val(data.product.id);

				  var d=$('select[name="color"]').empty();
				  $.each(data.color,function(key,value){
                    $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
				  });

				  var d=$('select[name="size"]').empty();
				  $.each(data.size,function(key,value){
                    $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
				  });
		  }
	  });
	  }
	 

  </script>
// {{-- <script type="text/javascript">
    
//    $(document).ready(function(){
//      $('.addcart').on('click', function(){
//         var id = $(this).data('id');
//         if (id) {
			
//             $.ajax({
//                 url: " {{ url('add/cart/') }}/"+id,
//                 type:"GET",
//                 datType:"json",
//                 success:function(data){
//              const Toast = Swal.mixin({
//                   toast: true,
//                   position: 'top-end',
//                   showConfirmButton: false,
//                   timer: 3000,
//                   timerProgressBar: true,
//                   didOpen: (toast) => {
//                     toast.addEventListener('mouseenter', Swal.stopTimer)
//                     toast.addEventListener('mouseleave', Swal.resumeTimer)
//                   }
//                 })

//              if ($.isEmptyObject(data.error)) {

//                 Toast.fire({
//                   icon: 'success',
//                   title: data.success
//                 })
//              }else{
//                  Toast.fire({
//                   icon: 'error',
//                   title: data.error
//                 })
//              }
 

//                 },
//             });
        
//         }else{
//             alert('danger');
//         }
//      });

//    });


// </script> --}}
<script type="text/javascript">
    
   $(document).ready(function(){
     $('.addwishlist').on('click', function(){
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                url: " {{ url('add/wishlist/') }}/"+id,
                type:"GET",
                datType:"json",
                success:function(data){
             const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

             if ($.isEmptyObject(data.error)) {

                Toast.fire({
                  icon: 'success',
                  title: data.success
                })
             }else{
                 Toast.fire({
                  icon: 'error',
                  title: data.error
                })
             }
 

                },
            });

        }else{
            alert('danger');
        }
     });

   });


</script>
@endsection
@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_responsive.css')}}">
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h1 class="home_title">{{strtoupper($subcategory->subcategory_name)}}</h1>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                                @foreach ($category as $item)
                                   <li><a href="{{url('products/category/'.$item->id)}} ">{{$item->category_name}}</a></li> 
                                @endforeach
								
								
							</ul>
						</div>
						{{-- <div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div> --}}
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
                           
                            
							<ul class="brands_list">
                                
                            @foreach ($brand as $item)
                              @php
                                $bra=DB::table('brands')->where('id',$item->brand_id)->first();
                              @endphp  
                              <li class="brand"><a href="{{url('products/brand/'.$item->brand_id)}}">{{$bra->brand_name}}</a></li>
                            @endforeach
								
								
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{$product->count()}}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>

                    @foreach ($product as $item)
                        <!-- Product Item -->
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($item->image_one)}}" style="width: 100px;height:110px/" alt=""></div>
								<div class="product_content">
									
                                    @if ($item->discount_prize==NULL)
					                  	<div class="product_price discount">${{$item->selling_prize}}</div>
                                    @else
                                    <div class="product_price discount">${{$item->discount_prize}}<span>${{$item->selling_prize}}</span></div>

                                    @endif
									<div class="product_name"><div><a href="{{url('product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
                                    @if ($item->discount_prize==NULL)
                                        <li class="product_mark product_new" style="background: blue;">new</li>
                                    @else
                                            <li class="product_mark product_new" style="background: rgb(204, 2, 2);">
                                        @php
                                        $percentage=($item->selling_prize-$item->discount_prize)/($item->selling_prize)*100;

                                    @endphp
                                        -{{ceil($percentage)}}%</li>

                                    @endif
								</ul>
							</div>
                    @endforeach
							

							

							

						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							
							<ul class="page_nav d-flex flex-row">
								{{$product->links()}}
							</ul>
							
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
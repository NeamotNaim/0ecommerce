<!-- Banner -->
    @php
	// if the value of  main slider is 1 in database  then it show its data to main slider section
		$slider=DB::table('products')
		->join('brands','products.brand_id','brands.id')
		->select('products.*','brands.brand_name')
		->where('main_slider',1)->where('status',1)->orderBy('id','DESC')->first();
	@endphp
	<div class="banner">
		<div class="banner_background" style="background-image:url(frontend/images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image " ><img src="{{asset($slider->image_one)}}" style="height:450px;width:350px;"alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text"> {{$slider->product_name}} </h1>
						<div class="banner_price">
							@if ($slider->discount_prize==NULL)
								<h2>${{$slider->selling_prize}}</h2>
							@else
								<span>${{$slider->selling_prize}}</span>${{$slider->discount_prize}}

							
								
							@endif
							</div>
						<div class="banner_product_name">{{$slider->brand_name}}</div>
						<div class="button banner_button"><a href=" url('/') ">Shop Now</a></div>
					</div>
				</div>
			</div> 
		</div>
	</div>
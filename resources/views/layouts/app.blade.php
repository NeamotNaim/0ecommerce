@php
	$setting=DB::table('sitesetting')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
<title>{{$setting->company_name}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href=" {{asset('frontend/styles/bootstrap4/bootstrap.min.css')}} ">
<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href=" {{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}} ">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">


{{-- Toastr --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

<script src="https://js.stripe.com/v3/"></script>

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/phone.png')}}" alt=""></div>{{$setting->phone_one}}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">{{$setting->email}}</a></div>
						<div class="top_bar_content ml-auto">
							@guest
								@else
								<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>	
									   <a href=" " data-bs-toggle="modal" data-bs-target="#exampleModal">My order Tracking	</a> 
									           
									</li>
									
								</ul>
							</div>
							@endguest
							
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>

										@php
											$language=Session()->get('lang');
										@endphp

									    @if (Session()->get('lang')=='bangla')
											<a href="#">Bangla<i class="fas fa-chevron-down"></i></a>
										@elseif (Session()->get('lang')=='hindi')
											<a href="#">Hindi<i class="fas fa-chevron-down"></i></a>
										@else
											<a href="#">English<i class="fas fa-chevron-down"></i></a>
										@endif
										
										<ul>
										@if (Session()->get('lang')=='hindi')
										 <li><a href=" {{route('lang.bangla')}} ">English</a></li>
										 <li><a href="{{route('lang.hindi')}} ">Bangla</a></li>
										@elseif (Session()->get('lang')=='bangla') 
										 <li><a href="{{route('lang.english')}} ">English</a></li>
										 <li><a href="{{route('lang.hindi')}} "  >Hindi</a></li>
										@else
										   <li><a href="{{route('lang.bangla')}} " >Bangla</a></li>
										  <li><a href="{{route('lang.hindi')}} ">Hindi</a></li>
										@endif
											
											
											
											
										</ul>
									</li>
									
								</ul>
							</div>
							<div class="top_bar_user">
								@guest
								<div class="user_icon"><img src="{{asset('frontend/images/user.svg')}}" alt=""></div>
								<div><a href=" {{route('register')}} ">Register</a></div>
								<div><a href=" {{route('login')}} ">Sign in</a></div>
								@else
								
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href=" {{route('home')}} "><div class="user_icon"><img src="{{asset('frontend/images/user.svg')}}" alt=""></div>
										<div > Profile <i class="fas fa-chevron-down"></i> </div></a>
										<ul>
											<li><a href=" {{route('user.wishlist')}} ">Wishlist</a></li>
											<li><a href="{{route('user.checkout')}} ">Checkout</a></li>
											<li><a href="#">Other</a></li>
										</ul>
									</li>
								</ul>



                    
								@endguest
								
								
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href=" {{url('/')}} " style=" font-family: 'NoSpace'; font-weight:bold">{{$setting->company_name}}</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action=" {{route('product.search')}} "  method="post" class="header_search_form clearfix">
										@csrf
										<input type="search" name="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												@php
													$category=DB::table('categories')->get();
												@endphp
												<ul class="custom_list clc">
													
													@foreach ($category as $item)
														<li><a class="clc" href="#">{{$item->category_name}}</a></li>
													@endforeach
													
													
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								

									@guest



									@else
									@php
										$wishlist=DB::table('wishlists')->where('user_id',Auth::id())->get();
									@endphp
								<div class="wishlist_icon"><img src="{{asset('frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">	
									<div class="wishlist_text"><a href=" {{route('user.wishlist')}} ">Wishlist</a></div>
									<div class="wishlist_count">{{(count($wishlist))}}</div>
								</div>	
									@endguest
									
								
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('frontend/images/cart.png')}}" alt="">
										<div class="cart_count"><span>{{Cart::count()}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href=" {{route('cartshow')}} ">Cart</a></div>
										<div class="cart_price">${{Cart::subtotal()}}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		

	<!-- Characteristics -->

	@yield('content')
@php
	$setting=DB::table('sitesetting')->first();
@endphp
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">{{$setting->company_name}}</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">{{$setting->phone_two}}</div>
						<div class="footer_contact_text">
							<p>{{$setting->company_address}}</p>
							
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li>
								<li><a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a></li>
								<li><a href="{{$setting->vimeo}}"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{asset('frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('frontend/images/logos_2.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('frontend/images/logos_3.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('frontend/images/logos_4.png')}}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--ORder TRacking  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true"  >&times;</span>
		</button>
      </div>
      <div class="modal-body">
        <form action=" {{route('order.tracking')}} " method="post">
			@csrf
			<div class="form-group">
				<label>Status Code:</label>
				<input type="text" name="status_code" class="form-control" required="" placeholder="Enter status code">

			</div>
			<button type="submit" class="btn btn-danger">Track now</button>

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
{{-- <script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script> --}}
<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>

<script src="{{asset('frontend/js/product_custom.js')}}"></script>	
{{-- <script type="text/javascript" src="{{asset('frontend/js/jquery-3.3.1.min.js')}}">
 <script>
  var jq = jQuery.noConflict();
  jq(document).ready(function(){
  //.... your code here
    });
</script> --}}


{{-- Toastr alert --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- sweet alert --}}
    <script src=" {{asset('https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js')}}"></script>
    {{-- sweet alert2 --}}
    
 <script src="{{asset('frontend/js/custom.js')}}"></script>   
    <script src=" {{asset('https://cdn.jsdelivr.net/npm/sweetalert2@10')}} "></script>
	<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>



    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  

     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                // Swal.fire({
                //     title: 'Are you sure to Logout?',
                //     text: "You will be reverted to login page!",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes!'
                //   })
                // .then((willDelete) => {
                //   if (willDelete) {
                //        window.location.href = link;
                //   } else {
                //     swal("Safe Data!");
                //   }
                // });

              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                   window.location.href = link;
                  // Swal.fire(
                  //   // 'Deleted!',
                  //   // 'Your file has been deleted.',
                  //   // 'success'
                  // )
                }
              })  
            });
    </script>
	
	{{-- return order confirmation alert --}}
	<script>  
			$(document).on("click", "#return", function(e){
				e.preventDefault();
				var link = $(this).attr("href");
					// Swal.fire({
					//     title: 'Are you sure to Logout?',
					//     text: "You will be reverted to login page!",
					//     icon: 'warning',
					//     showCancelButton: true,
					//     confirmButtonColor: '#3085d6',
					//     cancelButtonColor: '#d33',
					//     confirmButtonText: 'Yes!'
					//   })
					// .then((willDelete) => {
					//   if (willDelete) {
					//        window.location.href = link;
					//   } else {
					//     swal("Safe Data!");
					//   }
					// });

				Swal.fire({
					title: 'Are you sure?',
					text: "You want to return this product !",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, return it!'
				}).then((result) => {
					if (result.isConfirmed) {
					window.location.href = link;
					// Swal.fire(
					//   // 'Deleted!',
					//   // 'Your file has been deleted.',
					//   // 'success'
					// )
					}
				})  
				});
		</script>
</body>

</html>
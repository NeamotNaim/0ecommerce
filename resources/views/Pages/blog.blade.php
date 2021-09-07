@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_responsive.css')}}">
	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
					@foreach ($post as $item)
                        <!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{asset($item->post_image)}})"></div>
							<div class="blog_text">
                                @if (Session()->get('lang')=='bangla')
                                    {{$item->post_title_bn}} 
                                @elseif (Session()->get('lang')=='hindi')
                                  {{$item->post_title_in}} 
                                @else
                                {{$item->post_title_en}} 
                                @endif
                               </div>
							<div class="blog_button"><a href=" {{url('blog/single/'.$item->id)}} ">
                             @if (Session()->get('lang')=='bangla')
                                  চালিয়ে যান
                                @elseif (Session()->get('lang')=='hindi')
                                 जारी रखें 
                                @else
                                 Continue Reading
                                @endif
                            </a></div>
						</div>
                    @endforeach
						

						
					</div>
				</div>
					
			</div>
		</div>
	</div>

@endsection
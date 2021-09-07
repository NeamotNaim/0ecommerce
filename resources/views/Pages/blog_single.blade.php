@extends('layouts.app')
@section('content')
@include('layouts.menubar') 
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_responsive.css')}}">
<!-- Single Blog Post -->
   @foreach ($posts as $item)
       

	<div class="single_post my-lg-5">
		<div class="container">
			<div class="row">
        <div class="col-lg-4 ">
          <img src=" {{asset($item->post_image)}} ">
        </div>
				<div class="col-lg-8 ">
					<div class="single_post_title">
                       @if (Session()->get('lang')=='bangla')
                                    {{$item->post_title_bn}} 
                                @elseif (Session()->get('lang')=='hindi')
                                  {{$item->post_title_in}} 
                                @else
                                {{$item->post_title_en}} 
                                @endif
                    </div>
					<div class="single_post_text">
						<p>
                        @if (Session()->get('lang')=='bangla')
                                    {!!$item->post_details_bn!!} 
                                @elseif (Session()->get('lang')=='hindi')
                                  {!!$item->post_details_in!!} 
                                @else
                                {!!$item->post_details_en!!} 
                                @endif
                        </p>
					</div>
				</div>
			</div>
		</div>
	</div>
       @endforeach
@endsection
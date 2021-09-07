@extends('layouts.app')

@section('content')

   <link rel="stylesheet" href="{{asset('frontend/styles/login_style.css')}}">
<!-- contnet wrapper -->
<div class="container" style="display: inline-block; height:850px;" >


            <div class=" content_wrapper">
                    <!-- page content -->
                    <div class="login_page center_container">
                        <div class="center_content">
                            <div class="logo">
                                <img src="" alt="" class="img-fluid">
                            </div>
           <form action="{{route('login')}}" class="d-block " method="post">
            @csrf
                                
                                <div class="form-group icon_parent">
                                     <label for="password">Email</label>
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }} "  required autocomplete="email" autofocus placeholder="Email Address">
           @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
              <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                                 
                                </div>
                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
       <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"   name="password" value="{{old('password') }}"  required autocomplete="current-password" placeholder="Password">
       @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
             @enderror
                                        
                                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a class="registration" href="{{route('registerIndex')}}  ">Create new account</a><br>
                                    <a href=" {{route('password.request')}}  " class="text-white">I forgot my password</a>
                                    <button type="submit" class="btn btn-blue">Login</button>
                                </div>
                            </form>
                            <div class="footer">
                               <p>Copyright &copy; 2021 Rapid dev</a>. All rights reserved.</p>
                            </div>
                            
                        </div>
                    </div>
            </div><!--/ content wrapper -->
  </div>          

    {{-- <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-200v">

      <div class="login-wrapper wd-50 wd-xs-55 pd-50 pd-xs-60 bg-white ">
       
     <form action="{{route('login')}}" class="d-block " method="post">
         @csrf
        <div class="form-group">
            <label class="form-control-label"><h5>Email address :<span class="tx-danger" style="color:red">*</span>  </h5></label>
          <input placeholder="Enter your username" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <label class="form-control-label"><h5> Password: <span class="tx-danger" style="color:red">*</span></h5></label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Enter your password">
           @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
             @enderror
          <a href=" {{route('password.request')}} " class="tx-info tx-12 d-block mg-t-10 mt-3">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>

        <div class="mg-t-60 tx-center mt-3">Not yet a member? <a href=" {{route('registerIndex')}} " class="tx-info">Sign Up</a></div>

        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex --> --}}











        {{-- <div class="wrapper without_header_sidebar " >
            <!-- contnet wrapper -->
            <div class="content_wrapper justify-content-center" style="width: 500px;">
                    <!-- page content -->
                    <div class="login_page center_container">
                        <div class="center_content">
                            <div class="logo">
                                <img src="{{asset('public/panel/assets/images/logo.png')}}" alt="" class="img-fluid">
                            </div>
                            <form action="{{route('login')}}" class="d-block" method="post">
                                @csrf
                                <div class="form-group icon_parent">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a class="registration" href="{{route('register')}}">Create new account</a><br>
                                    <a href="{{ route('password.request') }}" class="text-white">I forgot my password</a>
                                    <button type="submit" class="btn btn-blue">Login</button>
                                </div>
                            </form>
                            <div class="footer">
                               <p>Copyright &copy; 2020 <a href="https://easylearningbd.com/">easy Learning</a>. All rights reserved.</p>
                            </div>
                            
                        </div>
                    </div>
            </div><!--/ content wrapper -->
        </div><!--/ wrapper --> --}}
@endsection

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Ecommerce website Admin</title>

    <!-- vendor css -->
    <link href=" {{asset('adminpanel/lib/font-awesome/css/font-awesome.css')}} " rel="stylesheet">
    <link href="{{asset('adminpanel/lib/Ionicons/css/ionicons.css')}} " rel="stylesheet">
    <link href="{{asset('adminpanel/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    {{-- product editor --}}
    
    
    {{-- multi tag input cdn --}}
    
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    {{-- datatable css --}}
    <link href=" {{asset('adminpanel/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('adminpanel/css/starlight.css')}} ">
    <link href="{{asset('adminpanel/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
  </head>

  <body>
      @guest

      @else
          
      

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Rapid Dev</a></div>
    <div class="sl-sideleft">
      {{-- <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group --> --}}

      {{-- <label class="sidebar-label">Navigation</label> --}}
      <div class="sl-sideleft-menu">
        <a href=" {{asset('adminpanel/app/index.html')}} " class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        {{-- <a href=" {{asset('adminpanel/app/widgets.html')}} " class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Cards &amp; Widgets</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> --}}

        @if (Auth::user()->category==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href=" {{route('categories')}} " class="nav-link">Category</a></li>
          <li class="nav-item"><a href=" {{route('sub.categories')}} " class="nav-link">Sub Category</a></li>
          <li class="nav-item"><a href=" {{route('brands')}} " class="nav-link">Brand</a></li>
          {{-- <li class="nav-item"><a href=" {{asset('adminpanel/app/chart-rickshaw.html')}} " class="nav-link">Rickshaw</a></li>
          <li class="nav-item"><a href=" {{asset('adminpanel/app/chart-sparkline.html')}} " class="nav-link">Sparkline</a></li> --}}
        </ul>
        @else    
        @endif
        
        @if (Auth::user()->coupon==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Coupon</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.coupon')}} " class="nav-link">Coupon</a></li>
         
        </ul>
        @else    
        @endif
        
        @if (Auth::user()->products==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href=" {{route('product.add')}}  " class="nav-link">Add Product</a></li>
          <li class="nav-item"><a href="{{route('product.all')}}" class="nav-link">All Product</a></li>
        </ul>
        @else    
        @endif
        
        @if (Auth::user()->orders==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href=" {{route('admin.neworder')}}  " class="nav-link">New orders</a></li>
          <li class="nav-item"><a href=" {{route('admin.accept.payment')}}  " class="nav-link">Payment Accept</a></li>
          <li class="nav-item"><a href=" {{route('admin.cancel.order')}}  " class="nav-link">Cancel Order</a></li>
          <li class="nav-item"><a href=" {{route('admin.process.delivery')}}  " class="nav-link">Process Delivery</a></li>
          <li class="nav-item"><a href=" {{route('admin.delivery.success')}}  " class="nav-link">Delivery Success</a></li>
          
        </ul>
        @else    
        @endif
        
        @if (Auth::user()->blogs==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Blogs</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href=" {{route('add.blog.categorylist')}}  " class="nav-link">Blog category</a></li>
          <li class="nav-item"><a href=" {{route('blogpost.add')}}  " class="nav-link">Add Post</a></li>
          <li class="nav-item"><a href="{{route('blogpost.all')}}" class="nav-link">Post List</a></li>
        </ul>
        @else    
        @endif

         

        @if (Auth::user()->other==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Other</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.newsletter')}} " class="nav-link">Newsletter</a></li>
          <li class="nav-item"><a href="{{route('admin.seo')}} " class="nav-link">SEO</a></li>
        </ul>
        @else    
        @endif
        
          
          
        @if (Auth::user()->reports==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Reports</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('order.today')}} " class="nav-link">Today order</a></li>
          <li class="nav-item"><a href="{{route('today.delivery')}} " class="nav-link">Today Devilery</a></li>
          <li class="nav-item"><a href="{{route('month.delivery')}} " class="nav-link">This Month Devilery</a></li>
          <li class="nav-item"><a href="{{route('search.report')}} " class="nav-link">Search report</a></li>
        </ul>
        @else    
        @endif
        

        @if (Auth::user()->user_role==1)
         <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">User Role</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.create.role')}} " class="nav-link">Create User</a></li>
          <li class="nav-item"><a href="{{route('admin.all.user')}} " class="nav-link">All User</a></li>
        </ul>
        @else    
        @endif
       
        @if (Auth::user()->return_order==1)
         <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Return Order</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.return.request')}} " class="nav-link">Return Request</a></li>
          <li class="nav-item"><a href="{{route('admin.return.request.all')}} " class="nav-link">All Request</a></li>
        </ul>
        @else    
        @endif

        @if (Auth::user()->stock==1)
         <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Product stocks</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.product.stock')}} " class="nav-link">Stock</a></li>
          
        </ul>
        @else    
        @endif
       
        @if (Auth::user()->contact_message==1)
        <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Contact Message</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          
          <li class="nav-item"><a href="{{route('all.message')}} " class="nav-link">All Message</a></li>
        </ul>
        @else    
        @endif
         
        @if (Auth::user()->product_comments==1)
        <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Product Comments</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('order.today')}} " class="nav-link">New Comment</a></li>
          <li class="nav-item"><a href="{{route('today.delivery')}} " class="nav-link">All Comment</a></li>
        </ul>
        @else    
        @endif
         
        @if (Auth::user()->site_setting==1)
        <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Site Setting</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.site.setting')}} " class="nav-link">Site Setting</a></li>
         
        </ul>
        @else    
        @endif
         


        {{-- <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Pages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{asset('adminpanel/app/blank.html')}} " class="nav-link">Blank Page</a></li>
          <li class="nav-item"><a href="{{asset('adminpanel/app/page-signin.html')}} " class="nav-link">Signin Page</a></li>
          <li class="nav-item"><a href="{{asset('adminpanel/app/page-signup.html')}} " class="nav-link">Signup Page</a></li>
          <li class="nav-item"><a href="{{asset('adminpanel/app/page-notfound.html')}} " class="nav-link">404 Page Not Found</a></li>
        </ul> --}}
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{Auth::user()->name}}</span>
              <img src="{{asset('adminpanel//img/img3.jpg')}} " class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=" {{route('admin.password.change')}} "><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                {{-- <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li> --}}
                <li><a id="adminlogout" href=" {{route('admin.logout')}} "><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{asset('adminpanel/img/img3.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{asset('adminpanel/img/img4.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                  <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{asset('adminpanel/img/img7.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                  <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{asset('adminpanel/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                  <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                  <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{asset('adminpanel/img/img3.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img8.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img9.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img10.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img8.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img10.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img9.jpg')}} " class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('adminpanel/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    
    @endguest
    @yield('admin_content')
    <!-- ########## END: MAIN PANEL ########## -->

   <script src=" {{asset('adminpanel/lib/jquery/jquery.js')}} "></script>
    <script src="{{asset('adminpanel/lib/popper.js/popper.js')}} "></script>
    <script src="{{asset('adminpanel/lib/bootstrap/bootstrap.js')}} "></script>
    <script src="{{asset('adminpanel/lib/jquery-ui/jquery-ui.js')}} "></script>
    <script src="{{asset('adminpanel/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}} "></script>
    {{-- datatabel js --}}
    <script src=" {{asset('adminpanel/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('adminpanel/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminpanel/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('adminpanel/lib/select2/js/select2.min.js')}}"></script>
    {{-- datatable script --}}
   
 <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

    

    <script src="{{asset('adminpanel/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}} "></script>
    <script src="{{asset('adminpanel/lib/d3/d3.js')}}"></script>
    <script src="{{asset('adminpanel/lib/rickshaw/rickshaw.min.js')}} "></script>
    <script src="{{asset('adminpanel/lib/chart.js/Chart.js')}} "></script>
    <script src="{{asset('adminpanel/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('adminpanel/lib/Flot/jquery.flot.pie.js')}} "></script>
    <script src="{{asset('adminpanel/lib/Flot/jquery.flot.resize.js')}} "></script>
    <script src="{{asset('adminpanel/lib/flot-spline/jquery.flot.spline.js')}} "></script>


        
{{-- product editor  --}}
     <script src="{{asset('adminpanel/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{asset('adminpanel/lib/summernote/summernote-bs4.min.js')}}"></script>

    
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>
     <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote2').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>
    <script>
          $(function(){
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote3').summernote({
              height: 150,
              tooltip: false
            })
          });
        </script>
    

    <script src="{{asset('adminpanel/js/starlight.js')}} "></script>
    <script src="{{asset('adminpanel/js/ResizeSensor.js')}} "></script>
    <script src="{{asset('adminpanel/js/dashboard.js')}} "></script>

    
    


    
     {{-- Toastr alert --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- sweet alert --}}
    <script src=" {{asset('https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js')}}"></script>
    {{-- sweet alert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- < src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></> --}}
    <script src=" {{asset('https://cdn.jsdelivr.net/npm/sweetalert2@10')}} "></script>

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

    {{-- admin logout confirmation --}}
	<script>  
			$(document).on("click", "#adminlogout", function(e){
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
					text: "You want to logout!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, Logout'
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

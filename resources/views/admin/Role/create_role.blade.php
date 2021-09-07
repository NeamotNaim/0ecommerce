@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin </a>
        <span class="breadcrumb-item active">Create</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Create Admin Page
            <a href="{{route('admin.all.user')}} "  class="btn btn-sm btn-success pull-right">All Admin</a>
          </h6>
          
          <p class="mg-b-20 mg-sm-b-30">New Admin Add form </p>
        <form method="post" action=" {{route('admin.store')}} " >
         @csrf
       
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter user name" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  placeholder="Enter phone number" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  placeholder="Enter email address" required="">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="password"  placeholder="Enter password" required="">
                </div>
              </div><!-- col-4 -->
            
              

             

              

             
            </div><!-- row -->
            <hr>
            <br>
            <br>
            

            <div class="row">
              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="category" value="1">
                      <span>Category</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="orders" value="1">
                      <span>Order</span>
                    </label>
              </div><!-- col-4 -->

              

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="products" value="1">
                      <span>Product</span>
                    </label>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="other" value="1">
                      <span>Other</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="blogs" value="1">
                      <span>Blog</span>
                    </label>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="coupon" value="1">
                      <span>Coupon</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="reports" value="1">
                      <span>Report</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="return_order" value="1">
                      <span>Return Order</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="site_setting" value="1">
                      <span>Site Setting</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="product_comments" value="1">
                      <span>Product Comment</span>
                    </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="contact_message" value="1">
                      <span>Contact Message</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="user_role" value="1">
                      <span>User Role</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="stock" value="1">
                      <span>Stock</span>
                    </label>
              </div><!-- col-4 -->

            

            </div><!-- row -->
            <br>
            <br>

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->

     
      
    </div><!-- sl-mainpanel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

 



   
@endsection

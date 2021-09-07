@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Product</a>
        <span class="breadcrumb-item active">Show</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Show Product Page
            <a href="{{url('product/edit/'.$product->id)}} "  class="btn btn-sm btn-success pull-right">Edit</a>
          </h6>
          
          <p class="mg-b-20 mg-sm-b-30">Show product </p>
        
       
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span>
                   </label>
                   <br><strong>{{$product->product_name}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span>
                </label>
                  <br><strong>{{$product->product_code}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quentity: <span class="tx-danger">*</span>
                 </label>
                 <br><strong>{{$product->product_quantity}}</strong>
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <br><strong>{{$product->category_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <br><strong>{{$product->subcategory_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <br><strong>{{$product->brand_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <br><strong>{{$product->product_size}}</strong>
                 
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <br><strong>{{$product->product_color}}</strong>
                 
                </div>
              </div>

               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Prize: <span class="tx-danger">*</span></label>
                  <br><strong>{{$product->selling_prize}}</strong>
                  
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Products Details: <span class="tx-danger">*</span></label>
                  <br><p>{!!$product->product_details!!}</p>
                  
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                   <br><strong>{{$product->vedio_link}}</strong>
                  
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image one(Main Thumbnail): <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
                    
                    
                    
                    <img src="{{url($product->image_one)}} " id="one" style="width: 80px;height:80px" >
                  </label>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image two: <span class="tx-danger">*</span></label> <br>
                  <label class="custom-file">
                  <img src="{{url($product->image_two)}} " id="one" style="width: 80px;height:80px" >
                  </label>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image three: <span class="tx-danger">*</span> </label><br>
                  <label class="custom-file">
                   <img src="{{url($product->image_three)}} " id="one" style="width: 80px;height:80px" >
                  </label>
                </div>
              </div><!-- col-4 -->

             
            </div><!-- row -->
            <hr>
            <br>
            <br>
            

            <div class="row">
              <div class="col-lg-4">
                 <label class="">
                     @if ($product->main_slider==1)
                           <span class="badge badge-success">Active</span>
                    @else
                           span class="badge badge-danger">Inactive</span>
                      @endif  
                      <span>Main Slider</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 
                      <label class="">
                     @if ($product->hot_deal==1)
                           <span class="badge badge-success">Active</span>
                    @else
                           <span class="badge badge-danger">Inactive</span>
                      @endif  
                      <span>Hot Deal</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                
                      <label class="">
                     @if ($product->mid_slider==1)
                           <span class="badge badge-success">Active</span>
                    @else
                           <span class="badge badge-danger">Inactive</span>
                      @endif  
                      <span>Mid Slider</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 
                      <label class="">
                     @if ($product->best_rated==1)
                           <span class="badge badge-success">Active</span>
                    @else
                           <span class="badge badge-danger">Inactive</span>
                      @endif  
                      <span>Best Rated</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 
                      <label class="">
                     @if ($product->trend==1)
                           <span class="badge badge-success">Active</span>
                    @else
                           <span class="badge badge-danger">Inactive</span>
                      @endif  
                      <span>Trend</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 
                      <label class="">
                     @if ($product->hot_new==1)
                           <span class="badge badge-success">Active</span>
                    @else
                           <span class="badge badge-danger">Inactive</span>
                      @endif  
                      <span>Hot New</span>
                    </label>
              </div><!-- col-4 -->

            </div><!-- row -->
            <br>
            <br>

            <div class="form-layout-footer">
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
       
        </div><!-- card -->

     
      
    </div><!-- sl-mainpanel -->
    
 
   
@endsection

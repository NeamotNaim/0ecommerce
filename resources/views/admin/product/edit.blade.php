@extends('admin.admin_layouts')

@section('admin_content')
@php
    $category=DB::table('categories')->get();
    $subcategory=DB::table('subcategories')->get();
    $brand=DB::table('brands')->get();
@endphp
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Product</a>
        <span class="breadcrumb-item active">Update</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product Page
            <a href="{{route('product.all')}} "  class="btn btn-sm btn-success pull-right">All Product</a>
          </h6>
          
          <p class="mg-b-20 mg-sm-b-30">Update product form </p>
        <form method="post" action=" {{url('product/update/'.$product->id)}} " enctype="multipart/form-data">
        @csrf
       
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}" placeholder="Enter product name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}"  placeholder="Enter product code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quentity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}"  placeholder="Enter quentity">
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose category" name="category_id">
                    <option label="Choose category"></option>
                    @foreach ( $category as $row )
                        <option 
                        @php
                            if($row->id==$product->category_id){
                                 echo "selected";
                            }     
                        @endphp
                            
                         value="{{$row->id}}"> {{$row->category_name}} </option>
                    @endforeach
                    
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">
                   @foreach ( $subcategory as $row )
                        <option 
                        @php
                            if($row->id==$product->subcategory_id){
                                echo "selected";
                            }
                        @endphp
                        value="{{$row->id}}"> {{$row->subcategory_name}} </option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose brand" name="brand_id">
                    <option label="Choose brand"></option>
                    @foreach ( $brand as $row )
                        <option 
                        @php
                            if($row->id==$product->brand_id){
                                echo "selected";
                            }
                        @endphp
                        value="{{$row->id}}"> {{$row->brand_name}} </option>
                    @endforeach
                    
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" value=" {{$product->product_size}} " placeholder="Enter size" id="productsize" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" value=" {{$product->product_color}} " placeholder="Enter Color" id="productcolor" data-role="tagsinput">
                </div>
              </div>

               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Prize: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_prize" value=" {{$product->selling_prize}} " placeholder="Enter selling prize"  >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Prize: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_prize" value=" {{$product->discount_prize}} " placeholder="Enter selling prize"  >
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Products Details: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote" name="product_details" placeholder="Enter details" >{{$product->product_details}} </textarea>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                  <input class="form-control" id="" name="vedio_link" value=" {{$product->vedio_link}} " placeholder="video link " >
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image one(Main Thumbnail): <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this);">
                    <input type="hidden" name="image_one_old" value=" {{$product->image_one}} ">
                    <span class="custom-file-control"></span>
                    <div class="col-lg-4">
                        <img src=" {{url($product->image_one)}} " id="one" style="width: 80px;height:80px;" >
                    </div>
                    
                  </label>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image two: <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" >
                    <input type="hidden" name="image_two_old" value=" {{$product->image_two}} ">
                    <span class="custom-file-control"></span>
                    <div class="col-lg-4">
                         <img src=" {{url($product->image_two)}} " id="two" style="width: 80px;height:80px;" >
                    </div>
                     
                  </label>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image three: <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)";>
                    <input type="hidden" name="image_three_old" value=" {{$product->image_three}} ">
                    <span class="custom-file-control"></span>
                    <div class="col-lg-4">
                        <img src=" {{url($product->image_three)}} " id="three" style="width: 80px;height:80px;" >
                    </div>
                     
                  </label>
                </div>
              </div><!-- col-4 -->

             
            </div><!-- row -->
            <hr>
            <br>
            <br>
            

            <div class="row">
              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="main_slider" <?php if ($product->main_slider==1) {
                          echo "checked";
                      } ?> value="1">
                      <span>Main Slider</span>
                    </label>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="hot_deal" <?php if ($product->main_slider==1) {
                          echo "checked";
                      } ?> value="1">
                      <span>Hot Deal</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="mid_slider" <?php if ($product->main_slider==1) {
                          echo "checked";
                      } ?> value="1">
                      <span>Mid Slider</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="best_rated" <?php if ($product->main_slider==1) {
                          echo "checked";
                      } ?> value="1">
                      <span>Best Rated</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="trend" <?php if ($product->main_slider==1) {
                          echo "checked";
                      } ?> value="1">
                      <span>Trend</span>
                    </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                 <label class="ckbox">
                      <input type="checkbox" name="hot_new"  <?php if ($product->main_slider==1) {
                          echo "checked";
                      } ?> value="1">
                      <span>Hot New</span>
                    </label>
              </div><!-- col-4 -->

            </div><!-- row -->
            <br>
            <br>

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Product</button>
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->

     
      
    </div><!-- sl-mainpanel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>
 <script type="text/javascript">
  function readURL1(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

   
@endsection

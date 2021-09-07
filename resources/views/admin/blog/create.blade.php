@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Post</a>
        <span class="breadcrumb-item active">Add</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Create Post Page
            <a href="{{route('blogpost.all')}} "  class="btn btn-sm btn-success pull-right">All Post</a>
          </h6>
          
          <p class="mg-b-20 mg-sm-b-30">Create post form </p>
        <form method="post" action=" {{route('blogpost.store')}} " enctype="multipart/form-data">
        @csrf
       
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Post Title(English): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  placeholder="Enter post title(English)">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title(Hindi): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_in"  placeholder="Enter post title(Hindi)">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title(Bangla): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  placeholder="Enter post title(Bangla)">
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Post Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose category" name="post_category_id">
                    <option label="Choose category"></option>
                    @foreach ( $blogcat as $row )
                        <option value="{{$row->id}}"> {{$row->category_name_en}} </option>
                    @endforeach
                    
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            


              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Products Details(English): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote" name="post_details_en"  placeholder="Enter details" ></textarea>
                  
                </div>
              </div><!-- col-4 -->

              
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Products Details(Hindi): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote2" name="post_details_in"  placeholder="Enter details" ></textarea>
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Products Details(Banlga): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote3" name="post_details_bn"  placeholder="Enter details" ></textarea>
                  
                </div>
              </div><!-- col-4 -->
            
              
               
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post image: <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL1(this);">
                    
                    <span class="custom-file-control"></span>
                    <img src="#" id="one" >
                  </label>
                </div>
              </div><!-- col-4 -->
             
            </div><!-- row -->
            <hr>
            <br>
            <br>
            <br>
            <br>

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
             
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

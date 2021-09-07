@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">SEO</a>
        <span class="breadcrumb-item active">Section</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SEO setting
           
          </h6>
          
          
        <form method="post" action=" {{url('admin/seo/update/'.$seo->id)}} " >
        @csrf
       
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Meta Title<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_title"  value=" {{$seo->meta_title}} ">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Meta Author <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_author"  value=" {{$seo->meta_author}} ">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Meta Tag<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_tag" value=" {{$seo->meta_tag}} " >
                </div>
              </div><!-- col-4 -->
            
              
             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control"  name="meta_description">{{$seo->meta_description}} </textarea>
                  
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                  <textarea class="form-control"  name="google_analytics"  >{{$seo->google_analytics}} </textarea>
                  
                </div>
              </div><!-- col-4 -->

              
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Bing Analytics <span class="tx-danger">*</span></label>
                  <textarea class="form-control"  name="bing_analytics" >{{$seo->bing_analytics}} </textarea>
                  
                </div>
              </div><!-- col-4 -->
              <input type="hidden" name="id" value=" {{$seo->id}} ">
             
            </div><!-- row -->
            <hr>
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

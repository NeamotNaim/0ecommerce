@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Site </a>
        <span class="breadcrumb-item active">Setting</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
        
          
        
        <form method="post" action=" {{route('siteSetting.update')}} " >
         @csrf
          <input type="hidden" name="id" value=" {{$setting->id}} ">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Phone One: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->phone_one}} " type="text" name="phone_one"  placeholder="Enter phone number" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->phone_two}} " type="text" name="phone_two"  placeholder="Enter phone number" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->email}} " type="email" name="email"  placeholder="Enter email address" required="">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->company_name}} " type="text" name="company_name"  placeholder="Enter company name" required="">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->company_address}} " type="text" name="company_address"  placeholder="Enter Company address" required="">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->facebook}} " type="text" name="facebook"  placeholder="Enter facebook address" required="">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Youtube: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->youtube}} " type="text" name="youtube"  placeholder="Enter youtube address" required="">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Twitter: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->twitter}} " type="text" name="twitter"  placeholder="Enter twitter address" required="">
                </div>
              </div><!-- col-4 -->



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Instagram: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->instagram}} " type="text" name="instagram"  placeholder="Enter instagram address" required="">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Vimeo: <span class="tx-danger">*</span></label>
                  <input class="form-control" value=" {{$setting->vimeo}} " type="text" name="vimeo"  placeholder="Enter vimeo address" required="">
                </div>
              </div><!-- col-4 -->



        


              
            </div><!-- row -->
            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Update Setting</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->

     
      
    </div><!-- sl-mainpanel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

 



   
@endsection

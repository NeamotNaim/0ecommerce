@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Message</a>
        <span class="breadcrumb-item active">Show</span>
      </nav>

       <div class="card pd-20 pd-sm-40">
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label">Name: 
                   </label>
                   <br><strong>{{$contact->name}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone:
                </label>
                  <br><strong>{{$contact->phone}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email:
                 </label>
                 <br><strong>{{$contact->email}}</strong>
                </div>
              </div><!-- col-4 -->
              <br>
              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Message: 
                  <br> <h5><strong>{{$contact->message}}</strong></h5> 
                </div>
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

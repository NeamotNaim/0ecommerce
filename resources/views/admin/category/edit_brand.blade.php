@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Update</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand Update
             
          </h6>
        
          <div class="table-wrapper">
            
          </div><!-- table-wrapper -->
        <!-- card -->

              <div class="modal-body pd-20">
                              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form method="POST" action=" {{url('brand/update/'.$brand->id)}} " enctype="multipart/form-data">
                @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Brand name</label>
                        <input type="text" class="form-control" id="newcategoriesInput" value=" {{$brand->brand_name}} " name="brand_name">
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
                        <input type="file" class="form-control"    name="brand_logo">
                      </div>

                       <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Old Brand Logo</label>
                        <img src="{{url($brand->brand_logo)}}" height="60px" width="70px">
                        <input type="hidden" name="old_logo" value=" {{$brand->brand_logo}} ">
                      </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
             
               
              </div>
             </form>
            </div>
            </div>

@endsection
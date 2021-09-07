@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sub Category Update</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub Category Update
             
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
              <form method="POST" action=" {{url('subcategory/update/'.$subcategory->id)}} ">
                @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sub Category name</label>
                        <input type="text" class="form-control" id="newcategoriesInput" value=" {{$subcategory->subcategory_name}} " name="subcategory_name">
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name</label>
                       <select class="form-control" name="category_id">
                         @foreach ($category as  $row)
                              <option value=" {{$row->id}} " 
                                <?php
                                    if($row->id==$subcategory->category_id){
                                      echo "selected";
                                    }
                                ?>
                                > {{$row->category_name}} </option>
                         @endforeach
                        
                       </select>
                      </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
             
               
              </div>
             </form>
            </div>
            </div>

@endsection
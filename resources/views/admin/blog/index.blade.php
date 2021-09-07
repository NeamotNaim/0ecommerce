@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Blog Post Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Blog Post List
              <a href=" {{route('blogpost.add')}} " class="btn btn-sm btn-warning" style="float:right;" 
              >Add New</a>
          </h6>
         

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Post title </th> 
                  <th class="wd-15p">Post Category</th> 
                  <th class="wd-15p">Post Image</th> 
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($post as $row )
                    
                
                <tr>
                  <td> {{$row->id}} </td>
                  <td> {{$row->post_title_en	}} </td>
                  <td> {{$row->category_name_en	}} </td>
                  <td><img src="{{URL::to($row->post_image)}}" style="width:50px;height:50px " />  </td>
                  <td><a href="{{URL::to('blog/post/edit/'.$row->id)}}"   class="btn btn-info mr-1" >Edit</a>
                    <a href=" {{URL::to('blog/post/delete/'.$row->id)}} " class="btn btn-danger"  id="delete">Delete</a></td>
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

       

     <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Blog Category Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
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
              <form method="POST" action=" {{route('postcategory.store')}} ">
                @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name English</label>
                        <input type="text" class="form-control" id="newcategoriesInput" placeholder="Enter category name" name="category_name_en">
                        
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name Hindi</label>
                        <input type="text" class="form-control" id="newcategoriesInput" placeholder="Enter category name" name="category_name_in">
                        
                      </div>
                      
                     
                      
               

              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Save</button>
             
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
             </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


        
                 

@endsection
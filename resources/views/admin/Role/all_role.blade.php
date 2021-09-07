@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5> All Admin Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admin List
              <a href=" {{route('admin.create.role')}} " class="btn btn-sm btn-warning" style="float:right;" 
              >Add New</a>
          </h6>
         

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Phone</th> 
                  <th class="wd-15p">Acess</th> 
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($admin as $row )
                    
                
                <tr>
                  <td> {{$row->name}} </td>
                  <td> {{$row->phone}} </td>
                  <td>
                      
                    @if ($row->category==1)
                    <span class="badge badge-info">category</span>   
                    @endif

                    @if ($row->coupon==1)
                    <span class="badge badge-warning">coupon</span>   
                    @endif

                    @if ($row->products==1)
                    <span class="badge badge-success">products</span>   
                    @endif

                     @if ($row->blogs==1)
                    <span class="badge badge-primary">products</span>   
                    @endif

                    @if ($row->orders==1)
                    <span class="badge badge-info">orders</span>   
                    @endif

                    @if ($row->other==1)
                    <span class="badge badge-primary">other</span>   
                    @endif

                    @if ($row->reports==1)
                    <span class="badge badge-info">reports</span>   
                    @endif


                    @if ($row->user_role==1)
                    <span class="badge badge-danger">user_role</span>   
                    @endif


                    @if ($row->contact_message==1)
                    <span class="badge badge-info">msg</span>   
                    @endif

                    @if ($row->product_comments==1)
                    <span class="badge badge-success">comment</span>   
                    @endif

                    @if ($row->site_setting==1)
                    <span class="badge badge-warning">site_setting</span>   
                    @endif


                    @if ($row->return_order==1)
                    <span class="badge badge-primary">return_order</span>   
                    @endif

                    @if ($row->stock==1)
                    <span class="badge badge-info">stock</span>   
                    @endif

                    

                  </td>
                  
                  
                  <td><a href="{{URL::to('admin/edit/user/role/'.$row->id)}}"   class="btn btn-sm btn-info mr-1" >Edit</a>
                    <a href=" {{URL::to('admin/delete/user/role/'.$row->id)}} " class="btn btn-sm btn-danger"  id="delete">Delete</a></td>
                  
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
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
              <form method="POST" action=" {{route('category.store')}} ">
                @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name</label>
                        <input type="text" class="form-control" id="newcategoriesInput" placeholder="Enter category name" name="category_name">
                        
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
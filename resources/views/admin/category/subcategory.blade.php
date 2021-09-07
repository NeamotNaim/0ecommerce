@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sub Category Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub Category List
              <a href="" class="btn btn-sm btn-warning" style="float:right;" 
              data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
         

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Sub Category name</th> 
                  <th class="wd-15p">Category name</th> 
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ( $subcat as $row )
                    
                
                <tr>
                  <td> {{$row->id}} </td>
                  <td> {{$row->subcategory_name}} </td>
                  <td> {{$row->category_name}} </td>
                  <td><a href="{{URL::to('subcategorry/edit/'.$row->id)}}"   class="btn btn-info mr-1" >Edit</a>
                    <a href=" {{URL::to('subcategorry/delete/'.$row->id)}} " class="btn btn-danger"  id="delete">Delete</a></td>
                  
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Sub Category Add</h6>
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
              <form method="POST" action=" {{route('subcategory.store')}} ">
                @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sub Category name</label>
                        <input type="text" class="form-control" id="newcategoriesInput" placeholder="Sub category name" name="subcategory_name">
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name</label>
                        <select class="form-control" name="category_id">
                            $@foreach ($category as $row)
                              <option value="{{$row->id}}"> {{$row->category_name}} </option>  

                            
                            @endforeach
                            
                        </select>
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
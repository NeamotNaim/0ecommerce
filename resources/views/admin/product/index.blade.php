@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
              <a href=" {{route('product.add')}} " class="btn btn-sm btn-warning" style="float:right;" 
              >Add New</a>
          </h6>
         

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product name</th> 
                  <th class="wd-15p">Image</th> 
                  <th class="wd-15p">Category</th> 
                  <th class="wd-15p">Brand</th> 
                  <th class="wd-15p">Quentity</th> 
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $row )
                    
                
                <tr>
                  <td> {{$row->product_code}} </td>
                  <td> {{$row->product_name}} </td>
                  <td>  <img src="{{asset($row->image_one)}}" style="width: 50px; height: 50px" >  </td>
                  <td> {{$row->category_name}} </td>
                  <td> {{$row->brand_name}} </td>
                  <td> {{$row->product_quantity}} </td>
                  <td>
                      @if ($row->status==1)
                          <span class="badge badge-success">Active</span>
                      
                      @else
                           <span class="badge badge-danger">Inactive</span>
                      
                          
                      @endif
                       </td>
                  <td>
                    <a href="{{URL::to('product/edit/'.$row->id)}}"   class="btn btn-sm btn-info mr-1" title="edit" ><i class=" fa fa-edit"></i></a>
                    <a href=" {{URL::to('product/delete/'.$row->id)}} " class="btn btn-sm btn-danger"  title="delete "id="delete"><i class=" fa fa-trash"></i></a>
                    <a href=" {{URL::to('product/show/'.$row->id)}} " class="btn btn-sm btn-warning" title="show" ><i class=" fa fa-eye"></i></a>
                     @if ($row->status==1)
                          <a href=" {{URL::to('product/inactive/'.$row->id)}} " class="btn btn-sm btn-danger" title="inactive" >
                            <i class=" fa fa-thumbs-down"></i></a>
                     @else
                            <a href=" {{URL::to('product/active/'.$row->id)}} " class="btn btn-sm btn-success" title="active" >
                            <i class=" fa fa-thumbs-up"></i></a>
                     @endif


                   
                </td>
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

       

     <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    
       

       
                 

@endsection
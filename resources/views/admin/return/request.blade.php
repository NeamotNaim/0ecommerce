@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Order Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Order List
              
          </h6>
         

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Payment Type</th>
                  <th class="wd-15p">Transection ID</th> 
                  <th class="wd-15p">Subtotal</th> 
                  <th class="wd-20p">Shipping</th>
                  <th class="wd-20p">Total</th>
                  <th class="wd-20p">Date</th>
                  <th class="wd-20p">Return req</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($order as $row )
                    
                
                <tr>
                  <td> {{$row->payment_type}} </td>
                  <td> {{$row->blnc_transection}}</td>
                  <td> {{$row->subtotal}}</td>
                  <td> {{$row->shipping_charge}}</td>
                  <td> {{$row->total}}</td>
                  <td> {{$row->date}}</td>
                  <td>
                           @if ($row->return_order==1)
                            <span class="badge badge-warning" >pending</span>
                            @elseif ($row->return_order==2)
                            <span class="badge badge-success" >success</span>
                            
                            @else  
                            <span class="badge badge-danger" >Invalid</span>
                            @endif
                      </td>
                  
                  <td>
                      @if ($row->return_order==1)
                          <a href=" {{url('admin/product/return/approve/'.$row->id)}} "   class="btn btn-sm btn-info mr-1" >Approve</a>
                          @else
                          <a href=" {{url('admin/product/return/approve/'.$row->id)}} "   class="btn btn-sm btn-light mr-1 disabled text-muted" >Return success</a>
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
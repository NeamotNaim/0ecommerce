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
                  <th class="wd-20p">Status</th>
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
                           @if ($row->status==0)
                            <span class="badge badge-warning" >pending</span>
                            @elseif ($row->status==1)
                            <span class="badge badge-info" >payment accept</span>
                            @elseif ($row->status==2)
                            <span class="badge badge-primary" >progress</span>
                            @elseif ($row->status==3)
                            <span class="badge badge-success" >delevered</span>
                            @elseif($row->status==4)
                            <span class="badge badge-danger" >cancel</span>
                            @else  
                            <span class="badge badge-danger" >Invalid</span>
                            @endif
                      </td>
                  
                  <td><a href=" {{url('admin/order/view/'.$row->id)}} "   class="btn btn-info mr-1" >View</a>
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
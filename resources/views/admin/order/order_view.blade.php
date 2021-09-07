@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

     <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Order Details</h5>
          
        </div><!-- sl-page-title -->

       <div class="row">
           <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Order</strong>Details</div>
                <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <th>{{$order->name}}</th>
                    </tr>

                    <tr>
                        <th>Phone:</th>
                        <th>{{$order->phone}}</th>
                    </tr>

                    <tr>
                        <th>Payment Type:</th>
                        <th>{{$order->payment_type}}</th>
                    </tr>

                    <tr>
                        <th>Payment ID:</th>
                        <th>{{$order->payment_id}}</th>
                    </tr>

                    <tr>
                        <th>Total:</th>
                        <th>{{$order->total}}$</th>
                    </tr>

                    <tr>
                        <th>Month:</th>
                        <th>{{$order->month}}</th>
                    </tr>

                    <tr>
                        <th>Date:</th>
                        <th>{{$order->date}}</th>
                    </tr>

                   
                </table>
                </div>
            </div>  
            
           </div>  

           <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Shipping</strong>Details</div>
                <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <th>{{$shipping->ship_name}}</th>
                    </tr>

                    <tr>
                        <th>Phone:</th>
                        <th>{{$shipping->ship_phone}}</th>
                    </tr>

                    <tr>
                        <th>Email:</th>
                        <th>{{$shipping->ship_email}}</th>
                    </tr>

                    <tr>
                        <th>Address:</th>
                        <th>{{$shipping->ship_address}}</th>
                    </tr>

                    <tr>
                        <th>City</th>
                        <th>{{$shipping->ship_city}}</th>
                    </tr>

                    <tr>
                        <th>Status:</th>
                        <th>
                            @if ($order->status==0)
                            <span class="badge badge-warning" >pending</span>
                            @elseif ($order->status==1)
                            <span class="badge badge-info" >payment accept</span>
                            @elseif ($order->status==2)
                            <span class="badge badge-primary" >progress</span>
                            @elseif ($order->status==3)
                            <span class="badge badge-success" >delevered</span>
                            @else
                            <span class="badge badge-danger" >cancel</span>
                                
                            @endif
                        </th>
                    </tr>

                    

                   
                </table>
                </div>
            </div>   
           </div>      
       </div>
       <div class="row my-lg-5">
         <div class=" card pd-20 pd-sm-40 col-lg-12">
          <h6 class="card-body-title">Product Details</h6>
            
          <div class="table-wrapper">
            <table  class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product ID</th>
                  <th class="wd-15p">Product name</th> 
                  <th class="wd-15p">Image</th> 
                  <th class="wd-15p">Color</th> 
                  <th class="wd-15p">Size</th> 
                  <th class="wd-15p">Quentity</th> 
                  <th class="wd-20p">Unit Price</th>
                  <th class="wd-20p">Total</th>
                 
                </tr>
              </thead>
              <tbody>
                
                    
                @foreach ($detail as $detail)
                    
                
                <tr>
                  <td> {{$detail->product_code}} </td>
                  <td> {{$detail->product_name}} </td>
                  <td>  <img src="{{asset($detail->image_one)}}" style="width: 50px; height: 50px" >  </td>
                  <td> {{$detail->color}} </td>
                  <td> {{$detail->size}} </td>
                  <td> {{$detail->quantity}} </td>
                  <td> {{$detail->singleprice}} </td>
                  <td> {{$detail->totalprice}} </td>
                   
                </tr>
               @endforeach
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
       </div>
        <div class="text-center">

            @if ($order->status==0)
            <a href=" {{url('admin/order/cancel/'.$order->id)}} " class="btn btn-danger col-lg-4">Cancel order </a>
            <a href="{{url('admin/order/accept/'.$order->id)}}" class="btn btn-info col-lg-4">Payment accept</a>
            @elseif ($order->status==1)
             
            <a href="{{url('admin/order/shifted/process/'.$order->id)}}" class="btn btn-primary col-lg-6">Shifted to Process ?</a>
            @elseif ($order->status==2)
            
            <a href="{{url('admin/order/shifted/delivered/'.$order->id)}}" class="btn btn-success col-lg-6"> Delivery Done</a>
            @elseif ($order->status==3)
            <span class="card-title" >Order successfully delevered</span>
            @else
            <span class="card-title" >Something wrong</span>
                
            @endif
           
            
        </div>
       
    </div>   



        

@endsection
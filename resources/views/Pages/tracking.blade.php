@extends('layouts.app')
@section('content')
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-5 offset-lg-1">
                <div class="contact-form-title"><h4>Your Order Status</h4></div><br>
             <div class="progress">
                 @if ($track->status==0)
                     <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                
                 
                 @elseif ($track->status==1)
                     <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                     <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                 
                  @elseif ($track->status==2)
                     <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                     <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                     <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                 
                  @elseif ($track->status==3)
                     <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                     <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                     <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                     <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                 
                 @else
                     <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    
                 @endif
                
                </div>   <br>
                 @if ($track->status==0)
                            <h4 class="" >Note: Your order is under review</h4>
                            @elseif ($track->status==1)
                            <h4 class="" >Note: Payment accept,packing under process</h4>
                            @elseif ($track->status==2)
                            <h4 class="" >Note: Packing done handover process</h4>
                            @elseif ($track->status==3)
                            <h4 class="" >Note: Order Complete</h4>
                            @else
                            <h4 class="" >Note: Order Cancel</h4>
                                
                            @endif

            </div>

            <div class="col-5 offset-lg-1">
                <div class="contact-form-title"><h4>Order Details</h4> </div><br>
                <ul class="list-group col-lg-12">
                    <li class="list-group-item">Payment Type: <strong>{{$track->payment_type}} </strong></li>
                    <li class="list-group-item">Transection ID: <strong>{{$track->payment_id}} </strong></li>
                    <li class="list-group-item">Balance ID: <strong>{{$track->blnc_transection}} </strong></li>
                    <li class="list-group-item">Subtotal: <strong>{{$track->subtotal}}$ </strong></li>
                    <li class="list-group-item">Shipping: <strong>{{$track->shipping_charge}}$ </strong></li>
                    <li class="list-group-item">Vat: <strong>{{$track->vat}}$ </strong></li>
                    <li class="list-group-item">Total: <strong>{{$track->total}}$ </strong></li>
                    <li class="list-group-item">Month: <strong>{{$track->month}} </strong></li>
                    <li class="list-group-item">Date: <strong>{{$track->date}} </strong></li>
                    <li class="list-group-item">Year: <strong>{{$track->year}} </strong></li>

                </ul>
                   

            </div>
        </div>
    </div>
</div>
@endsection
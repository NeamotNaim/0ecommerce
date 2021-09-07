@extends('layouts.app')
@section('content')
@php
    
@endphp
<div class="contact_form">
   <div class="container">
       <div class="row">
           <div class="col-8 card">
               <table class="table table-response">
                   <thead>
                       <tr>
                           <th scope="col">Return Status</th>
                           <th scope="col">Payment ID</th>
                           <th scope="col">Amount</th>
                           <th scope="col">Date</th>
                           <th scope="col">Status</th>
                           <th scope="col">Status Code</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>

                    <tbody>
                        @foreach ($order as $item)
                           <tr>
                           <td scope="col">@if ($item->return_order==0)
                            <span class="badge badge-info" >no request</span>
                            @elseif ($item->return_order==1)
                            <span class="badge badge-warning" >pending</span>
                            @elseif ($item->return_order==2)
                            <span class="badge badge-success" >success</span>
                            @else
                            <span class="badge badge-danger" >not possible</span>
                                
                            @endif</td>
                           <td scope="col">{{$item->payment_id}}</td>
                           <td scope="col">{{$item->total}}$</td>
                           <td scope="col">{{$item->date}}</td>
                           <td scope="col">
                               @if ($item->status==0)
                            <span class="badge badge-warning" >pending</span>
                            @elseif ($item->status==1)
                            <span class="badge badge-info" >accepted</span>
                            @elseif ($item->status==2)
                            <span class="badge badge-primary" >progress</span>
                            @elseif ($item->status==3)
                            <span class="badge badge-success" >delevered</span>
                            @else
                            <span class="badge badge-danger" >cancel</span>
                                
                            @endif
                           </td>
                           <td scope="col">{{$item->status_code}}</td>
                           @if ($item->return_order==0)
                              <td scope="col"><a href=" {{url('return/request/'.$item->id)}} " class="btn btn-sm  btn-outline-danger " id="return">Return</a></td>
                              @else
                               <td scope="col"><a href=" {{url('return/request/'.$item->id)}} " class="btn btn-sm  btn-outline-danger disabled" title="already in process"  id="return">Return</a></td>
                           @endif
                           
                           
                       </tr> 
                        @endforeach
                       
                        
                   </tbody>
               </table>
           </div>

           <div class="col-4">
               <div class="card">
                    <img src=" {{asset('panel/assets/images/admin.jpg')}} " class="card-img-top" style="width:89px; height:89px; margin-left:34%; border-radius:50%;">
               </div>
               <div class="card-body">
                   <h4 class="card-title text-center">{{Auth::user()->name}}</h4>
               </div>
               <ul class="list-group list-group-flush">
                   <li class="list-group-item"> <a href=" {{route('password.change')}} ">Change Password</a> </li>
                   <li class="list-group-item">Edit Profile</li>
                   <li class="list-group-item"> <a href=" {{route('success.product.list')}} ">Return product</a> </li>

               </ul>
               <div class="card-body">
                   <a href=" {{route('user.logout')}} " class="btn btn-sm btn-danger btn-block">Logout</a>
               </div>

           </div>
       </div>
   </div>
</div>
@endsection

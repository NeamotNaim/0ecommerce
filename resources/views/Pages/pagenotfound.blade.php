@extends('layouts.app')
@section('content')

  <div class="container p-5">

    <div class="ht-100v bg-sl-primary d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-white mg-b-0">Campaigns Not Available at this time!</h1>
        <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">The page your are looking for has not been found.</h5>
        <p class="tx-16 mg-b-30 tx-white-5">The page you are looking for is not available at this moment, visit here at the period fo champaign ,
</p>

       

        <div class="tx-center mg-t-20">...back to <a href="  {{url('/')}}">home</a></div>
      </div>
    </div><!-- ht-100v -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>

  </div>
@endsection
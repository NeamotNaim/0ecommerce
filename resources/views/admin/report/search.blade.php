@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Order Searching</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          
         <div class="row">
             <div class="col-lg-4">
               <form method="POST" action=" {{url('admin/report/search/by/date')}} " enctype="multipart/form-data">
                <div class="modal-body p-20">

                
                @csrf
                      <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Search By Date</label>
                        <input type="date" name="date" class="form-control">
                      </div>

                </div> 
                 <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Search</button>     
               </div>
             
             
               </form>
              </div>


              <div class="col-lg-4">
               <form method="POST" action=" {{url('admin/report/search/by/month')}} " enctype="multipart/form-data">
                <div class="modal-body p-20">

                
                @csrf
                      <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Search By Month</label>
                        <select class="form-control" name="month">
                          <option value="January" >January</option>
                          <option value="February" >February</option>
                          <option value="March" >March</option>
                          <option value="April" >April</option>
                          <option value="May" >May</option>
                          <option value="June" >June</option>
                          <option value="July" >July</option>
                          <option value="August" >August</option>
                          <option value="September" >September</option>
                          <option value="October" >October</option>
                          <option value="November" >November</option>
                          <option value="December" >December</option>
                        </select>
                      </div>

                </div> 
                 <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Search</button>     
               </div>
             
             
               </form>
              </div>



              <div class="col-lg-4">
               <form method="POST" action=" {{url('admin/report/search/by/year')}} " >
                <div class="modal-body p-20">

                
                @csrf
                      <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Search By Year</label>
                        <select class="form-control" name="year">
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                         
                        </select>
                      </div>

                </div> 
                 <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Search</button>     
               </div>
             
             
               </form>
              </div>
             
           </div>
         </div>
        </div><!-- card -->

       

     <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   
       

        

@endsection
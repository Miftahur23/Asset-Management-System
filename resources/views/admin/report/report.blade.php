@extends('master')  
    @section('content')
        
   
           
    <div class="card mt-3">
        <div class="container m-3">
            <h2>Reports</h2> 
        </div>      
    </div>


    <div class="card mt-3">
      <div class="container m-3">

    <form action="{{route('show.report')}}"  method="GET">
      <div class="row" >

        <div class="col-4 mt-3">
          <label for="fromdate" class="form-label"><h5>From</h5></label>
          <input name="fromdate" type="date" class="form-control" id="fromdate" >
        </div>

        <div class="col-4 mt-3">
          <label for="todate" class="form-label"><h5>To</h5></label>
          <input name="todate" type="date" class="form-control" id="todate" >
        </div>
          
          <div class="col-3 mt-5 pt-2">
              <button  type="submit" class="btn btn-success btn-sm">Search</button>
          </div>
      </div>
    </form>
      </div>
    </div>

    <div class="card mt-4">
        <div class="container">
                        <div class="container" style="width: 100%;">
                            <table class="table table-dark table-bordered mt-3">
                                <thead>
                                  <tr>
                                    
                                    
                                    <th scope="col">No</th>
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($reports as $key=>$item)
                                  <tr>
                                    <td>{{$key+1}}</td>>
                                    <td>{{$item->asset->asset_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->worth}}</td>
                                  </tr>
                                @endforeach 
    
                                </tbody>
                            </table> 
                        </div>
        </div>
    </div>
        
    @endsection

    

    

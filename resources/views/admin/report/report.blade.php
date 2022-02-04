@extends('master')  
    @section('content')
        
            <h1>Reports</h1> 
            <br>
<div class="card p-3" style="display:flex; text-align:center;">
  <h3>Asset Distributions Since Last Week : {{$dist->count()}}</h3> 
</div>

            
       

    <form action="{{route('show.report')}}"  method="GET" style="text-align:center;">

      <div class="row" >

        <div class="col-4 mt-3" >
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




<div id="ReportPrint">

<div class="card mt-4">
  <div class="container">
      <div class="table-responsive-sm">
          <table class="table table-dark table-bordered mt-3" style="text-align:center;">
              
                  <tbody>
                    <thead>
                      <tr>
                        
                        <th scope="col">No</th>
                        <th scope="col">Asset Name</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Department</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Worth</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                
                    @foreach ($reports as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->asset->asset_name}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->departments->dname}}</td>
                        <td>{{$item->branches->name}}</td>
                        <td>{{$item->quantity*$item->asset->cost}}</td>

                    

                      </tr>
                    @endforeach 

                  </tbody>
          </table>
      </div>


          
      
  </div>
</div>
</div>

<button class="btn btn-primary m-3" type="submit" onClick="PrintDiv('ReportPrint');" value="Print">Print</button>


@endsection

    
<script language="javascript">
  function PrintDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
  </script>

    

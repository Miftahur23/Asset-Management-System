@extends('master')  
    @section('content')
        
   
           
    <div class="card mt-3">
        <div class="container m-3">
            <h2>Reports</h2> 
        </div>      
    </div>

    <div class="card mt-4">
        <div class="container">

                        <div class="container" style="width: 100%">
                            <table class="table table-dark table-bordered mt-3">
                                <thead>
                                  <tr>
                                    
                                    
                                    <th scope="col">No</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                            
                                @foreach ($quantity as $key=>$item)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$month}}</td>
                                    <td>{{$item->asset->asset_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td></td>
                                  </tr>
                                @endforeach 
    
                                </tbody>
                            </table> 
                        </div>
        </div>
    </div>

    <h1>ok</h1>
        
    @endsection

    

    

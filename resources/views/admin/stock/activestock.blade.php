@extends('master')  
    @section('content')
        
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
           
    
            <h1>Active Asset Infos</h1> 
        
                                
    <div class="card mt-3">
        <div class="container"> 
                                    <a href="{{route('create.stock')}}" type="button" class="btn btn-success mt-2">
                                        Create Stock
                                    </a>
                                

                          <div class="table-responsive-sm">
                            <table class="table table-dark table-bordered mt-3" style="text-align:center;">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Location</th>
                                <th scope="col">Amount</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($stock as $key=>$item)

                              @php
                                   $wor=$item->worth; 
                              @endphp

                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->asset->asset_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->location}}</td>
                                
                                <td>{{intval($wor)}}</td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                        </table> 
                    </div>

    </div>
</div>
@endsection

    

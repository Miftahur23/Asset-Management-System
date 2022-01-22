@extends('master')  
    @section('content')
        
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
           
    <div class="card mt-3">
        <div class="container m-3">
            <h2>Active Asset Infos</h2> 
        </div> 
    </div> 
                                
    <div class="card mt-4">
        <div class="container"> 
                                    <a href="{{route('create.stock')}}" type="button" class="btn btn-success mt-2">
                                        Create Stock
                                    </a>
                                



                    <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Location</th>
                                <th scope="col">Total Worth</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($stock as $key=>$item)
                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->asset->asset_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->worth}}</td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                        </table> 
                    </div>

    </div>
</div>
@endsection

    

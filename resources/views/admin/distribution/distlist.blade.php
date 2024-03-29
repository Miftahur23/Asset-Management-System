@extends('master')  
    @section('content')
        
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif

@if(session()->has('stock'))
      <p class="alert alert-danger">
          {{session()->get('stock')}}
      </p>
@endif
           
    
                    <h1>Distributions</h1> 

    <div class="card mt-4">
        <div class="container">
                                    <a href="{{route('select.branch')}}" type="button" class="btn btn-success mt-3">
                                        Distribute Your Asset
                                    </a>

                        

                        <div class="table-responsive-sm">
                            <table class="table table-dark table-bordered mt-3" style="text-align:center;">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Department</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Status</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                            @foreach ($distasset as $key=>$item)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->asset->asset_name}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->departments->dname}}</td>
                                <td>{{$item->branches->name}}</td>

                                <td>

                                  @if($item->status=='Pending')
                                  <a class="btn btn-warning btn-sm" >{{$item->status}}<a>
                                      @else

                                  <button class="btn btn-success btn-sm mr-3">{{$item->status}}<a>
                                      @endif
                                </td>

                            

                              </tr>
                            @endforeach 

                            </tbody>
                        </table> 
                    </div>
                
        </div>
    </div>
    @endsection

    

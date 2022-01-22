@extends('master')  
    @section('content')
        
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
           
    <div class="card mt-3">
        <div class="container m-3">
                                 <h2>Distributions</h2> 
        </div> 
    </div> 

    <div class="card mt-4">
        <div class="container">
                                    <a href="{{route('select.branch')}}" type="button" class="btn btn-success mt-3">
                                        Distribute Your Asset
                                    </a>

                        

                        <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Department</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                            @foreach ($distasset as $key=>$item)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->stock->asset->asset_name}}</td>
                                <td>{{$item->employee_id}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->departments->dname}}</td>
                                <td>{{$item->branches->name}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="#">Damage</a>

                                </td>

                            

                              </tr>
                            @endforeach 

                            </tbody>
                        </table> 
                    </div>
                
        </div>
    </div>
    @endsection

    

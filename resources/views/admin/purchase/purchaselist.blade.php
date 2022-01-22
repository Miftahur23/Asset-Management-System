@extends('master')  
    @section('content')
        
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
           
<div class="card mt-3">
    <div class="container m-3">
        <h2>Purchases</h2> 
    </div>
</div> 


<div class="card mt-4">
    <div class="container">
                                    <a href="{{route('create.purchase')}}" type="button" class="btn btn-success mt-3">
                                        + Purchase Extra Assets
                                    </a>

                        

                        <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($purchase as $key=>$item)
                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->asset_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>
                                    @if($item->status!='Purchased')
                                    <h5>Pending</h5>
                                    @else
                                    <h6>Purchased {{$item->created_at->diffforhumans()}}</h6>
                                    @endif
                                </td>
                                <td>

                                    @if($item->status!='Purchased')
                                        <form action="{{route('update.purchase',$item->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                        <button class="btn btn-success btn-sm ml-3" name="status" value="Purchased" type='submit'>Purchase<a>
                                        
                                        </form>
                                        @else()

                                        <h6>Action Taken</h6>
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
    

@extends('master')  
    @section('content')

    @if(session()->has('success'))
                        <p class="alert alert-success">
                            {{session()->get('success')}}
                        </p>
    @endif
        
        

                            <form action="{{route('show.reqlist')}}" method="GET" >

                                <div class="row" style="margin-left: 700px">
                            
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                    <div class="col">
                                        <input value="" type="text" placeholder="Search" name="search" class="form-control">
                                    </div>
                                    
                                </div>
                            
                            </form>
                            
                            
                                 <h1>Damage Request List</h1> 
                                

                            

                    
            <div class="card mt-4">
                <div class="container">
                    <div class="table-responsive-sm">
                        <table class="table table-dark table-bordered mt-3" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Quantity</th>

                                    @if(auth()->user()->role=='admin')

                                    <th scope="col">Requested By</th>
                                    <th scope="col">Action</th>
                                    @endif

                                    <th scope="col">Status</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($damage as $key=>$item)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->asset_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    @if(auth()->user()->role=='admin')
                                    <td>{{$item->requested_by}}</td>
                                    <td>
                                        @if($item->status=='Pending')

                                        <form action="{{route('update.damage',$item->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                        <button class="btn btn-success btn-sm ml-3"  href="{{route('create.purchase',$item->id)}}" name="status" value="Accepted" type='submit'>Accept<a>
                                        <button class="btn btn-danger btn-sm mr-3" name="status" value="Rejected" type='submit'>Reject<a>
                                        

                                        </form>
                                        @else
                                        <h6>Action Taken</h6>
                                        @endif
                                    </td>

                                    @endif

                                    <td>
                                        @if($item->status=='Pending')
                                        <a class="btn btn-warning btn-sm" >{{$item->status}}<a>
                                            @elseif($item->status=='Accepted')
                                        <a class="btn btn-success btn-sm" >{{$item->status}}<a>
                                            @else
                                        <a class="btn btn-danger btn-sm" >{{$item->status}}<a>
                                            @endif

                                            {{$item->updated_at->diffforhumans()}}
                                    </td>
                                  </tr>
                                  @endforeach
                            
                                  

                            </tbody>
                          </table>
                        </div>


                        
                    
            </div>
        </div>
    @endsection

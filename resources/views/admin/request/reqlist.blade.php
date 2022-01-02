@extends('master')  
    @section('content')
        
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Request List</h2> 
                                </div>
                                
                            </div>
                        </div>
                    </div>               
                    <div class="app-inner-layout app-inner-layout-page">
                        {{-- table  --}}
                        {{-- @include('table.table') --}}

                    @if(session()->has('success'))
                        <p class="alert alert-success">
                            {{session()->get('success')}}
                        </p>
                    @endif

                    <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Requested By</th>
                                    {{-- <th scope="col">Department</th>
                                    <th scope="col">Branch</th> --}}

                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                            
                                  @foreach ($data as $key=>$item)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->asset_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->requested_by}}</h6></td>
                                    <td>
                                        @if($item->status=='Pending')

                                        <form action="{{route('update.action',$item->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                        <button class="btn btn-success ml-3" name="status" value="Accepted" type='submit'>Accept<a>
                                        <button class="btn btn-danger mr-3" name="status" value="Rejected" type='submit'>Reject<a>
                                        

                                        </form>
                                        @else
                                        <h6>Action Taken</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if($item->status=='Pending')
                                        <a class="btn btn-warning" >{{$item->status}}<a>
                                            @elseif($item->status=='Accepted')
                                        <a class="btn btn-success" >{{$item->status}}<a>
                                            @else
                                        <a class="btn btn-danger" >{{$item->status}}<a>
                                            @endif
                                    </td>

                                    

                                    
                                  </tr>
                                @endforeach 

                            </tbody>
                          </table></div>


                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

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
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                            
                                  @foreach ($data as $key=>$item)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->asset_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{Auth::User()->name}}</h6></td>

                                    <td>
                                    @if ($item->status=='Pending')
                                        <a class="btn btn-warning" href="{{route('view.request',$item->id)}}">Pending</a>
                                   
                                    @elseif($item->status=='Confirmed')
                                        <a class="btn btn-warning" href="#">Confirmed</a>

                                    @else
                                        <a class="btn btn-warning" href="#">Pending<a>
                                    @endif
                                    </td>

                                    <td>
                                        @if ($item->status=='Pending')
                                            <a class="btn btn-warning" href="#">Accept<a>
                                            <a class="btn btn-warning" href="#">Reject<a>  
                                        @elseif($item->status=='Confirmed')
    
                                        @else
                                            <a class="btn btn-warning" href="{{route('view.request',$item->id)}}">Pending<a>
                                            <a class="btn btn-warning" href="#">Confirmed<a>
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

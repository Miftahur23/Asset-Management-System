@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Distributions</h2> 
                                </div> 
                                <div class="page-title-actions"> 
                                    <a href="{{route('create.distribution')}}" type="button" class="btn btn-success">
                                        Distribute Your Asset
                                    </a>
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
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->departments->dname}}</td>
                                <td>{{$item->branches->name}}</td>
                                <td>
                                    <a class="btn btn-warning" href="#">Damage</a>

                                </td>

                            

                              </tr>
                            @endforeach 

                            </tbody>
                        </table> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    

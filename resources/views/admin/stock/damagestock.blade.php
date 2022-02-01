@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Damaged Asset Infos</h2> 
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

                    <div class="table-responsive-sm">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Department</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Worth</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                                {{-- @dd($damstocks) --}}

                              @foreach ($damstocks as $key=>$item)
                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->asset_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->distribution->departments->dname}}</td>
                                <td> </td>
                                <td>{{$item->distribution->branches->name}}</td>
                                <td>{{$item->worth}}</td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                        </table> </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    

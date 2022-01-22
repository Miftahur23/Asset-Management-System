@extends('master')  
    @section('content')

    <style>
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            text-decoration: none;
            color: black;
        }
    </style>
    
    <div class="card">
        <div class="container m-4">
            <h1>Dashboard</h1> 
        </div>
    </div>

    
        {{-- {{$count['stock']}} --}}
        

    <div class="card mt-3">
        <div class="container m-2">

            <div class="row">
                <div class="col-4">
                    
                    <div class="card widget-flat m-3">
                        <a href="{{route('show.emplist')}}">
                        <div class="card-body" style="background-color:rgba(131, 109, 255, 0.466);">
                            
                            <h5 class="text fw-normal mt-0" title="Number of Employees">Employees</h5>
                            <h3 class="mt-3 mb-3">{{$count['employees']}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                <span class="text-nowrap">Since last month</span>  
                            </p>
                        </div> <!-- end card-body-->
                        </a>
                    </div>
                     <!-- end card-->
                </div> <!-- end col-->

                <div class="col-4">
                    <div class="card widget-flat m-3">
                        <a href="{{route('show.asset')}}">
                        <div class="card-body" style="background-color:powderblue;">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text fw-normal mt-0" title="Number of Assets">Assets</h5>
                            <h3 class="mt-3 mb-3">{{$count['assets']}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                        </a> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            
                <div class="col-4">
                    <div class="card widget-flat m-3">
                        <a href="{{route('show.reqlist')}}">
                        <div class="card-body" style="background-color:rgba(145, 233, 74, 0.829);">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text fw-normal mt-0" title="Total Revenue">Requests</h5>
                            <h3 class="mt-3 mb-3">{{$count['requests']}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                        </a> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            
      
        
    @endsection

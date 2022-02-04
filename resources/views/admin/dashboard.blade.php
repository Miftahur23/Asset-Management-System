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
    
    
            <h1>Dashboard</h1> 
        

            

    <div class="card mt-3">
        <div class="container m-2">

            <div class="row m-2">
                <div class="col-4">
                    
                    <div class="card m-3" style="text-align:center;">
                    <a href="{{route('show.emplist')}}">
                        <div class="card-body" style="background-color:rgba(131, 109, 255, 0.466);">
                            
                            <h5 class="text fw-normal mt-0" title="Number of Employees">Employees</h5>
                            <h3 class="mt-3 mb-3">{{$count['employees']}}</h3>
                             
                        </div> <!-- end card-body-->
                    </a>
                    </div>
                     <!-- end card-->
                </div> <!-- end col-->

                <div class="col-4">
                    <div class="card m-3" style="text-align:center;">
                        <a href="{{route('show.asset')}}">
                        <div class="card-body" style="background-color:rgb(0, 255, 21);">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text fw-normal mt-0" title="Number of Assets">Assets</h5>
                            <h3 class="mt-3 mb-3">{{$count['assets']}}</h3>
                             
                        </div>
                        </a> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            
                <div class="col-4">
                    <div class="card m-3" style="text-align:center;">
                        <a href="{{route('show.reqlist')}}">
                        <div class="card-body" style="background-color:rgba(255, 6, 6, 0.911);">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text fw-normal mt-0" title="Total Revenue">Asset Requests</h5>
                            <h3 class="mt-3 mb-3">{{$count['pendingassetrequests']}}</h3>
                             
                        </div>
                        </a> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-4">
                    
                    <div class="card m-3" style="text-align:center;">
                    <a href="{{route('show.damagereqlist')}}">
                        <div class="card-body" style="background-color:rgba(255, 180, 68, 0.842);">
                            
                            <h5 class="text fw-normal mt-0" title="Number of Employees">Damage Requests</h5>
                            <h3 class="mt-3 mb-3">{{$count['pendingdamagerequests']}}</h3>
                            
                        </div> <!-- end card-body-->
                    </a>
                    </div>
                     <!-- end card-->
                </div>

                <div class="col-4">
                    
                    <div class="card m-3" style="text-align:center;">
                    <a href="{{route('show.purchase')}}">
                        <div class="card-body" style="background-color:rgb(0, 162, 255);">
                            
                            <h5 class="text fw-normal mt-0" title="Number of Employees">Purchasable</h5>
                            <h3 class="mt-3 mb-3">{{$count['purchasable']}}</h3>
                             
                        </div> <!-- end card-body-->
                    </a>
                    </div>
                     <!-- end card-->
                </div>

                <div class="col-4">
                    
                    <div class="card m-3" style="text-align:center;">
                    <a href="#">
                        <div class="card-body" style="background-color:rgb(128, 107, 241);">
                            
                            <h5 class="text fw-normal mt-0" title="Number of Employees">Total Worth Of Active Stock</h5>
                            <h5 class="mt-3 mb-3">BDT {{$totalworth}}</h5>
                             
                        </div> <!-- end card-body-->
                    </a>
                    </div>
                     <!-- end card-->
                </div>

                

            </div>
            
      
        
    @endsection

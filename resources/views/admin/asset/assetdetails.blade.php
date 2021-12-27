@extends('master')  
    @section('content')
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                
                                {{-- content --}}
                                      
                            </div>
                        </div>
                    </div>               
                    <div class="app-inner-layout app-inner-layout-page">
                        {{-- table  --}}
                        {{-- @include('table.table') --}}
                        <p>
                            <img style="border-radius: 8px;" width="300px;" height="300px;" src=" {{url('/uploads/products/'.$details->image)}}" alt="product">
                        </p>
                        
                        <div class>
                        <p><b>Name: {{$details->asset_name}}</b></p>
                        <p><b>Category: {{$details->categories->name}}</b></p>
                        <p><b>Quantity: {{$details->quantity}}</b></p>
                        <p><b>Price: {{$details->cost}}</b></p>
                        <p><b>Decription: {{$details->description}}</b></p>
                        <p><b>Purchased Date: {{$details->created_at}}</b></p>

                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

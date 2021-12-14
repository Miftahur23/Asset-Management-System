@extends('master')  
    @section('dashboard')
           
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

                        <p><b>Name:{{$details->asset_name}}</b></p>
                        <p><b>Name:{{$details->categories_id}}</b></p>
                        <p><b>Name:{{$details->cost}}</b></p>
                        <p><b>Name:{{$details->description}}</b></p>

                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

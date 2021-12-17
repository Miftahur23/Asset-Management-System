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
                        <th>
                            <img style="border-radius: 8px;" width="70px;" height="70px;" src=" {{url('/uploads/products/'.$details->image)}}" alt="product">
                        </th>
                        
                        <p><b>Name: {{$details->fname}} {{$details->lname}}</b></p>
                        <p><b>Email: {{$details->email}}</b></p>
                        <p><b>Department: {{$details->departments_id}}</b></p>
                        <p><b>Branch: {{$details->branches_id}}</b></p>
                        <p><b>Address: {{$details->address}}</b></p>
                        <p><b>Mobile No: {{$details->pnumber}}</b></p>
                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

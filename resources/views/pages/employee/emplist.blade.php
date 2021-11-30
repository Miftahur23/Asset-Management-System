@extends('master')  
    @section('emplist')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Empoyeelist</h2> 
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
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Mobile No</th>
                                  </tr>
                                </thead>
                                <tbody>
                            
                                  @foreach ($data as $key=>$item)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->fname}}</td>
                                    <td>{{$item->lname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->departments->dname}}</td>
                                    <td>{{$item->branches->name}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->pnumber}}</td>
                                    
                                  </tr>
                                @endforeach 
                            </tbody>
                          </table></div>



                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

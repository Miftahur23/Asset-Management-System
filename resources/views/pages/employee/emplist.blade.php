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
                                <div class="page-title-actions"> 
                                    <a href="{{route('AssetCreated')}}" type="button" class="btn btn-success">
                                        + Create Asset
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

                        <table class="table table-dark ">
                            <thead>
                                <tr>
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
                            
                                  @foreach ($data as $item)
                                  <tr>
                                    
                                    <td>{{$item->fname}}</td>
                                    <td>{{$item->lname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->deptarment}}</td>
                                    <td>{{$item->branch}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->pnumber}}</td>
                                    
                                  </tr>
                                @endforeach 
                            </tbody>
                          </table>



                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

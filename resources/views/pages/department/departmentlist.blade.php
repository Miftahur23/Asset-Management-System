@extends('master')  
    @section('dashboard')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>DepartmentList</h2> 
                                </div>
                                <div class="page-title-actions"> 
                                    <a href="{{route('create.department')}}" type="button" class="btn btn-success">
                                        + Add Department
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

                        <div class="container" style="width: 40%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Department Name</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($dept as $key=>$item)
                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->dname}}</td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                        </table> </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    

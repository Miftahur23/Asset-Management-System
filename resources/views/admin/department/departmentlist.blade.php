@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">

                        <form action="{{route('show.department')}}" method="GET">
                            <div class="row" style="margin-left: 700px">
                                
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                                <div class="col">
                                    <input value="{{$key}}" type="text" placeholder="Search" name="search" class="form-control">
                                </div>
                                
                            </div>
                        </form>

                        @if($key)
                        <h4>
                            Your are searching for: {{$key}}. found: {{$departmens->count()}}
                        </h4>
                        @endif
                        
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Department List</h2> 
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

                        @if (session()->has('delete'))
                        <p class="alert alert-success">
                            {{session()->get('delete')}}
                        </p>
                            
                        @endif

                        <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Department Name</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($departments as $key=>$item)
                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->dname}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('edit.dept', $item->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('delete.dept', $item->id)}}">Delete</a>
                                </td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                        </table> </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    

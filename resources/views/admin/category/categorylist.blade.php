@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">

                            <form action="#" method="GET" >

                                <div class="row" style="margin-left: 700px">
                            
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                    <div class="col">
                                        <input value="" type="text" placeholder="Search" name="search" class="form-control">
                                    </div>
                                    
                                </div>
                            
                            </form>

                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Category List</h2> 
                                </div>
                                <div class="page-title-actions"> 
                                    <a href="{{route('create.category')}}" type="button" class="btn btn-success">
                                        + Add Category
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

                         @if(session()->has('delete'))
                            <p class="alert alert-danger">
                                {{session()->get('delete')}}
                            </p>
                         @endif

                        <div class="container" style="width: 100%">
                            <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($categories as $key=>$item)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->details}}</td>
                                <td>

                                    <a class="btn btn-warning" href="{{route('edit.category', $item->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('delete.category', $item->id)}}">Delete</a>
                                </td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                        </table></div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

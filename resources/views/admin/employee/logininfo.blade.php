@extends('master')  
    @section('content')
        
   {{-- @dd($data) --}}
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Employee Login Info</h2> 
                                </div> 
                                
                                </div>
                                    <a class="btn btn-md btn-success mt-3" role="button" href={{route('Empreg')}} >Register</a>
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
                        <p class="alert alert-success">
                            {{session()->get('delete')}}
                        </p>
                    @endif


                    <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                    

                                  </tr>
                                </thead>
                                <tbody>

                                    
                            
                                  @foreach ($data as $key=>$item)
                                  

                                  <tr>

                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('details.emp', $item->id)}}">Details</a>
                                        <a class="btn btn-warning" href="{{route('edit.emp',$item->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('delete.emp', $item->id)}}">Delete</a>
    
                                    </td>
                                    
                                  </tr>
                                @endforeach 
                            </tbody>
                          </table>
                    </div>  
                    </div>

                </div>
            </div>
        </div>
    @endsection

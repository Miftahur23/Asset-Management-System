@extends('master')  
@section('content')

<form action="{{route('show.branch')}}" method="GET">
    <div class="row" style="margin-left: 700px">
        
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
        <div class="col">
            <input value="{{$key}}" type="text" placeholder="Search" name="search" class="form-control">
        </div>
        
    </div>
</form>


@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif

@if (session()->has('edited'))
<p class="alert alert-success">
 {{session()->get('edited')}}
</p>
@endif

@if (session()->has('delete'))
<p class="alert alert-success">
 {{session()->get('delete')}}
</p>
 
@endif
           
<div class="card mt-3">
    <div class="container m-3">
            <h2>Branch List</h2> 
    </div>
</div>

<div class="container m-2">
    @if($key)
            <h5>
                    Your are searching for: "{{$key}}" <br>
                    found: {{$branches->count()}}
            </h5>
    @endif
</div>
             

<div class="card mt-4">
    <div class="container">
            <div class="page-title-actions"> 
                <a href="{{route('create.branch')}}" type="button" class="btn btn-success mt-2">
                        + Add Branch
                </a>
            </div>
                    
                        <br>
                        
                         
                        <div class="container" style="width: 100%">
                            <table class="table table-dark table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Action</th>
                                
                                    </tr>
                                </thead>

                                <tbody>
                        
                                    @foreach ($branches as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->location}}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{route('edit.branch',$item->id)}}">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{route('delete.branch', $item->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>

    </div>
</div>
@endsection

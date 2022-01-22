@extends('master')  
    @section('content')
        
   {{-- @dd($data) --}}

<form action="{{route('show.emplist')}}" style="margin-left: 700px" method="GET">
    <div class="row" >
        
        <div class="col-md-4 ">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
        <div class="col">
            <input value="{{$key}}" type="text" placeholder="Search" name="search" class="form-control">
        </div>
        
    </div>
</form>
           
<div class="card mt-3">
    <div class="container m-3">
        <h2>Employee List</h2> 
    </div>
</div> 
<div class="container m-2">
    @if($key)
            <h5>
                    Your are searching for: "{{$key}}" <br>
                    found: {{$data->count()}}
            </h5>
    @endif
</div>
                                
<div class="card mt-4">
    <div class="container ">
                    <a class="btn btn-success mt-3" role="button" href={{route('Empreg')}} >Register</a>
                                           
                        {{-- table  --}}

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
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>

                                  </tr>
                                </thead>
                                <tbody>

                                    
                            
                                  @foreach ($data as $key=>$item)
                                  
                                  <tr>

                                    <td>{{$key+1}}</td>

                                    <th>
                                        <img style="border-radius: 8px;" width="70px;" height="70px;" src=" {{url('/uploads/employee/'.$item->employee_image)}}" alt="product">
                                    </th>

                                    <td>{{$item->users->name}} {{$item->lname}}</td>
                                    <td>{{$item->departments->dname}}</td>
                                    <td>{{$item->branches->name}}</td>
                                    <td>{{$item->users->email}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{route('details.emp', $item->id)}}">Details</a>
                                        <a class="btn btn-warning btn-sm" href="{{route('edit.emp',$item->id)}}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{route('delete.emp', $item->id)}}">Delete</a>
    
                                    </td>
                                    
                                  </tr>
                                @endforeach 
                            </tbody>
                          </table>
                    </div>  
                    

                
        </div>
    </div>
    @endsection

@extends('master')  
@section('content')


 

                    <form action="{{route('show.asset')}}" style="margin-left: 700px" method="GET">
                        <div class="row" >
                            
                            <div class="col-md-4 ">
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

                    @if(session()->has('delete'))

                    <p class="alert alert-success">
                        {{session()->get('delete')}}
                    </p>
                    
                    @endif


            <h1>Asset List</h1> 
    

                <div class="container m-2">
                        @if($key)
                                <h5>
                                        Your are searching for: "{{$key}}" <br>
                                        found: {{$assets->count()}}
                                </h5>
                        @endif
                </div>

<div class="card mt-4">
    <div class="container">

                        @if(auth()->user()->role=='admin')
                                <div class="page-title-actions"> 
                                    <a href="{{route('AssetCreated')}}" type="button" class="btn btn-success mt-3">
                                        + Create Asset
                                    </a>
                                </div>  
                        @endif   
                                
                                <br>
                    
                    <div class="table-responsive-sm">
                        <table class="table table-dark table-bordered mt-2" style="text-align:center;">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Asset Image</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($assets as $key=>$item)
                              <tr>
                                {{-- @dd($data)->all(); --}}
                                <td>{{$key+1}}</td>

                                <th>
                                    <img style="border-radius: 8px;" width="70px;" height="70px;" src=" {{url('/uploads/products/'.$item->image)}}" alt="product">
                                </th>

                                
                                <td>{{$item->asset_name}}</td>
                                <td>{{$item->category}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('details.asset',$item->id)}}">Details</a>
                                    @if(auth()->user()->role=='user')
                                    <a class="btn btn-success btn-sm" href="{{route('create.request',$item->id)}}">Request</a>
                                    @endif
                                    
                                    @if(auth()->user()->role=='admin')
                                    <a class="btn btn-warning btn-sm" href="{{route('edit.asset',$item->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{route('delete.asset', $item->id)}}">Delete</a>
                                    @endif

                                </td>

                                
                              </tr>
                              @endforeach 
                            </tbody>
                          </table> 
                        
                        </div>
                        
                        {{$assets->links('pagination::bootstrap-4')}}       
                
    </div>
</div>
@endsection

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


            <h1>Assigned Asset List</h1> 
    
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
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($assets as $key=>$item)
                              <tr>
                 
                                <td>{{$key+1}}</td>

                                <th>
                                    <img style="border-radius: 8px;" width="70px;" height="70px;" src=" {{url('/uploads/products/'.$item->asset->image)}}" alt="product">
                                </th>

                                
                                <td>{{$item->asset->asset_name}}</td>
                                <td>{{$item->asset->category}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('show.assigned.details',$item->id)}}">Details</a>
                                    @if(auth()->user()->role=='user')
                                    <a class="btn btn-danger btn-sm" href="{{route('create.damagerequest',$item->id)}}">Damage</a>
                                    @endif

                                </td>

                                
                              </tr>
                              @endforeach 
                            </tbody>
                          </table> 
                        
                        </div>
                        
                    
                
    </div>
</div>
@endsection

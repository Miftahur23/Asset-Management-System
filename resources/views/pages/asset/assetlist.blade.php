@extends('master')  
 @section('assetlist')


        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">

                            <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <h2>Asset List</h2> 
                                     </div>
                                <div class="page-title-actions"> 
                                    <a href="{{route('AssetCreated')}}" type="button" class="btn btn-success">
                                        + Create Asset
                                    </a>

                                    <a href="{{route('AssetCreated')}}" type="button" class="btn btn-success">
                                        Request Asset
                                    </a>
                                
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
                                <th scope="col">Asset Image</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Asset ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Purchased Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Serial NO</th>
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($data as $key=>$item)
                              <tr>
                                {{-- @dd($data)->all(); --}}
                                <td>{{$key+1}}</td>

                                <th>
                                    <img style="border-radius: 8px;" width="150px;" src=" {{url('/uploads/products/'.$item->image)}}" alt="product">
                                </th>

                                
                                <td>{{$item->asset_name}}</td>
                                <td>{{$item->asset_id}}</td>
                                <td>{{$item->categories->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->cost}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->serial_no}}</td>
                                
                                
                              </tr>
                              @endforeach 
                            </tbody>
                          </table> 
                        
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

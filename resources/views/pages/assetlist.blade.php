@extends('master')  
    @section('assetlist')
    @csrf
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>AssetList</h2> 
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

                        <table class="table table-dark ">
                            <thead>
                              <tr>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Asset ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Purchased Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Serial NO</th>
                                <th scope="col">Emp Name</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($data as $item)
                              <tr>
                                
                                <td>{{$item->asset_name}}</td>
                                <td>{{$item->asset_id}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->cost}}</td>
                                <td>{{$item->purchased_date}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->serial_no}}</td>
                                {{-- <td>{{$item->employee_infos->fname}}</td> --}}
                                
                              </tr>
                              @endforeach 
                            </tbody>
                          </table>



                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

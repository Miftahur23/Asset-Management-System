@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Purchases</h2> 
                                </div>   
                                
                                <div class="page-title-actions"> 
                                    <a href="{{route('create.purchase')}}" type="button" class="btn btn-success">
                                        + Purchase Extra Assets
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

                        <div class="container" style="width: 100%">
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                
                                <th scope="col">No</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($purchase as $key=>$item)
                              <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>{{$item->asset_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>

                                    @if($item->status!='Purchased')
                                        <form action="{{route('update.purchase',$item->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                        <button class="btn btn-success ml-3" name="status" value="Purchased" type='submit'>Purchase<a>
                                        
                                        </form>
                                    @endif

                                </td>

                                <td>
                                    @if($item->status!='Purchased')
                                    <h5>Pending</h5>
                                    @else
                                    <h5>Purchased</h5>
                                    @endif
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

    

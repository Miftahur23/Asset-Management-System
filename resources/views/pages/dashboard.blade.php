@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Dashboard</h2> 
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
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                        
                              @foreach ($data as $item)
                              <tr>
                                <th scope="row">3</th>
                                <td>{{$item->email}}</td>
                                <td>{{$item->password}}</td>
                                
                              </tr>
                              @endforeach 
                            </tbody>
                          </table>



                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

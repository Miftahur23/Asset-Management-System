@extends('master')  
@section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h1>Create Stock</h1> 
                                </div>       
                            </div>
                        </div>
                    </div>               
                    <div class="app-inner-layout app-inner-layout-page">
                      

                      

                      @if ($errors->any())
                      <div class="alert alert-warning" role="alert">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif



                      <center><form action="{{route('store.stock')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">

                        

                        @csrf

                        <div class="col-6 mt-5 ">
                          <select name="asset_id" class="form-control form-control">
                            <option>Select Asset</option>
                      
                            @foreach ($asset as $item)
                      
                            <option  value="{{$item->id}}">{{$item->asset_name}}</option>
                      
                            @endforeach
                      
                          </select>
                        </div>

                        <div class="col-6 mt-2 ">
                            <label for="exampleInputquantity" class="form-label"><h5>Quantity</h5></label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputquantity">
                        </div>

                        <div class="col-6 mt-2 ">
                            <label for="exampleInputstock" class="form-label"><h5>Location</h5></label>
                            <input type="text" name="location" class="form-control" id="exampleInputstock">
                        </div>
                        
                        
                        
                        <div class="  pt-2">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form></center>     

                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

 

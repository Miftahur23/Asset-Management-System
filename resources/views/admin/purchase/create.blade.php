@extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h1>Purchase Asset</h1> 
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



                      <center><form action="#" class="row ml-5 pl-5 mr-5 pr-5" method="POST">
                        
                        @csrf
                        
                        <div class="col-6 mt-5 ">
                            <label for="exampleInputName" class="form-label"><h5>Asset Name</h5></label>
                            <input type="text" value="" name="name" class="form-control" id="exampleInputName">
                        </div>

                        <div class="col-6 mt-5 ">
                            <label for="exampleInputQuantity" class="form-label"><h5>Quantity</h5></label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputQuantity">
                        </div>

                        <div class="col mt-3 mb-3 ">
                            <label for="exampleInputLocation" class="form-label"><h5>Location</h5></label>
                            <input type="text" value="" name="location" class="form-control" id="exampleInputLocation">
                        </div>
                        
                        <div class=" m-auto pt-2">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form></center>      
                        {{-- table  --}}
                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

 

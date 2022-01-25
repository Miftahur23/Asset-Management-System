@extends('master')  
@section('content')
        
@if ($errors->any())
<div class="alert alert-warning" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
           
<div class="container" style="text-align:center;">

      <h1>Create Stock</h1> 
      
</div>
                      

                      

                      

<div class="card mt-4">
  <div class="container">

                      <center>
                        <form action="{{route('store.stock')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">

                        

                        @csrf

                        <div class="col-6 mt-2 ">
                          <label for="exampleInputAsset" class="form-label"><h5>Asset Name</h5></label>
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

                        <div class="col-6 mt-2">
                            <label for="exampleInputstock" class="form-label"><h5>Location</h5></label>
                            <input type="text" name="location" class="form-control" id="exampleInputstock">
                        </div>
                        
                        
                        
                        <div class=" m-auto p-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                      </center>     

                        
                   
  </div>
</div>
@endsection

 

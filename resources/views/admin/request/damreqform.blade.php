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

      <h1>Request Damage</h1> 
        
    </div>             

    @if(session()->has('damage'))
    <p class="alert alert-success">
      {{session()->get('damage')}}
    </p>
    @endif                 

                      

<div class="card mt-4">
  <div class="container">

                      <center>
                        <form action="{{route('store.damagerequest',$damage->id)}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">
                        
                        @csrf
                        
                        <div class="col-6 mt-3 ">
                            <label for="exampleInputName" class="form-label"><h5>Asset Name</h5></label>
                            <input type="text" value="{{$damage->asset_name}}" name="name" class="form-control" id="exampleInputName">
                        </div>

                        <div class="col-6 mt-3 ">
                            <label for="exampleInputQuantity" class="form-label"><h5>Quantity</h5></label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputQuantity">
                        </div>

                        <div class="col-6 mt-3 ">
                          <label for="exampleInputReason" class="form-label"><h5>Reason</h5></label>
                          <input type="text" name="reason" class="form-control" id="exampleInputReason">
                      </div>
                        
                        <div class="m-auto p-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                      </center>    
                        
  </div>
</div>
@endsection

 

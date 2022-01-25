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
        <h1>Add New Branch</h1>
</div>
                      

                    




<div class="card mt-4">
    <div class="container">

<center><form action="{{route('store.branch')}}" class="row" method="POST">

  

  @csrf
  
  <div class="col-6 mt-5">
      <label for="exampleInputName" class="form-label"><h5>Branch Name</h5></label>
      <input type="name" name="name" class="form-control" id="exampleInputName">
      
  </div>

  <div class="col-6 mt-5">
      <label for="exampleInputLocation" class="form-label"><h5>Branch Location</h5></label>
      <input type="text" name="location" class="form-control" id="exampleInputLocation">
  </div>
  
  <div class="m-auto pt-3 mb-2">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </form></center>
                     
        
    </div>
</div>

      
  @endsection


  
  



  
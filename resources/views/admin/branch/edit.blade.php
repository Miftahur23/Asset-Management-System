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
      
<div class="card mt-3">
    <div class="container m-3">
        <h1>Edit Branch</h1> 
    </div>
</div>
 

                    




<div class="card mt-4">
    <div class="container">

<center><form action="{{route('edited.branch', $br->id)}}" class="row" method="POST">
@method('PATCH')
  

  @csrf
  
  <div class="col-6 mt-3">
      <label for="exampleInputName" class="form-label"><h5>Branch Name</h5></label>
      <input id="name"
      type="text"
      class="form-control"
      name="name"
      value="{{ old('name') ?? $br->name}}">   
    </div>

    <div class="col-6 mt-3">
      <label for="exampleInputLocation" class="form-label"><h5>Branch Location</h5></label>
      <input type="text" name="location" class="form-control" value="{{ old('location') ?? $br->location}}">
  </div>
  
  <div class="m-auto pt-3 mb-2">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </form></center>
                     
        
    </div>
</div>
@endsection



  
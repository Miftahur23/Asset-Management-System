@extends('master')  
  @section('content')
      
      <div class="app-main">
          <div class="app-main__outer">
              <div class="app-main__inner">
                  <div class="app-page-title">
                      <div class="container fiori-container">
                          <div class="page-title-wrapper">
                              <div class="page-title-heading">
                               <h1>Edit Branch</h1> 
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

<center><form action="{{route('edited.branch', $br->id)}}" class="row" method="POST">
@method('PATCH')
  

  @csrf
  
  <div class="col-6 mt-5">
      <label for="exampleInputName" class="form-label"><h5>Branch Name</h5></label>
      <input id="name"
      type="text"
      class="form-control"
      name="name"
      value="{{ old('name') ?? $br->name}}">   
    </div>

    <div class="col-6 mt-5">
      <label for="exampleInputLocation" class="form-label"><h5>Branch Location</h5></label>
      <input type="text" name="location" class="form-control" value="{{ old('location') ?? $br->location}}">
  </div>
  
  <div class="m-auto pt-5">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </form></center>
                     
        </div>
        </div>
        </div>
      </div>
  @endsection



  
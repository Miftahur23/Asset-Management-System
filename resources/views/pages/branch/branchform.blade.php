{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
  
  @extends('master')  
  @section('dashboard')
      
      <div class="app-main">
          <div class="app-main__outer">
              <div class="app-main__inner">
                  <div class="app-page-title">
                      <div class="container fiori-container">
                          <div class="page-title-wrapper">
                              <div class="page-title-heading">
                               <h1>Add New Branch</h1> 
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
  
  <div class="m-auto pt-5">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </form></center>
                     
        </div>
        </div>
        </div>
      </div>
  @endsection



  
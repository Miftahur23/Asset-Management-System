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
                               <h2>Add New Category</h2> 
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

<center><form action="{{route('store.category')}}" class="row" method="POST">

  

  @csrf
  
  <div class="col-6 mt-5">
      <label for="exampleInputName" class="form-label"><h5>Category Name</h5></label>
      <input type="name" name="name" class="form-control" id="exampleInputName">
      
    </div>
    <div class="col-6 mt-5">
      <label for="exampleInputCategory" class="form-label"><h5>Category Details</h5></label>
      <input type="text" name="details" class="form-control" id="exampleInputCategory">
  </div>
  
  <div class="m-auto pt-5">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </form></center>
                      {{-- table  --}}
                      {{-- @include('table.table') --}}

                      {{-- <table class="table table-dark ">
                          <thead>
                            <tr>
                              
                              <th scope="col">Email</th>
                              <th scope="col">Password</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                      
                            @foreach ($data as $item)
                            <tr>
                              
                              <td>{{$item->email}}</td>
                              <td>{{$item->password}}</td>
                              
                            </tr>
                            @endforeach 
                          </tbody>
                      </table> --}}
                  </div>
              </div>
          </div>
      </div>
  @endsection



  
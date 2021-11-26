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
                               <h2>Add New Branch</h2> 
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

<center><form action="{{route('store.branch')}}" method="POST">

  

  @csrf
  
  <div class="col-3 mt-5">
      <label for="exampleInputName" class="form-label"><h3>Branch Name</h3></label>
      <input type="name" name="name" class="form-control" id="exampleInputName">
      
    </div>
    <div class="col-3">
      <label for="exampleInputLocation" class="form-label"><h3>Branch Location</h3></label>
      <input type="text" name="location" class="form-control" id="exampleInputLocation">
  </div>
  
  <div class="pt-2">
    <button type="submit" class="btn btn-light">Submit</button>
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



  
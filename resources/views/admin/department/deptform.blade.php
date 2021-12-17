{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
  @extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h1>Add New Department</h1> 
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



                      <center><form action="{{route('store.department')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">

                        @csrf
                        
                        <div class="col-12 mt-5 ">
                            <label for="exampleInputName" class="form-label"><h5>Department Name</h5></label>
                            <input type="text" name="dname" class="form-control" id="exampleInputName">
                        </div>
                        
                        <div class=" m-auto pt-2">
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

 

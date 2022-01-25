@extends('master')  
@section('content')
    
<div class="container" style="text-align:center;">

                             <h1>Employee Register</h1> 
</div>
                    

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
  <div class="container p-5">
          <form action="{{route('Empregdone')}}" method="POST" class="row  m-auto" enctype="multipart/form-data">
                      @csrf
  
                      <div class="col-6 mt-1">
      
                            <label for="inputFirstname" class="form-label"><h6>First Name</h6></label>
                            <input name="fname" type="name" class="form-control" id="inputFirstname">
                      </div>
                      <div class="col-6 mt-1">
                            <label for="inputLastname" class="form-label"><h6>Last Name</h6></label>
                            <input name="lname" type="lastname" class="form-control" id="inputLastname">
                      </div>
                      <div class="col-12 mt-3">
                            <label for="inputEmail" class="form-label"><h6>Email</h6></label>
                            <input name="email" type="email" class="form-control" id="inputEmail">
                      </div>
                      <div class="col-6 mt-3">
                            <label for="inputPassword" class="form-label"><h6>Password</h6></label>
                            <input name="password" type="password" class="form-control" id="inputPassword">
                      </div>
                      <div class="col-6 mt-3">
                            <label for="inputPassword1" class="form-label"><h6>Confirm Password</h6></label>
                            <input name="password1" type="password" class="form-control" id="inputPassword1">
                      </div>
                      <div class="col-6 mt-3">
                        <label for="inputDepartment" class="form-label"><h6>Department</h6></label>
                            <select name="departments_id" class="form-control form-control">
                                      <option>Select Department</option>

                                        @foreach ($departments as $item)
                                        <option  value="{{$item->id}}">{{$item->dname}}</option>
                                        @endforeach
                            </select>
                      </div>
  
                      <div class="col-6 mt-3">
                        <label for="inputBranch" class="form-label"><h6>Department</h6></label>
                            <select name="branches_id" class="form-control form-control">
                                      <option>Select Branch</option>

                                        @foreach ($branches as $item)
                                        <option  value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach

                            </select>
                      </div>
                      <div class="col-6 mt-3">
                                <label for="inputAddress" class="form-label"><h6>Address</h6></label>
                                <input name="address" type="text" class="form-control" id="inputAddress">
                      </div>
                      <div class="col-6 mt-3">
                                <label for="inputMobilenNo" class="form-label"><h6>Mobile No</h6></label>
                                <input name="pnumber" type="number" class="form-control" id="inputMobileNo">
                      </div>
    

                      <div class="col-12 mt-4 mb-2">
                                <label for="inputImage"><h6>Select Employee Image</h6></label>
                                <input type="file" name='employee_image' class="form-control-file" id="inputImage">
                      </div>


    
                      <div class="mr-5 mt-3 ">
                              <button type="submit" class="btn btn-success">Register</button>
                      </div> 
  
 
          </form>
  </div>
</div>
@endsection

@extends('master')  
@section('content')
    
<div class="app-main">
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="container fiori-container">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                             <h1>Employee Register</h1> 
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
    

    <div class="col-12 mt-4 mb-2">
      <label for="inputImage"><h6>Select Employee Image</h6></label>
      <input type="file" name='employee_image' class="form-control-file" id="inputImage">
    </div>


    
    <div class="mr-5 mt-3 ">
      <button type="submit" class="btn btn-success">Register</button>
    
    
    <a href="{{route('Emplogin')}}"><button type="button" class="btn btn-success">Already Have An Account</button></a>
  </div> 
  
</div> 
</form>
</div>
</div>
</div>
</div>
@endsection

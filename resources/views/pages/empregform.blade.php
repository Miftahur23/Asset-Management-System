
<link href="/css/bootstrap.min.css" rel="stylesheet">

<form class="row col-5 m-auto">
<form action="{{route('Empreg')}}" method="POST">

    <div class="col-6 mt-5">
        <label for="inputFirstname" class="form-label"><h6>First Name</h6></label>
        <input type="name" class="form-control" id="inputFirstname">
      </div>
      <div class="col-6 mt-5">
        <label for="inputLastname" class="form-label"><h6>Last Name</h6></label>
        <input type="lastname" class="form-control" id="inputLastname">
      </div>
    <div class="col-12 mt-3">
      <label for="inputEmail4" class="form-label"><h6>Email</h6></label>
      <input type="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-6 mt-3">
      <label for="inputPassword4" class="form-label"><h6>Password</h6></label>
      <input type="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-6 mt-3">
        <label for="inputPassword4" class="form-label"><h6>Confirm Password</h6></label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      <div class="col-6 mt-3">
        <label for="inputDepartment" class="form-label"><h6>Department</h6></label>
        <input type="text" class="form-control" id="inputDepartment" >
      </div>
    <div class="col-6 mt-3">
      <label for="inputBranch" class="form-label"><h6>Branch</h6></label>
      <input type="text" class="form-control" id="inputBranch" >
    </div>
    <div class="col-12 mt-3">
      <label for="inputAddress" class="form-label"><h6>Address</h6></label>
      <input type="text" class="form-control" id="inputAddress">
    </div>
    <div class="d-flex justify-content-center align-items-center ml-4 pl-5">
    <div class="col-3 mt-3 ">
      <button type="submit" class="btn btn-success">Register</button>
    </div> 
    <div class="col-12 mt-3 ">
    <a href="{{route('Emplogin')}}"><button type="button" class="btn btn-success">Already Have An Account</button></a>
  </div> </div>
  </form>
</div> 
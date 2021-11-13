<link href="/css/bootstrap.min.css" rel="stylesheet">


  <form action="{{route('Emplogindone')}}" class="row col-5 m-auto" method="POST">
    
  @csrf
  
    <div class="col-12">
      <label for="exampleInputEmployeeName" class="form-label"><h5>Employee Name</h5></label>
      <input name="name" class="form-control" id="exampleInputEmployeeName" >
    </div>
    <div class="col-12">
      <label for="exampleInputEmail1" class="form-label"><h5>Email Address</h5></label>
      <input name="email" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="col-12">
      <label for="exampleInputPassword1" class="form-label"><h5>Password</h5></label>
      <input name="password" class="form-control" id="exampleInputPassword">
    </div>
    
  </div>
  </div>
  <div class="col-12 mt-3">
    <button type="submit" class="btn btn-light">Submit</button>
    
  </div>
  </form>
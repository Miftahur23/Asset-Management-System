<link href="css/bootstrap.min.css" rel="stylesheet">
{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
 
<center><form action="{{route('Adminlogindone')}}" method="POST">

  @csrf
  
  <div class="pt-5">
    <div class="mt-5">
    <div class="col-3 mt-5 pt-5 ">
      <label for="exampleInputEmail1" class="form-label"><h3>Email Address</h3></label>
      <input name="email" class="form-control" id="exampleInputEmail1">
      
    </div>
    <div class="col-3">
      <label for="exampleInputPassword1" class="form-label"><h3>Password</h3></label>
      <input name="password" class="form-control" id="exampleInputPassword1">
    </div>
  </div>
  </div>
  <div class="pt-2">
    <button type="submit" class="btn btn-light">Submit</button>
  </div>
  </form></center>
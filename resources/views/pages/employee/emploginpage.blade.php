{{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="/css/form/form.css" rel="stylesheet">
@if ($errors->any())
<div class="alert alert-warning" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul> 
</div>
@endif

  {{-- <form action="{{route('Emplogindone')}}" class="row col-5 m-auto" method="POST">  
  @csrf
  
    <div class="col-12 mt-5 pt-5">
      <label for="exampleInputEmployeeName" class="form-label"><h5>Employee Name</h5></label>
      <input name="name" class="form-control" id="exampleInputEmployeeName" >
    </div>
    <div class="col-12">
      <label for="exampleInputEmail1" class="form-label"><h5>Email Address</h5></label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="col-12">
      <label for="exampleInputPassword1" class="form-label"><h5>Password</h5></label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword">
    </div>
    
  </div>
  </div>
  <div class="col-12 mt-3">
    <button type="submit" class="btn btn-light">Submit</button>
    
  </div>
  </form> --}}

  <form class="box" action="{{route('Emplogindone')}}" method="post">

    @csrf
    <h1>Login</h1>
    <input type="text" name="name" placeholder="Username">
    <input type="text" name="email" placeholder="Useremail">
    <input type="password" name="password" placeholder="Password">
    <input type="submit"  value="Login">
  </form>
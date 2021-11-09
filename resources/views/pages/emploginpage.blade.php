@extends('pages.loginpage')
@section('content')
            <form>
                  <div class="form-group">
                     <label>Employee Name</label>
                     <input type="text" class="form-control" placeholder=" ">
                  </div>
                  <div class="form-group">
                     <label>Employee Password</label>
                     <input type="password" class="form-control" placeholder=" ">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <button type="submit" class="btn btn-secondary">Register</button>
            </form>
            
@endsection
@extends('pages.loginpage')
@section('content')
            <form>
                  <div class="form-group">
                     <label>Admin Name</label>
                     <input type="text" class="form-control" placeholder=" ">
                  </div>
                  <div class="form-group">
                     <label>Admin Password</label>
                     <input type="password" class="form-control" placeholder=" ">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <button type="submit" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
@endsection
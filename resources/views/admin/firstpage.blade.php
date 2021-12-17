<!doctype html>
<html lang="en">

<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet"></head>
<body>


    @if(session()->has('logoutmessage'))
    <p class="alert alert-success">
        {{session()->get('logoutmessage')}}
    </p>
    @endif
    {{-- header --}}

    {{-- @include('fixed.header') --}}
<div class="p-5 m-5 bg-dark">

          {{-- <div class="top-bar-middle">
              <h1>Offix</h1>
          </div> --}}
          
        <div class="top-bar col-md-12 text-center">
            

            

                      {{-- <a href="{{route('Signup')}}" class="nav-link">
                          Create Account
                      </a> --}}

                    {{-- <div class="btn-group ">
                        <button type="button " class="btn btn-lg btn-success dropdown-toggle mt-3" data-toggle="dropdown" aria-expanded="false">

                        Login

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start">

                        <li><a class="dropdown-item" href="{{route('loginpage')}}">Admin</a></li>
                        <li><a class="dropdown-item" href="{{route('usersignup')}}">Sign Up As Admin</a></li>

                        </ul>
                    </div> --}}

                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          Login/Signup
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('adminloginpage')}}">Admin Login</a></li>
                          <li><a class="dropdown-item" href="{{route('userloginpage')}}">Employee Login</a></li>
                          <li><a class="dropdown-item" href="{{route('usersignup')}}">Signup</a></li>
                        </ul>
                    </div>
        </div>

<p class="p-5 m-5 bg-white text-center text-success font-weight-bold mt-5 pt-5 display-1">Manage Your Assets</p>
    {{-- content --}}

    @yield('content')
<script  src="/js/bootstrap.js"></script>

</body>
</html>

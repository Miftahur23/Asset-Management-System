
<!doctype html>
<html lang="en">

<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
    {{-- header --}}

    {{-- @include('fixed.header') --}}
<div class="p-5 m-5 bg-dark">
    <div class="container fiori-container ">
          
          {{-- <div class="top-bar-middle">
              <h1>Offix</h1>
          </div> --}}
          
        <div class="top-bar col-md-12 text-center">

                      {{-- <a href="{{route('Signup')}}" class="nav-link">
                          Create Account
                      </a> --}}

                    <div class="btn-group ">
                        <button type="button " class="btn btn-lg btn-success dropdown-toggle mt-3" data-toggle="dropdown" aria-expanded="false">

                        Login

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start">

                        <li><a class="dropdown-item" href="{{route('Adminlogin')}}">Admin</a></li>
                        <li><a class="dropdown-item" href="{{route('Emplogin')}}">Employee</a></li>

                        </ul>
                      
                    </div>
                        <a class="btn btn-lg btn-success mt-3" role="button" href={{route('Empreg')}} >Register</a>
                    </div>
                    
    </div>

    
</div>
<p class="p-5 m-5 bg-dark text-center text-success font-weight-bold mt-5 pt-5 display-1">Manage Your Assets</p>
    {{-- content --}}

    @yield('content')

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>
</html>

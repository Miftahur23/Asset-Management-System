
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Helpdesk - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-white">

    {{-- header --}}

    {{-- @include('fixed.header') --}}
    <div class="app-top-bar bg-plum-plate top-bar-text-light">
      <div class="container fiori-container">
          
          {{-- <div class="top-bar-middle">
              <h1>Offix</h1>
          </div> --}}
          <div class="top-bar-right">

                      
                      {{-- <a href="{{route('Signup')}}" class="nav-link">
                          Create Account
                      </a> --}}
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Login
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                        <li><a class="dropdown-item" href="{{route('Adminlogin')}}">Admin</a></li>
                        <li><a class="dropdown-item" href="{{route('Emplogin')}}">Employee</a></li>
                      </ul>
                      
                </div>
                <a class="btn btn-success" role="button" href={{route('Empreg')}} >Register</a>
              
                  
                  
              
          </div>
      </div>
  </div>

    {{-- content --}}

    @yield('content')
            
       

    
        

        
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/js/bootstrap.min.js"></script></body>
</html>

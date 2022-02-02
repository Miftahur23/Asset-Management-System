
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <!-- Navbar Brand-->
    @if(auth()->user()->role=='admin')
    <a class="navbar-brand ps-3" href="{{route('profile')}}">Admin</a>

    @else

    <a class="navbar-brand ps-3" href="{{route('profile')}}">{{Auth::User()->name}}</a>

    @endif


    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->

    {{-- <form action="{{route('show.asset')}}" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET">
        <div class="input-group">
            <input value="{{$key}}" class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form> --}}
    
    <!-- Navbar-->
    <ul class="navbar-nav" style="margin-left:900px;">
        <li class="nav-item dropdown">


            @if (Auth::check())

            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->user()->role=='admin')
                <img style="height:45px; width:45px border: 2px solid red; border-radius: 25px;" src="/media/siam.jpg" alt="">
                @else
                <img style="height:45px; width:45px border: 2px solid red; border-radius: 25px;" src={{url('/uploads/employee/'.auth()->user()->employee_image)}}>
                @endif
            </a>

            
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('profile')}}">My Profile</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{route('logoutpage')}}">Logout</a></li>
            </ul>

            @endif
        </li>
    </ul>
</nav>
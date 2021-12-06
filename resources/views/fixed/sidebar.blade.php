{{-- <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Manage Your Assets</h3>
        </div>

        <ul class="list-unstyled components">
            <li >
                <a href="{{url('/home')}}">Home</a>
                
                <a href="{{url('/dashboard')}}">Dashboard</a>
            
                <a href="#empSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Employees</a>
                <ul class="collapse list-unstyled" id="empSubmenu">
                    <li>
                        <a href="{{route('show.emplist')}}">Employee List</a>
                        <a href="{{route('show.emplogininfo')}}">Employee Login Info</a>
                    </li>
                </ul>

                <a href="#assetSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assets</a>
                <ul class="collapse list-unstyled" id="assetSubmenu">
                    <li>
                        <a href="{{route('show.asset')}}">Asset List</a>
                        <a href="{{route('show.category')}}">Asset Category</a>
                        <a href="{{route('show.asset.condition')}}">Asset Condition</a>
                    </li>
                </ul>

                <a href="{{route('show.branch')}}">
                    Branch
                </a>

                <a href="{{route('show.department')}}">
                    Department
                </a>

                <a href="{{route('show.reqlist')}}">
                    Requests
                </a>

                <a href="{{route('show.distribution')}}">
                    Distribution 
                </a>

                <a href="{{route('show.purchase')}}">
                    Purchase
                </a>

                <a href="#stockSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stocks</a>
                <ul class="collapse list-unstyled" id="stockSubmenu">
                    <li>
                        <a class="dropdown-item" href="{{route('show.active.stock')}}">Active Stock</a>
                        <a class="dropdown-item" href="{{route('show.damage.stock')}}">Damage Stock</a>
                    </li>
                </ul>

                <a href="{{route('show.report')}}">
                    Report
                </a>

                
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="input-group">
                    <input type="search" class="form-control rounded m-auto" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                    <button type="button" class="btn btn-primary mr-5 ">search</button>
                </div>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        

                            <div class="btn-group ">
                                            
                                            
                                @if (Auth::check())
                                <h6>{{Auth::User()->name}}</h6>
                                
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <img width="35" class="rounded" src="/media/siam.jpg" alt="">
                                </a> 
            
                                <a type="button" class="btn btn-success ml-4 rounded-pill " href="{{route('firstloginpage')}}">
                                            Logout 
                                </a> 
                                @else  
            
                                <a type="button" class="btn btn-success ml-4 rounded-pill " href="{{route('loginpage')}}">
                                    Login 
                                </a> 
            
                                @endif
                        
                            </div>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('home')
        @yield('dashboard')
        @yield('emplist')
        @yield('assetlist')
        @yield('reqlist')

    </div>
</div> --}}

{{-- sidebar --}}

<a class="nav-link" href="{{url('/home')}}">
    Home
</a>

<a class="nav-link" href="{{url('/dashboard')}}">
    Dashboard
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmp" aria-expanded="false" aria-controls="collapseEmp">
    Employee
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseEmp" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.emplist')}}">Employee List</a>
        <a class="nav-link" href="{{route('show.emplogininfo')}}">Employee Login Info</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAssets" aria-expanded="false" aria-controls="collapseAssets">
    Assets
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseAssets" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.asset')}}">Asset List</a>
        <a class="nav-link" href="{{route('show.category')}}">Asset Category</a>
        <a class="nav-link" href="{{route('show.asset.condition')}}">Asset Condition</a>
    </nav>
</div>

<a class="nav-link" href="{{route('show.branch')}}">
    Branch
</a>

<a class="nav-link" href="{{route('show.department')}}">
    Department
</a>

<a class="nav-link" href="{{route('show.reqlist')}}">
    Requests
</a>

<a class="nav-link" href="{{route('show.distribution')}}">
    Distribution 
</a>

<a class="nav-link" href="{{route('show.purchase')}}">
    Purchase
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStocks" aria-expanded="false" aria-controls="collapseStocks">
    Stocks
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseStocks" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.active.stock')}}">Active Stock</a>
        <a class="nav-link" href="{{route('show.damage.stock')}}">Damage Stock</a>
    </nav>
</div>


<a class="nav-link" href="{{route('show.report')}}">
    Report
</a>




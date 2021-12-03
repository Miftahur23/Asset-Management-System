<div class="wrapper">
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

                <a href="{{route('show.request')}}">
                    Requests
                </a>

                <a href="{{route('show.distribution')}}">
                    Distribution 
                </a>

                <a href="{{route('show.designation')}}">
                    Designation
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

    </div>
</div>
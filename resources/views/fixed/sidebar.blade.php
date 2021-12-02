
    <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="">
    <div class="custom-menu">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    </button>
    </div>

    <div class="p-4 pt-5">
    <h4>Manage Your Assets</h4>

    <ul class="list-unstyled components mb-5">

        <li>
            <a href="{{url('/home')}}" class="nav-link">
                Home
            </a>
            <a href="{{url('/dashboard')}}" class="nav-link">
                Dashboard
            </a>
    
            <a href="#empSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Employee</a>
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

    
        <a href="{{route('show.branch')}}" class="nav-link">
            Branch
        </a>

        <a href="{{route('show.department')}}" class="nav-link">
            Department
        </a>

        <a href="{{route('show.request')}}" class="nav-link">
            Requests
        </a>

        <a href="{{route('show.distribution')}}" class="nav-link">
            Distribution 
        </a>

        <a href="{{route('show.designation')}}" class="nav-link">
            Designation
        </a>

        <a href="{{route('show.purchase')}}" class="nav-link">
            Purchase
        </a>

        <a href="{{route('show.report')}}" class="nav-link">
            Report
        </a>

    

    
    <a href="#stockSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stocks</a>
    <ul class="collapse list-unstyled" id="stockSubmenu">
    <li>
        <a class="dropdown-item" href="{{route('show.active.stock')}}">Active Stock</a>
        <a class="dropdown-item" href="{{route('show.damage.stock')}}">Damage Stock</a>
    </li>
    </ul>
    </li>
    </ul>
    </div>
    </nav>
    
    <div id="content" class="p-4 p-md-5 pt-5">
    
        @yield('home')
        @yield('dashboard')
        @yield('emplist')
        @yield('assetlist')
    </div>
    </div>
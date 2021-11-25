{{-- <link href="/css/bootstrap.min.css" rel="stylesheet"></head> --}}
<div class="app-top-bar bg-plum-plate top-bar-text-light">
    <div class="container fiori-container">
        <div class="top-bar-right">
            <ul class="nav">
                <div class="btn-group ">
                            <a type="button" class="btn btn-success " href="{{route('Firstpage')}}">
                                    Logout 
                            </a>   
                </div>
                </div>
                </div>
                </div>
                    <div class="app-header header-shadow">
                    <div class="container fiori-container">

                        <a href="{{url('/home')}}" class="nav-link">
                            Home
                        </a>

                        <a href="{{url('/dashboard')}}" class="nav-link">
                            Dashboard
                        </a>

                        <a href="{{route('show.branch')}}" class="nav-link">
                            Branch
                        </a>

                        <a href="{{route('show.department')}}" class="nav-link">
                            Department
                        </a>
                        
                        <div class="dropdown show">
                            <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              EmployeeInfo
                            </a>
            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="{{route('show.emplist')}}">Employee List</a>
                              <a class="dropdown-item" href="{{route('show.emplogininfo')}}">Employee Login Info</a>
                            </div>

                        </div>
                          
                        {{-- <a href="{{route('show.emplist')}}" class="nav-link">
                            Employeelist
                        </a> --}}
                        <a href="{{route('show.asset')}}" class="nav-link">
                            Assetlist
                        </a>

                        <a href=" " class="nav-link">
                            Orders
                        </a>

                        <a href=" " class="nav-link">
                            Stock
                        </a>

                <div class="app-header-right">
                <div class="search-wrapper">
                <input type="text" placeholder="Search...">
                </div>
                <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <img width="35" class="rounded" src="/media/siam.jpg" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </ul>        
        </div>
    </div>
</div>
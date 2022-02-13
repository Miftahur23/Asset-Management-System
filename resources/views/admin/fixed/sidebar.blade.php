{{-- sidebar --}}
@if(auth()->user()->role=='admin')


<a class="nav-link" href="{{route('admin.dashboard')}}">
    <i class="fas fa-chart-area m-1"></i>Dashboard
</a>
<a class="nav-link" href="{{route('show.emplist')}}">
    <i class="fas fa-users m-1"></i>Employees
</a>

<a class="nav-link" href="{{route('show.asset')}}">
    <i class="fas fa-cogs m-1"></i>Assets
</a>


@endif

@if(auth()->user()->role=='user')

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAssets" aria-expanded="false" aria-controls="collapseAssets">
    <i class="fas fa-tools m-1"></i>Assets
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseAssets" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.asset')}}">
            <i class="fas fa-cogs m-1"></i>Asset List</a>
        
        <a class="nav-link" href="{{route('assigned.asset')}}">
            <i class="fas fa-user-cog m-1"></i>Assigned Asset </a>
        
    </nav>
</div>
@endif

@if(auth()->user()->role=='admin')
<a class="nav-link" href="{{route('show.branch')}}">
    <i class="fas fa-building m-1"></i>Branch
</a>

<a class="nav-link" href="{{route('show.department')}}">
    <i class="fas fa-vector-square m-1"></i>Department
</a>
@endif


<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAssetsReq" aria-expanded="false" aria-controls="collapseAssetsReq">
    <i class="fas fa-exclamation-circle m-1"></i>Requests
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseAssetsReq" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.reqlist')}}">
            <i class="fas fa-cog m-1"></i>Asset Request</a>
        
        <a class="nav-link" href="{{route('show.damagereqlist')}}">
            <i class="fas fa-times m-1"></i>Damage Request</a>

       
        
    </nav>
</div>
@if(auth()->user()->role=='admin')
<a class="nav-link" href="{{route('show.distribution')}}">
    <i class="fas fa-sitemap m-1"></i>Distribution 
</a>

<a class="nav-link" href="{{route('show.purchase')}}">
    <i class="fas fa-search-dollar m-1"></i>Purchase
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStocks" aria-expanded="false" aria-controls="collapseStocks">
    <i class="fas fa-ethernet m-1"></i>Stocks
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseStocks" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.active.stock')}}">
            <i class="fas fa-check-square"></i>Active Stock</a>
        <a class="nav-link" href="{{route('show.damage.stock')}}">
            <i class="fas fa-times-circle"></i>Damage Stock</a>
    </nav>
</div>


<a class="nav-link" href="{{route('show.report')}}">
    <i class="far fa-chart-bar m-1"></i>Report
</a>

@endif




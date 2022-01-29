{{-- sidebar --}}
@if(auth()->user()->role=='admin')


<a class="nav-link" href="{{route('admin.dashboard')}}">
    Dashboard
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmp" aria-expanded="false" aria-controls="collapseEmp">
    Employee
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseEmp" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.emplist')}}">Employee List</a>
    </nav>
</div>

@endif

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAssets" aria-expanded="false" aria-controls="collapseAssets">
    Assets
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseAssets" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.asset')}}">Asset List</a>
        @if(auth()->user()->role=='user')
        <a class="nav-link" href="{{route('assigned.asset')}}">Assigned Asset </a>
        @endif
    </nav>
</div>
@if(auth()->user()->role=='admin')
<a class="nav-link" href="{{route('show.branch')}}">
    Branch
</a>

<a class="nav-link" href="{{route('show.department')}}">
    Department
</a>
@endif


<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAssetsReq" aria-expanded="false" aria-controls="collapseAssetsReq">
    Requests
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseAssetsReq" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('show.reqlist')}}">Asset Request</a>
        @if(auth()->user()->role=='admin')
        <a class="nav-link" href="{{route('show.damagereqlist')}}">Damage Request</a>
        @endif
    </nav>
</div>
@if(auth()->user()->role=='admin')
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

@endif




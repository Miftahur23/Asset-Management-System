<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="/css/datatable.css" rel="stylesheet" />
        <link href="/css/bootstrap.min.css" rel="stylesheet" />
        <script src="/js/fontawsome.js"></script>
    </head>


    <body class="sb-nav-fixed">

        {{-- navbar --}}
        @include('employee.fixed.navbar')


        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">

                        <div class="nav">

                            @include('employee.fixed.sidebar')
                            {{-- sidebar --}}

                        </div>
                    </div>


                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <h6>{{Auth::User()->name}}</h6>
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 pt-3">
                        <div class="card mb-4">
                            <div class="card-body">

                                {{-- contents --}}
                                
                                @yield('content')

                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>


        

        <script src="/js/bootstrap.js"></script>
        <script src="/js/bundle.js"></script>
        <script src="/js/datatable.js"></script>
        <script src="/js/demo-datatable.js"></script>
    </body>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</html>

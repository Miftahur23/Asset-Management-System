<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="/css/datatable.css" rel="stylesheet" />
        <link href="/css/bootstrap.min.css" rel="stylesheet" />
        <title>Manage Assets</title>
        <script src="/js/fontawsome.js"></script>
    </head>

    
    
    <body class="sb-nav-fixed" style="background: aliceblue;">

        {{-- navbar --}}
        @include('admin.fixed.navbar')


        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">

                        <div class="nav">

                            @include('admin.fixed.sidebar')
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

                    @if(session()->has('loginmessage'))
                        <p class="alert alert-success">
                            {{session()->get('loginmessage')}}
                        </p>
                    @endif
                    
                    <div class="container-fluid px-4 pt-3">
                                {{-- contents --}}
                                @yield('content')
                    </div>
                </main>


                @include('admin.fixed.footer')

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/bundle.js"></script>
    </body>
</html>

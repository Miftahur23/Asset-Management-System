
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-white">

    {{-- header --}}
    @include('fixed.header')

    {{-- content --}}

    @yield('home')
    @yield('dashboard')
    @yield('emplist')
    @yield('assetlist')
            
        

    <div class="ui-theme-settings">
         
        {{-- sidemenubutton --}}

        

        
    </div>
</div>

@include('fixed.footer')

<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/js/bootstrap.min.js"></script></body>
</html>

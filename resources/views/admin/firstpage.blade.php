<style>
    .siam{
        background-image: url('/media/home.jpg');
    }
</style>

<!doctype html>

<div class="siam"> 
<html lang="en">

   


<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    @if(session()->has('logoutmessage'))
    <p class="alert alert-success">
        {{session()->get('logoutmessage')}}
    </p>
    @endif
        

                    <div class="btn-group">
                        
                        
                    </div>
                    <br><br><br><br><br><br>
        

<div class="p-5 m-5 text-center font-weight-bold mt-5 pt-5" style="color:rgb(255, 255, 255);" >
    <h1><b>Manage Your Assets</b></h1>

    <br>

    <a type="button" href="{{route('loginpage')}}" class="btn btn-success text-center" aria-expanded="false">
        Login
    </a>
</div>
    



<br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>


</html>


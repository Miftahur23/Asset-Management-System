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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
    <a type="button" href="{{route('fb.login')}}" class="btn btn-primary text-center" aria-expanded="false">
        <i class="bi bi-facebook" style="font-size:24px"></i>
    </a>
    <a type="button" href="{{route('github.login')}}" class="btn btn-dark text-center" aria-expanded="false">
        <i class="bi bi-github" style="font-size:24px"></i>
    </a>
    
</div>
    



<br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>


</html>


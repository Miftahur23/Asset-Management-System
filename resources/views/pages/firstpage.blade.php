<!DOCTYPE html>

<html lang="en">
<head>
<style>
body {
  background-image: url('media/fpimg.jpg');
}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/firstpage.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>



<center> <h1><p>O f f i X</p></h1>



    <button type="button" class="btn btn-primary" <li><a href="{{url('/admin')}}">Admin</a></li></button>
    
    <button type="button" class="btn btn-primary" <li><a href="{{url('/employee')}}">Employee</a></li></button>
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Register <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{url('/admin')}}">Admin</a></li>
        <li><a href="{{url('/employee')}}">Employee</a></li>
      </ul>
    </div>
  </div>
</center>

</body>
</html>
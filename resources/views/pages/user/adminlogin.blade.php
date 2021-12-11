
  <link href="/css/form/form.css" rel="stylesheet">

  @if ($errors->any())

  <div class="alert alert-warning" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul> 
  </div>

  @endif
 


  <form class="box" action="{{route('loggedin')}}" method="POST">

    @csrf
    <h1>Admin Login</h1>
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="" value="Login">
  </form>
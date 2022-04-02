<link href="/css/form/form.css" rel="stylesheet">

                    @if(session()->has('invalid'))
                        <p class="alert alert-warning">
                            {{session()->get('invalid')}}
                        </p>
                    @endif

  @if ($errors->any())

  <div class="alert alert-warning" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul> 
  </div>

  @endif
 


  <form class="box" action="{{route('post.email')}}" method="post">

    @csrf
    <h1>Send Email</h1>
    <input type="text" name="email" placeholder="Email">
    <input type="submit" name="" value="Submit">
    
    

  </form>
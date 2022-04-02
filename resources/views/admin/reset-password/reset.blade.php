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
 


  <form class="box" action="{{route('reset.pass')}}" method="post">

    @csrf
    <input type="hidden" name="reset_token" value={{$coupon}}>
    <h1>Reset Password</h1>
    <input type="password" name="password" placeholder="New Password">
    <input type="password" name="password_confirmation" placeholder="Confirm New Password">
    <input type="submit" name="" value="Submit">
    

  </form>
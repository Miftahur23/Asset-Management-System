<link href="/css/bootstrap.min.css" rel="stylesheet">
{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
  @if ($errors->any())
  <div class="alert alert-warning" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul> 
  </div>
  @endif
 
<center><form action="{{route('store.branch')}}" method="POST">

  @csrf
  
  <div class="pt-5">
    <div class="mt-5">
    <div class="col-3 mt-5 pt-5 ">
      <label for="exampleInputName" class="form-label"><h3>Branch Name</h3></label>
      <input type="name" name="name" class="form-control" id="exampleInputName">
      
    </div>
    <div class="col-3">
      <label for="exampleInputLocation" class="form-label"><h3>Branch Location</h3></label>
      <input type="text" name="location" class="form-control" id="exampleInputLocation">
    </div>
  </div>
  </div>
  <div class="pt-2">
    <button type="submit" class="btn btn-light">Submit</button>
  </div>
  </form></center>
@extends('master')  
  @section('content')
        
  @if ($errors->any())
  <div class="alert alert-warning" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
           
  <div class="container" style="text-align:center;">
      <h1>Add New Department</h1>      
</div>
                        
                      
<div class="card mt-4">
  <div class="container">

                      <center>
                        <form action="{{route('store.department')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">

                        @csrf
                        
                        <div class="col-12 mt-3">
                            <label for="exampleInputName" class="form-label"><h5>Department Name</h5></label>
                            <input type="text" name="dname" class="form-control" id="exampleInputName">
                        </div>
                        
                        <div class=" m-auto pt-2 mb-2">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                      </center> 
                    
                
  </div>
</div>
@endsection

 

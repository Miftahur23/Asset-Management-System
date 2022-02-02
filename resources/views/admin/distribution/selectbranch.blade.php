{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
  @extends('master')  
    @section('content')
        
   
           
<div class="container" style="text-align:center;">
                                 <h1>Distribute Assets</h1> 
</div>       
                      

                      

                      @if ($errors->any())
                      <div class="alert alert-warning" role="alert">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      

                      <center><form action="{{route('create.distribution')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">
                        @csrf
                       
                        
                      <div class="col-6 mt-4 ">
                        <label for="exampleInputBranch" class="form-label"><h5>Select Branch</h5></label>
                        <select name="branches_id" class="form-control form-control">
                          <option>Select Branch</option>
                      
                          @foreach ($branches as $item)
                      
                          <option  value="{{$item->id}}">{{$item->name}}</option>
                      
                          @endforeach
                      
                        </select>
                      </div>

                      <div class="col-6 mt-4 ">
                        <label for="exampleInputDept" class="form-label"><h5>Select Department</h5></label>
                        <select name="departments_id" class="form-control form-control">
                          <option>Select Department</option>
                      
                          @foreach ($departments as $item)
                      
                          <option  value="{{$item->id}}">{{$item->dname}}</option>
                      
                          @endforeach
                      
                        </select>
                      </div>
                        
                        <div class="  pt-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form></center>     

                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

 

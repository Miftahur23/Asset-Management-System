@extends('master')  
@section('content')
    
<div class="card">
  <div class="container m-4">
      <h1>Update Employee Info</h1> 
    </div>
</div>

<div class="card mt-3">
  <div class="container m-2">
                    
                    <img style="border-radius: 8px;" width="200px;" height="200px;" src=" {{url('/uploads/employee/'.$edit->employee_image)}}" alt="employee">


                @if ($errors->any())
                        <div class="alert alert-warning" role="alert">
                            <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                  @endforeach
                              </ul> 
                        </div>
                @endif


          <form action="{{route('update.emp',$edit->id)}}" method="POST" class="row  m-auto" enctype="multipart/form-data">
  
                @method('PUT')
                @csrf
  
                    <div class="col-6 mt-1">
                          <label for="inputFirstname" class="form-label"><h6>First Name</h6></label>
                              <input name="fname" type="name" value={{$edit->fname}} class="form-control" id="inputFirstname">
                    </div>

                    <div class="col-6 mt-1">
                          <label for="inputLastname" class="form-label"><h6>Last Name</h6></label>
                              <input name="lname" type="lastname"  value={{$edit->lname}} class="form-control" id="inputLastname">
                    </div>

                    <div class="col-6 mt-5">
                            <select name="departments_id" class="form-control form-control">

                                    @foreach ($department as $item)

                                            <option  
                                                  @if($item->id==$edit->departments_id)
                                                        selected
                                                  @endif
                                                        value="{{$item->id}}">{{$item->dname}}
                                            </option>

                                    @endforeach

                            </select>
                    </div>
  
                    <div class="col-6 mt-5">
                            <select name="branches_id" class="form-control form-control">

                                    @foreach ($branch as $item)

                                            <option  
    
                                      @if($item->id==$edit->branches_id)
                                                            selected
                                      @endif
                                          value="{{$item->id}}">{{$item->name}}
                                            </option>

                                    @endforeach

                            </select>
                    </div>
                    
                    <div class="col-12 mt-3">
                            <label for="inputAddress" class="form-label"><h6>Address</h6></label>
                            <input name="address" type="text" value={{$edit->address}} class="form-control" id="inputAddress">
                    </div>

                    <div class="col-12 mt-3">
                            <label for="inputMobilenNo" class="form-label"><h6>Mobile No</h6></label>
                            <input name="pnumber" type="number" value={{$edit->pnumber}} class="form-control" id="inputMobileNo">
                    </div>
    

                    <div class="col-12 mt-4 mb-2">
                            <label for="inputImage"><h6>Select Employee Image</h6></label>
                            <input type="file" name='employee_image' class="form-control-file" id="inputImage">
                    </div>


    
                  <div class="mr-5 mt-3 ">
                        <button type="submit" class="btn btn-success">Submit</button>
                  </div> 
  
            </form>
  </div>
</div>

@endsection

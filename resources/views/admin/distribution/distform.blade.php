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

                      @if(session()->has('stock'))
                      <p class="alert alert-danger">
                          {{session()->get('stock')}}
                      </p>
                      @endif

                      <div class="card p-3 m-4">

                      <center><form action="{{route('store.distribution',$branch_id)}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">

                        {{-- {{route('store.distribution')}} --}}

                        @csrf

                        <div class="col-6 mt-2">
                          <label for="exampleInputemployee" class="form-label"><h5>Employee</h5></label>
                          <select name="employee_id" class="form-control form-control">
                            <option>Employee</option>
                      
                            @foreach ($employee as $item)
                      
                            <option  value="{{$item->user_id}}">{{$item->fname}} {{$item->lname}}</option>
                      
                            @endforeach
                      
                          </select>
                        </div>

                        <div class="col-6 mt-2">
                          <label for="exampleInputAssetname" class="form-label"><h5>Asset Name</h5></label>
                          <select name="stock_id" class="form-control form-control">
                            <option>Select Asset</option>
                      
                            @foreach ($stocks as $item)
                      
                            <option  value="{{$item->asset->id}}">{{$item->asset->asset_name}}</option>
                      
                            @endforeach
                      
                          </select>
                        </div>

                        <div class="col-6 mt-2 ">
                            <label for="exampleInputquantity" class="form-label"><h5>Quantity</h5></label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputquantity">
                        </div>
                        
                        <div class="col-6 mt-2">
                          <label for="exampleInputDepartment" class="form-label"><h5>Department</h5></label>
                          <select name="departments_id" class="form-control form-control">
                            <option>Select Department</option>
                      
                            @foreach ($departments as $item)
                      
                            <option  value="{{$item->id}}">{{$item->dname}}</option>
                      
                            @endforeach
                      
                          </select>
                        </div>
                        
                      
                        <div class="  pt-2 mt-4">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form></center> </div>    

                        
                    
    @endsection

 

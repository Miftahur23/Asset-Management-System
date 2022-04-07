@extends('master')  
@section('content')
    
@if(session()->has('success'))
<p class="alert alert-success">
  {{session()->get('success')}}
</p>
@endif

@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <ul>
              @foreach ($errors->all() as $error)
                  <li>
                      {{$error}}
                  </li>   
              @endforeach
        </ul>
    </div>
@endif
       
<div class="container" style="text-align:center;">
    <h1>Add New Assets</h1>
</div>        

<div class="card mt-4">
  <div class="container p-4">

                  <form action="{{route('Create.asset')}}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf
                      <div class="col-6 mt-3">
                          <label for="inputAssetname" class="form-label"><h5>Asset Name</h5></label>
                          <input name="asset_name" type="name" class="form-control" id="inputAssetname" >
                        </div>
                      
                    <div class="col-6 mt-3">
                      <h5>Category</h5>
                      <select name="category" class="form-control form-control-md" placeholder="Select Category">
                        <option> </option>
                        <option>Stationary</option>
                        <option>Furniture</option>
                        <option>Cyramics</option>
                        <option>Electronics</option>
                  
                        
                  
                      </select>
                    </div>
                  
                      
                      <div class="col-6 mt-3">
                          <label for="inputCost" class="form-label"><h5>Cost</h5></label>
                          <input name="cost" type="number" class="form-control" id="inputCost" >
                        </div>
                      
                      

                      <div class="form-group col-6 mt-3 mb-2"><h5>Select Asset Image</h5>
                        <label for="inputImage"></label>
                        <input type="file" name='product_image' class="form-control-file" id="inputImage">
                      </div>

                      <div class="col-12 mt-1">
                        <label for="inputDescription" class="form-label" ><h5>Description</h5></label>
                        <input name="description" type="text" class="form-control" style="height:100px" id="inputDescription" >
                      </div>

                      
                        
                      <div class="m-auto pt-5">
                      <button type="submit" class="btn btn-success">Create</button>
                    </div>  
                    
                  
                  </form>
  </div>
</div>
@endsection




@extends('master')  
@section('content')
    

       
<div class="card mb-3">
  <div class="container m-4">
                             <h1>Edit Your Asset</h1> 
  </div>
</div>

                    <img style="border-radius: 8px; " width="300px;" height="300px;" src=" {{url('/uploads/products/'.$edit->image)}}" alt="product">

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
<div class="card mt-3">
    <div class="container m-2">
                  <form action="{{route('edited.asset',$edit->id)}}" method="POST" class="row" enctype="multipart/form-data">

                    @method('PUT')
                    @csrf
                      <div class="col-6 mt-3">
                          <label for="inputAssetname" class="form-label"><h5>Asset Name</h5></label>
                          <input name="asset_name" value="{{$edit->asset_name}}" type="name" class="form-control" id="inputAssetname" >
                        </div>
                      
                  

                      {{-- relation --}}
                      
                    <div class="col-6 mt-4">

                      <h5>Category</h5>
                      <select name="category" class="form-control form-control-md">
                        <option>Select Category</option>
                        <option>Stationary</option>
                        <option>Furniture</option>
                        <option>Electronics</option>
                      </select>
                      </div>

                      <div class="col-6 mt-3">
                          <label for="inputCost" class="form-label"><h5>Cost</h5></label>
                          <input name="cost" type="number" class="form-control" id="inputCost" >
                        </div>

                      <div class="form-group col-6 mt-5">
                        <label for="inputImage"><h5>Select Asset Image</h5></label>
                        <input type="file" name='product_image' class="form-control-file" id="inputImage">
                      </div>

                      <div class="col-12 mt-1">
                        <label for="inputDescription" class="form-label" ><h5>Description</h5></label>
                        <input name="description" type="text" class="form-control" style="height:100px" id="inputDescription" >
                      </div>

                      
                        
                      <div class="m-auto pt-5">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>  
                  </form>
  </div>
</div>
@endsection



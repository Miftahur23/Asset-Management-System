
@extends('master')  
@section('content')
    

       
    <div class="app-main">
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="container fiori-container">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                             <h1>Edit Your Asset</h1> 
                            </div>
                        </div>
                    </div>
                </div>               
                <div class="app-inner-layout app-inner-layout-page">

                    <img style="border-radius: 8px;" width="500px;" height="500px;" src=" {{url('/uploads/products/'.$edit->image)}}" alt="product">

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

                  <form action="{{route('edited.asset',$edit->id)}}" method="POST" class="row" enctype="multipart/form-data">

                    @method('PUT')
                    @csrf
                      <div class="col-6 mt-3">
                          <label for="inputAssetname" class="form-label"><h5>Asset Name</h5></label>
                          <input name="asset_name" value="{{$edit->asset_name}}" type="name" class="form-control" id="inputAssetname" >
                        </div>
                        <div class="col-6 mt-3">
                          <label for="inputAssetid" class="form-label"><h5>Asset ID</h5></label>
                          <input name="asset_id" type="number" class="form-control" id="inputAssetid" >
                        </div>
                      
                  

                      {{-- relation --}}
                      
                    <div class="col-12 mt-3">
                      <select name="categoriesid" class="form-control form-control-md">

                        {{-- <option>Select Category</option> --}}
                  
                        @foreach ($category as $item)
                        <option  
                                @if($item->id==$edit->categories_id)

                                    selected

                                @endif

                                value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                  
                      </select>
                    </div>
                  
                      <div class="col-6 mt-3">
                        <label for="inputQuantity" class="form-label"><h5>Quantity</h5></label>
                        <input name="quantity" type="number" class="form-control" id="inputQuantity" >
                      </div>
                      <div class="col-6 mt-3">
                          <label for="inputCost" class="form-label"><h5>Cost</h5></label>
                          <input name="cost" type="number" class="form-control" id="inputCost" >
                        </div>
                      
                      <div class="col-6 mt-3">
                        <label for="inputSerialno" class="form-label"><h5>Serial No</h5></label>
                        <input name="serial_no" type="number" class="form-control" id="inputSerialno" >
                      </div>

                      <div class="form-group m-3">
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
                    
                  </div> 
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection



<link href="/css/bootstrap.min.css" rel="stylesheet">
{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
 
<center><form action="{{route('product.entry')}}" method="POST">

  @csrf
  
  <div class="pt-5">
    <div class="mt-5">
    <div class="col-3 mt-5 pt-5 ">
      <label for="InputEmail1" class="form-label"><h3>Product Name</h3></label>
      <input type="email" name="productName" class="form-control" id="InputProductName">
      
    </div>
    <div class="col-3">
      <label for="InputPrice" class="form-label"><h3>Price</h3></label>
      <input type="number" name="price" class="form-control" id="InputPrice">
    </div>
  </div>
  </div>
  <div class="pt-2">
    <button type="submit" class="btn btn-light">Submit</button>
  </div>
  </form></center>
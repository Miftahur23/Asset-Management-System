
<link href="/css/bootstrap.min.css" rel="stylesheet">


<form action="{{route('Create.asset')}}" method="POST" class="row col-5 m-auto">
  @csrf
    <div class="col-6 mt-5">
        <label for="inputAssetname" class="form-label"><h6>Asset Name</h6></label>
        <input name="asset_name" type="name" class="form-control" id="inputAssetname" required>
      </div>
      <div class="col-6 mt-5">
        <label for="inputAssetid" class="form-label"><h6>Asset ID</h6></label>
        <input name="asset_id" type="number" class="form-control" id="inputAssetid" required>
      </div>
    <div class="col-12 mt-3">
      <label for="inputCategory" class="form-label"><h6>Category</h6></label>
      <input name="category" type="text" class="form-control" id="inputCategory" required>
    </div>
    <div class="col-6 mt-3">
      <label for="inputQuantity" class="form-label"><h6>Quantity</h6></label>
      <input name="quantity" type="number" class="form-control" id="inputQuantity" required>
    </div>
    <div class="col-6 mt-3">
        <label for="inputCost" class="form-label"><h6>Cost</h6></label>
        <input name="cost" type="number" class="form-control" id="inputCost" required>
      </div>
      <div class="col-6 mt-3">
        <label for="inputDatepurchased" class="form-label"><h6>Purchased_Date</h6></label>
        <input name="purchased_date" type="Date" class="form-control" id="inputDatepurchased" required>
      </div>
    <div class="col-6 mt-3">
      <label for="inputDescription" class="form-label"><h6>Description</h6></label>
      <input name="description" type="text" class="form-control" id="inputDescription" required>
    </div>
    <div class="col-12 mt-3">
      <label for="inputSerialno" class="form-label"><h6>Serial No</h6></label>
      <input name="serial_no" type="number" class="form-control" id="inputSerialno" required>
    </div>
    <div class="d-flex justify-content-center align-items-center ml-4 pl-5">
    
      <div class="col-12  ml-1 pl-5 ">
    <div class="col-12 mt-3  ml-5 pl-5 ">
    <button type="submit" class="btn btn-success btn-lg">Create</button>
  </div> </div> </div>
  
</div> 
</form>

<link href="/css/bootstrap.min.css" rel="stylesheet">

<form class="row col-5 m-auto">
<form action="{{route('AssetCreated')}}" method="POST">

    <div class="col-6 mt-5">
        <label for="inputAssetname" class="form-label"><h6>Asset Name</h6></label>
        <input type="name" class="form-control" id="inputAssetname">
      </div>
      <div class="col-6 mt-5">
        <label for="inputAssetid" class="form-label"><h6>Asset ID</h6></label>
        <input type="id" class="form-control" id="inputAssetid">
      </div>
    <div class="col-12 mt-3">
      <label for="inputCategory" class="form-label"><h6>Category</h6></label>
      <input type="text" class="form-control" id="inputCategory">
    </div>
    <div class="col-6 mt-3">
      <label for="inputQuantity" class="form-label"><h6>Quantity</h6></label>
      <input type="number" class="form-control" id="inputQuantity">
    </div>
    <div class="col-6 mt-3">
        <label for="inputCost" class="form-label"><h6>Cost</h6></label>
        <input type="cost" class="form-control" id="inputCost">
      </div>
      <div class="col-6 mt-3">
        <label for="inputDatepurchased" class="form-label"><h6>Date Purchased</h6></label>
        <input type="Date" class="form-control" id="inputDatepurchased" >
      </div>
    <div class="col-6 mt-3">
      <label for="inputDescription" class="form-label"><h6>Description</h6></label>
      <input type="text" class="form-control" id="inputDescription" >
    </div>
    <div class="col-12 mt-3">
      <label for="inputSerialno" class="form-label"><h6>Serial No</h6></label>
      <input type="number" class="form-control" id="inputSerialno">
    </div>
    <div class="d-flex justify-content-center align-items-center ml-4 pl-5">
    
      <div class="col-12  ml-1 pl-5 ">
    <div class="col-12 mt-3  ml-5 pl-5 ">
    <a href="{{route('Homepage')}}"><button type="button" class="btn btn-success btn-lg">Create</button></a>
  </div> </div> </div>
  </form>
</div> 
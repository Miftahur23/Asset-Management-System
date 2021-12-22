{{-- <style>
  body {
    background-image: url('media/fpimg.jpg');
  }
  </style> --}}
  @extends('master')  
    @section('content')
        
   
           
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h1>Distribute Assets</h1> 
                                </div>       
                            </div>
                        </div>
                    </div>               
                    <div class="app-inner-layout app-inner-layout-page">
                      

                      

                      @if ($errors->any())
                      <div class="alert alert-warning" role="alert">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif



                      <center><form action="{{route('store.distribution')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">

                        {{-- {{route('store.distribution')}} --}}

                        @csrf

                        <div class="col-6 mt-5 ">
                            <label for="exampleInputName" class="form-label"><h5>Asset Name</h5></label>
                            <input type="text" name="asset_name" class="form-control" id="exampleInputName">
                        </div>

                        <div class="col-6 mt-5 ">
                            <label for="exampleInputquantity" class="form-label"><h5>Quantity</h5></label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputquantity">
                        </div>
                        
                        <div class="col-6 mt-5 ">
                            <label for="exampleInputdeptName" class="form-label"><h5>Department Name</h5></label>
                            <input type="text" name="dname" class="form-control" id="exampledeptName">
                        </div>

                        <div class="col-6 mt-5 ">
                            <label for="exampleInputbranchName" class="form-label"><h5>Branch Name</h5></label>
                            <input type="text" name="bname" class="form-control" id="examplebranchName">
                        </div>
                        
                        <div class="  pt-2">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form></center>     

                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

 

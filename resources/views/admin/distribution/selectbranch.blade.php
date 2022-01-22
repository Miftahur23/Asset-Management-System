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
                                 <h3>Distribute Assets</h3> 
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
                      

                      <center><form action="{{route('create.distribution')}}" class="row ml-5 pl-5 mr-5 pr-5" method="POST">
                        @csrf
                       
                        
                      <div class="col-12 mt-5 ">
                        <select name="branches_id" class="form-control form-control">
                          <option>Select Branch</option>
                      
                          @foreach ($branches as $item)
                      
                          <option  value="{{$item->id}}">{{$item->name}}</option>
                      
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

 

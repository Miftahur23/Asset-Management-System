@extends('master')  
    @section('content')
           
        
                     
                    
                <div id="AssetPrint">

                    <div class="card mt-3">
                        <div class="container m-3" style="display:flex;">
                        
                            <p>
                                <img style="border-radius: 8px;" width="300px;" height="300px;" src=" {{url('/uploads/products/'.$details->image)}}" alt="product">
                            </p>
                        
                            <div class="container" style="margin-left: 120px; margin-top: 60px; font-size:20px"  >
                            
                                <p><b>Name: {{$details->asset_name}}</b></p>
                                <p><b>Category: {{$details->category}}</b></p>
                                <p><b>Price: {{$details->cost}}</b></p>
                                <p><b>Decription: {{$details->description}}</b></p>
                                <p><b>Purchased Date: {{$details->created_at}}</b></p>

                            </div>
                        </div>

                </div>

                <button class="btn btn-primary m-3" type="submit" onClick="PrintDiv('AssetPrint');" value="Print">Print</button>

                    

                
        
    @endsection

    <script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>

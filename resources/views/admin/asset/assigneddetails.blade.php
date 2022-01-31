@extends('master')  
    @section('content')
           
                <div id="AssetPrint">

                    <div class="card mt-3">
                        <div class="container m-3" style="display:flex;">
                        
                            <p>
                                <img style="border-radius: 8px;" width="300px;" height="300px;" src=" {{url('/uploads/products/'.$assigned->asset->image)}}" alt="product">
                            </p>
                            <hr width="1" size="300">
                        
                            <div class="container" style="width:40%; margin-top: 60px;">
                            
                                <p><b>Name: {{$assigned->asset->asset_name}}</b></p><hr>
                                <p><b>Category: {{$assigned->asset->category}}</b></p><hr>
                                <p><b>Decription: {{$assigned->asset->description}}</b></p><hr>
                                @if(auth()->user()->role=='admin')
                                <p><b>Price: {{$assigned->asset->cost}}</b></p><hr>
                                @endif
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

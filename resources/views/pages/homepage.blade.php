@extends('master')  
    @section('content')

        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="container fiori-container">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                 <h2>Offix</h2> 
                                </div>
                                <div class="page-title-actions"> 
                                    <a href="{{route('AssetCreated')}}" type="button" class="btn btn-success">
                                        + Create Asset
                                    </a>
                                </div>        
                            </div>
                        </div>
                    </div>                
                <div class="app-inner-layout app-inner-layout-page">
            </div>
        </div>
  
        @endsection

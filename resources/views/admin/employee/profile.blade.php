@extends('master')  
    @section('content')

@if (Auth::user()->role=='admin')
{{Auth::user()->name}}
@else

<div class="card mt-3" style="display: flex; padding-bottom: 150px;">

    <div style="text-align:center;">
                <img style="border-radius: 8px; margin: 10px;" width="250px;" height="250px;" src=" {{url('/uploads/employee/'.$profile->employee_image)}}" alt="product">
    </div>
                <div class="container" style="width: 60%; margin-top:30px;">
                    <p><b>Name: {{$profile->fname}} {{$profile->lname}}</b></p> <hr>
                    <p><b>Email: {{$profile->email}}</b></p> <hr> 
                    <p><b>Department: {{$profile->departments->dname}}</b></p> <hr>
                    <p><b>Branch: {{$profile->branches->name}}</b></p> <hr>
                    <p><b>Address: {{$profile->address}}</b></p> <hr>
                    <p><b>Mobile No: {{$profile->pnumber}}</b></p> <hr>
                </div>  

              
</div>  

@endif
@endsection
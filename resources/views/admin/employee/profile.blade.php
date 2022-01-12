<h1>Profile</h1>





@if (Auth::user()->role=='admin')
{{Auth::user()->name}}
@else

<img style="border-radius: 8px;" width="70px;" height="70px;" src=" {{url('/uploads/employee/'.$profile->employee_image)}}" alt="product">

<p><b>Name: {{$profile->fname}} {{$profile->lname}}</b></p>
<p><b>Email: {{$profile->email}}</b></p>
<p><b>Department: {{$profile->departments->dname}}</b></p>
<p><b>Branch: {{$profile->branches->name}}</b></p>
<p><b>Address: {{$profile->address}}</b></p>
<p><b>Mobile No: {{$profile->pnumber}}</b></p>   
         
@endif
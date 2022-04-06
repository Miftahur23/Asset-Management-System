@extends('master')  
@section('content')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <form action="{{route('show.branch')}}" method="GET">
    <div class="row" style="margin-left: 700px">
        
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
        <div class="col">
            <input value="{{$key}}" type="text" placeholder="Search" name="search" class="form-control">
        </div>
        
    </div>
</form>


@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif

@if (session()->has('edited'))
<p class="alert alert-success">
 {{session()->get('edited')}}
</p>
@endif

@if (session()->has('delete'))
<p class="alert alert-success">
 {{session()->get('delete')}}
</p>
 
@endif
           

            <h1>Branch List</h1> 
   

<div class="container m-2">
    @if($key)
            <h5>
                    Your are searching for: "{{$key}}" <br>
                    found: {{$branches->count()}}
            </h5>
    @endif
</div>
             

<div class="card mt-4">
    <div class="container">
            <div class="page-title-actions"> 
                <a href="{{route('create.branch')}}" type="button" class="btn btn-success mt-2">
                        + Add Branch
                </a>
            </div>
                    
                        <br>
                        
                        {{-- {{$branches -> links()}} --}}
                        <div class="table-responsive-sm">
                            <table class="table table-dark table-bordered mt-2 yajra-datatable" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Action</th>
                                
                                    </tr>
                                </thead>

                                <tbody>
                        
                                    {{-- @foreach ($branches as $key=>$item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->location}}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{route('edit.branch',$item->id)}}">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{route('delete.branch', $item->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div> --}}
                        

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('yajra.branch') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'location', name: 'location'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
</tbody>
@endpush
</table>
</div>
</div>
@endsection

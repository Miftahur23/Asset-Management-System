<table class="table table-dark ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        
      </tr>
    </thead>
    <tbody>

      @foreach ($data as $item)
      <tr>
        <th scope="row">3</th>
        <td>{{$item->email}}</td>
        <td>{{$item->password}}</td>
        
      </tr>
      @endforeach 
    </tbody>
  </table>
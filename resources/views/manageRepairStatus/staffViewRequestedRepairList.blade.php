@extends('layouts.staffapp')
@section('content')
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
    <title>Staff View Requested Repair</title>
</head>
<body>

<h2>Staff View Requested Repair List</h2>
<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

<form action="{{ route('manageRepairStatus.search') }}" method="GET" role="search">          
  <input type="text" class="form-control mr-2" name="search" placeholder="Search Order ID" id="term">
  <button class="btn btn-info" type="submit" title="Search projects">Search</button>
</form>
<br>
<table style="width:10%">
<tr><td>
  <a href="{{ route('manageRepairStatus.index') }}" class=" mt-1">
    <button class="btn btn-danger" type="button" title="Refresh page">Refresh</button>
    
  </a></td>
  <td>
  <a href="{{ route('manageRepairRequest.index') }}" class=" mt-1">
    <button class="btn btn-success" type="button" title="Graph page">Graph</button>
    
  </a></td></tr>
</table>
<table style="width:100%">
  <thead>
  <tr>
  
    <th>Order ID</th> 
    <th>Customer Name</th>
    <th>Date</th>
    <th>Customer Confirmation Status</th>
    <th>Repair Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
        
        <td>{{ $row->OrderID }}</td>
        <td>{{ $row->Customer_Name }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->Confirmation_Status }}</td>
        <td>{{ $row->Order_Status }}</td>
        
        
        <td><button type="button" onclick="location.href='{{ route('manageRepairStatus.edit', $row->OrderID) }}'">View or Update</button>
        <form action="{{ route('manageRepairStatus.destroy', $row->OrderID)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button></form></td>
        

      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $data->links() }}
</table>

</body>
</html>
@endsection
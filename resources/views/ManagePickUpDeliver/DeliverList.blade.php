@extends('layouts.riderapp')
@section('content')
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
    <title></title>
</head>
<body>

<h2></h2>

<h2>Rider View Deliver</h2>
<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif
<form action="" method="get">
<table style="width:100%">
  <thead>
  <tr>
    <th>Order ID</th> 
    <th>Customer Name</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
      <td>{{ $row->OrderID }}</td>
        <td>{{ $row->Customer_ID}}</td>
        <td>{{ $row->Status}}</td>
        <td><button type="button" onclick="location.href='{{ route('ManagePickUpDeliver.riderDeliver', $row->PickUpDeliver_ID)}}'">View</button>
        @csrf</td>
      </tr>
      @endforeach
    </body>
  </table>
  
</table>

</body>
</html>
@endsection
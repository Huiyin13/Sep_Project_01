@extends('layouts.custapp')

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

<h2>Customer View PickUp</h2>
<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

<table style="width:100%">
  <thead>
  <tr>
    <th>Order ID</th> 
    <th>Customer ID</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
      <td>{{ $row->OrderID }}</td>
        <td>{{ $row->Customer_ID}}</td>
        <td>{{ $row->Order_Status}}</td>
        <td><button type="button" onclick="location.href='{{ route('ManagePickUpDeliver.cusViewDetail', $row->OrderID)}}'">View</button></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <button onclick="location.href='{{ route('ManagePickUpDeliver.custDeliverView',session()->get('key1')) }}'">View Delivery</button>

</body>
</html>
@endsection

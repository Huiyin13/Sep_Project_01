@extends('layouts.custapp')
@section('content')
<!DOCTYPE html>
<title>Customer View Deliver</title>
<style>
  table,th,td{
    text-align:center;
    border: 1px solid black;
  }
  button{
    background-color: rgb(140, 140, 175);
     color: white;
    padding: 10px 10px;
    margin: 4px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    opacity: 0.9;
  }
  button:hover{
    opacity: 2;
  }
</style>

<html>
<body>

<h2>Customer View Deliver</h2>
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
        <td><button type="button" onclick="location.href='{{ route('ManagePickUpDeliver.CusDeliverDetail', $row->PickUpDeliver_ID)}}'">View</button>
        @csrf</td>
      </tr>
      @endforeach
    </body>
  </table>

</body>
</html>
@endsection


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
<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

<table style="width:100%">
  <thead>
  <tr>
    <th>Order ID</th> 
    <th>Customer ID</th>
    <th>Customer Model</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
      <td>{{ $row->OrderID }}</td>
        <td>{{ $row->Customer_ID}}</td>
        <td>{{ $row->Comp_Model}}</td>
        <td>{{ $row->Order_Status}}</td>
        <td><button type="button" onclick="location.href='{{ route('ManagePickUpDeliver.cusDetail', $row->OrderID)}}'">View</button></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  
</table>

</body>
</html>
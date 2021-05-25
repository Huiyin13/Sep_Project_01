<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
    <title>Customer View Requested Repair</title>
</head>
<body>

<h2>Customer View Requested Repair List</h2>
<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif
<table style="width:100%">
  <thead>
  <tr>
  
    <th>Order ID</th> 
    <th>Date</th>
    <th>Estimated Cost</th>
    <th>Customer Confirmation Status</th>
    <th>Repair Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
        
        <td>{{ $row->OrderID }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->Estimated_Cost }}</td>
        <td>{{ $row->Confirmation_Status }}</td>
        <td>{{ $row->Order_Status }}</td>
        
        <form action="{{ route('manageRepairStatus.destroy', $row->OrderID)}}" method="post">
        <td><button type="button" onclick="location.href='{{ route('manageRepairStatus.custEdit', $row->OrderID) }}'">CONFIRM/CANCEL REPAIR</button>
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button></td>
        </form>

      </tr>
      @endforeach
    </tbody>
  </table>
  
</table>

</body>
</html>
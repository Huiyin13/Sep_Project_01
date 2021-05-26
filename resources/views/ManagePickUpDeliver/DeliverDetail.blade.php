<!DOCTYPE html>
<html>
<head>
<style>
.center {
  margin: auto;
  width: 60%;
  
  padding: 10px;
}
</style>
    <title>Rider View Deliver Detail</title>
</head>
<body>
<div class="center">
<form method="post" action="">
@csrf
@method('PATCH')
<table>
  <thead>
  <tr>
  
    <th>Name</th> 
    <th>Deliver Date</th>
    <th>Deliver Time</th>
    <th>Deliver Address</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
        <td>{{ $row->Customer_Name }}</td>
        <td>{{ $row->Deliver_Date }}</td>
        <td>{{ $row->Deliver_Time }}</td>
        <td>{{ $row->Deliver_Add }}</td>
        
        
        <form action="{{ route('manageRepairStatus.destroy', $row->OrderID)}}" method="post">
        <td><button type="button" onclick="location.href='{{ route('manageRepairStatus.custEdit', $row->OrderID) }}'">View</button>
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
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

<table style="width:100%">
  <thead>
  <tr>
  <th>No</th>
    <th>Order ID</th> 
    <th>Customer Name</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $row->OrderID }}</td>
        <td>{{ $row->Customer_ID }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->Order_Status }}</td>
        <td><button type="button">UPDATE</button><button type="button">Delete</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
</table>
{!! $data->links() !!}
</body>
</html>
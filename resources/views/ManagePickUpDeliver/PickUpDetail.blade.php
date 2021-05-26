<!DOCTYPE html>
<html>
<head>
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
    <title>Rider View Pick Up Detail</title>
</head>
<body>

<h2>Rider View PickUp Detail</h2>
<br>
    <form method="post" action="{{route('ManagePickUpDeliver.pick',$data->OrderID)}}">
    @csrf
    @method('PATCH')
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Customer_ID" value="{{ $data->Customer_ID}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Date</td>
                <td><input type="text" name="PickUp_Date" value="{{ $data->PickUp_Date}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Time</td>
                <td><input type="text" name="PickUp_Time" value="{{ $data->PickUp_Time}}" readonly="true"></td></tr><tr>
            <tr>
                <td>PickUp Address</td>
                <td><input type="text" name="PickUp_Add" value="{{ $data->PickUp_Add}}" readonly="true"></td></tr><tr>
            <tr>    
                <td>Status</td>
                <td><select name="Order_Status" id="Order_Status">
        @if ($data->Order_Status == 'PENDING')
            <option value="{{ $data->Order_Status}}">{{ $data->Order_Status}}</option>
            <option value="IN PROGRESS">IN PROGRESS</option>
            <option value="COMPLETED">COMPLETED</option>
        @elseif ($data->Order_Status == 'IN PROGRESS')
        <option value="{{ $data->Order_Status}}">{{ $data->Order_Status}}</option>
            <option value="PENDING">PENDING</option>
            <option value="COMPLETED">COMPLETED</option>
        @else
        <option value="{{ $data->Order_Status}}">{{ $data->Order_Status}}</option>
        <option value="PENDING">PENDING</option>
        <option value="IN PROGRESS">IN PROGRESS</option>
        @endif
            </select></td>
    <th>PickUp Time</th>
    <th>PickUp Address</th>
    <th>Status</th>
    <th colspan="3">Action</th>
  </tr>
  </thead>
  <body>
    @foreach($data as $row)
      <tr>
        
        <td>{{ $row->Customer_Name }}</td>
        <td>{{ $row->PickUp_Date }}</td>
        <td>{{ $row->PickUp_Time }}</td>
        <td>{{ $row->PickUp_Add }}</td>
        <td><select name="Status" id="Status">
        <option value="Pending">
        <option value="Success to PickUp">
        <option value="Fail to PickUp"></td>
        
        <td><button type="button" onclick="location.href='{{ route('ManagePickUpDeliver.riderDeliver', $row->OrderID)}}'">View</button>
        @csrf</td>

      </tr>
      @endforeach
    </tbody>
  </table>
  
</table>

</body>
</html>
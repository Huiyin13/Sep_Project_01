<!DOCTYPE html>
<html>
<head>
<title>Customer Confirm Repair</title>
<style>
.center {
  margin: auto;
  width: 60%;
  
  padding: 10px;
}
</style>
</head>
<body>
<h1>Customer Confirm Repair</h1>
<div class="center">
<form method="post" action="{{ route('manageRepairStatus.update', $data->OrderID) }}">
@csrf
@method('PUT')
  <table>
    <tr>
        <td>Customer Name</td>
        <td><input type="text" name="Customer_ID" value="{{ $data->Customer_ID}}" readonly="true"></td>
    </tr>
    <tr>
        <td>Date</td>
        <td><input type="text" name="created_at" value="{{ $data->created_at}}" readonly="true"></td>
    </tr>
    <tr>
        <td>Problems Reported</td>
        <td><input type="text" name="Problems_Reported" value="{{ $data->Problems_Reported}}" readonly="true"></td>
    </tr>
    <tr>
        <td>Confirmation Status</td>
        <td><input type="text" name="Confirmation_Status" value="{{ $data->Confirmation_Status}}" readonly="true"></td>
    </tr>
    <tr>
        <td>Repair Status</td>
        <td><select name="Order_Status" id="Order_Status" disabled>
        @if ($data->Order_Status == 'PENDING')
            <option value="{{ $data->Order_Status}}">{{ $data->Order_Status}}</option>
            <option value="IN PROGRESS">IN PROGRESS</option>
        @else if ($data->Order_Status == 'IN PROGRESS')
        <option value="{{ $data->Order_Status}}">{{ $data->Order_Status}}</option>
            <option value="PENDING">PENDING</option>
        @endif
            <option value="COMPLETED">COMPLETED</option>
            </select></td>
    </tr>
    <tr>
        <td>Cost</td>
        <td><input type="number" name="Estimated_Cost" step="0.01" value="{{ $data->Estimated_Cost}}" readonly="true"></td>
    </tr>
    <tr>
        <td>Reason</td>
        <td><textarea name="Reason" rows="4" cols="50" readonly>{{ $data->Reason}}</textarea></td>
    </tr>
    </table>
    
    
    </form>
    @if ($data->Confirmation_Status == 'PENDING')
    <button onclick="location.href='{{ route('manageRepairStatus.custConfirm', ['id'=>$data->OrderID,'idtwo'=>$data->Customer_ID])}}'">
     CONFIRM</button>
    <button onclick="location.href='{{ route('manageRepairStatus.custCancel', ['id'=>$data->OrderID,'idtwo'=>$data->Customer_ID])}}'">
     CANCEL</button>
     <button onclick="location.href='{{ route('manageRepairStatus.custViewAll', 20001)}}'">
     Back</button>
     @elseif ($data->Confirmation_Status == 'CONFIRMED')
     <button onclick="location.href='{{ route('manageRepairStatus.custViewAll', 20001)}}'">
     Back</button>
     @else
     <button onclick="location.href='{{ route('manageRepairStatus.custViewAll', 20001)}}'">
     Back</button>
     @endif
</div>

</body>
</html>
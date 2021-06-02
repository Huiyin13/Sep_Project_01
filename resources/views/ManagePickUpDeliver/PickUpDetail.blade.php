@extends('layouts.riderapp')
@section('content')
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
    <title>Rider View Pick Up Detail</title>
</head>
<body>

<h2>Rider View PickUp Detail</h2>
<br>
<div class="center">
    <form method="POST" action="{{ route('ManagePickUpDeliver.update', $data->PickUpDeliver_ID) }}">
    @csrf
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Customer_ID" value="{{ $data->Customer_ID}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Date</td>
                <td><input type="date" name="PickUp_Date" value="{{ $data->PickUp_Date}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Time</td>
                <td><input type="time" name="PickUp_Time" value="{{ $data->PickUp_Time}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Address</td>
                <td><input type="text" name="PickUp_Add" value="{{ $data->PickUp_Add}}" readonly="true"></td></tr>
            <tr>    
                <td>Status</td>
                <td><select name="Status" id="Status">
                    <option value="Pending">Pending</option>
                    <option value="SuccessPick">Success to PickUp</option>
                    <option value="Pending">Fail to PickUp</option></select></td></tr>
        </table>        
        <input type="submit" value="Update">
    </form>

    
    
    </div>
</body>
</html>
@endsection
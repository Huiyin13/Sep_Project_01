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
    <title>Rider View Deliver Detail</title>
</head>
<body>
<h2>Rider View PickUp Detail</h2>
<br>
<div class="center">

<form method="POST" action="{{ route('ManagePickUpDeliver.riderUpdateDeliver', $data->PickUpDeliver_ID) }}">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Customer_ID" value="{{ $data->Customer_ID}}" readonly="true"></td>
                
            <tr>
            
            @csrf
                <td>Deliver Date</td>
                <td><input type="date" value="{{ $data->Deliver_Date}}" name="Deliver_Date" id="Deliver_Date"></td>
                
            <tr>
           
                <td>Deliver Time</td>
                <td><input type="time" value="{{ $data->Deliver_Time}}" name="Deliver_Time" id="Deliver_Time"></td>
                
            <tr>
                <td>Deliver Address</td>
                <td><input type="text" name="Deliver_Add" id="Deliver_Add" value="{{ $data->PickUp_Add}}" readonly="true"></td>
                
            <tr>    
                <td>Status</td>
                <td><select name="Status" id="Status">
                    <option value="SuccessPick">Pending</option>
                    <option value="SuccessDeliver">Success to Deliver</option>
                    <option value="SuccessPick">Fail to Deliver</option></select></td>
                
        </table>        
        <input type="submit" value="Update">
    </form>
    </div>
</body>
</html>
@endsection
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
    <title>Customer View Delivery Detail</title>
</head>
<body>

<h2>Customer View Delivery Detail</h2>
<br>
<div class="center">
    @csrf
    <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Customer_ID" value="{{ $data->Customer_ID}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Date</td>
                <td><input type="date" name="PickUp_Date" value="{{ $data->Deliver_Date}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Time</td>
                <td><input type="time" name="PickUp_Time" value="{{ $data->Deliver_Time}}" readonly="true"></td></tr>
            <tr>
                <td>PickUp Address</td>
                <td><input type="text" name="PickUp_Add" value="{{ $data->Deliver_Add}}" readonly="true"></td></tr>
            <tr>    
                <td>Status</td>
                <td><{{ $data->Status}}></td></tr>
        </table>        
        <input type="submit" value="Update">

        
    </div>
</body>
</html>
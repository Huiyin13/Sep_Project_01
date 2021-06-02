@extends('layouts.custapp')

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
    <title>Customer View Pick Up</title>
</head>
<body>

<h2>Customer View PickUp</h2>
@if(session()->get('key'))
<div class="center">
<form action="add" method="POST">
@csrf
        <table>
            <tr>
                <td>Customer ID</td>
                <td><input type="text" id="Customer_ID" name="Customer_ID" value="{{ session()->get('key1')}}" ></td></tr>
              <tr>
                <td>Order ID</td>
                <td><input type="text" id="OrderID" name="OrderID" value="{{ $data->OrderID}}"></td></tr>
 </form>
  
        <input type="hidden" name="Status" value="Pending">
            <tr>
                <td>PickUp Date</td>
                <td><input type="date" id="PickUp_Date" name="PickUp_Date"></td></tr>
            <tr>
                <td>PickUp Time</td>
                <td><input type="time" id="PickUp_Time" name="PickUp_Time"></td></tr><tr>
            <tr>
                <td>PickUp Address</td>
                <td><textarea type="text" rows="4" cols="50" id="PickUp_Add" name="PickUp_Add"></textarea></td></tr>
            <tr><td>
            <td><button >Submit</button</td>
  </table>
  
</form>
</div>

</body>
@endif
</html>
@endsection
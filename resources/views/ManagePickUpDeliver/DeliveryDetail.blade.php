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
    <title>Customer View Pick Up and Delivery Detail</title>
</head>
<body>

<h2>Customer View PickUp and Delivery Detail</h2>

<div class="center">
<form action="{{route('ManagePickUpDeliver.add',$data->OrderID)}}" method="POST">
@csrf
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" id="Customer_ID" name="Customer_ID" value="{{ $data->Customer_ID}}" ></td></tr>
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
                <td><input type="text" id="PickUp_Time" name="PickUp_Time"></td></tr><tr>
            <tr>
                <td>PickUp Address</td>
                <td><textarea type="text" rows="4" cols="50" id="PickUp_Add" name="PickUp_Add"></textarea></td></tr>
            <tr><td>
            <input type="submit" value="Update"></td></tr>
 
  </table>
</form>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Button</title>
</head>

<body>
    <center>
        
        <form action="{{ route('ManagePayment.Payment1')}}" method="post">
        
        @csrf
        <input type="hidden" value="1" name="customerID">
        <input type="hidden" value="10000" name="OrderID">
                <input type="submit" class="btn btn-warning" value="Payment">
            
        </form>
    </center>
</body>
</html>
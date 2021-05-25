
<!DOCTYPE html> 
<html>
<head>
	<title>Reset Password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<style>
		table, td{
			padding: 10px;
		}
	</style>
</head>

<body>
	<div class="container customer-register">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-8">
				<h2><b>Reset Password</b></h2>
                @foreach($data as $row)
				<form action="{{ route('ManageAccount.updatePassword', $row->Customer_ID) }}" method="get">
				@csrf
                
				<table>
                    
                        <!-- Customer Old Password --> 
                        <tr>
                            <td>Old Password: </td>
                            <td><input type="password" name="Customer_Passwordo"  id="Customer_Passwordo" required></td>
                        </tr>
                        <!-- Customer New Password --> 
                        <tr>
                            <td>New Password: </td>
                            <td><input type="password" name="Customer_Password"  id="Customer_Password" required></td>
                        </tr>
                        <!-- Submit button -->
                        <tr>
                            <td></td>
                            <td><button type="submit" onclick="location.href='{{ route('ManageAccount.updatePassword', $row->Customer_ID) }}'" style="background-color: black; border: none; color: white; padding: 5px 10px">CHANGE</button></td>
                            <td></td>
                            <td><button type="button" onclick="location.href='{{ route('ManageAccount.selectProfile', $row->Customer_ID) }}'" style="background-color: red; border: none; color: white; padding: 5px 10px">CANCEL</button></td>
                        </tr>
                    @endforeach
				</table>
				
                </form>
			</div>
		</div>
	</div>
</body>
</html>

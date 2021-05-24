@extends('layouts.app')

@section('content')
<!DOCTYPE html> 
<html>
<head>
	<title>Customer Profile</title>
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
				<h2><b>Customer Registration</b></h2>
				<form action='{{ url("register/$url") }}' method="post">
				@csrf
				<table>
					<!-- Customer Name --> 
					<tr>
						<td>Name (as per IC): </td>
						<td><input type="text" name="Customer_Name" placeholder="Full Name as per IC" size="50" required></td>
					</tr>
					<!-- Customer Identification Card number -->
					<tr>
						<td>Identification Card (IC) Number: </td>
						<td><input type="text" name="Customer_IC" placeholder="e.g. 123456789012" maxlength="12" size="50" required></td>
					</tr>
					<!-- Reminder for customer -->
					<tr>
						<td style="color:red;font-size: 10px">Please ensure that you enter the correct IC number. </td>
						<td style="color:red;font-size: 10px">Once registered, you cannot edit your IC number. </td>
					</tr>
					<!-- Customer Email -->
					<tr>
						<td>Email: </td>
						<td><input type="email" name="Customer_Email" placeholder="e.g. example@example.com" size="50" required></td>
					</tr>
					<!-- Customer Address -->
					<tr> 
						<td>Address: </td>
						<td><textarea name="Customer_Address" row="5" cols="52" placeholder="House Number, Building Name, Street Name, Postcode, Area, State" required></textarea></td>
					</tr>
					<!-- Customer Phone number -->
					<tr> 
						<td>Phone Number: </td>
						<td><input type="text" name="Customer_Phone" placeholder="e.g. 0123456789"  maxlength="12" size="50" required></td>
					</tr>
					<!-- Customer Password -->
					<tr>
						<td>Password: </td>
						<td><input type="password" name="Customer_Password" placeholder="Minimum 8 characters" size="50" required></td>
					</tr>
					<!-- Customer Cofirm Password -->
					<tr> 
						<td>Confirm Password: </td>
						<td><input type="password" name="Customer_Password_confirmation" placeholder="Please re-enter the password above correctly" size="50" required></td>
					</tr>
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">REGISTER</button></td>
					</tr>
				</table>
                </form>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
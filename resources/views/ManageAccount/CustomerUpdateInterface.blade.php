@extends('layouts.custapp')

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
            @foreach($data as $row)
				<h2><b>Your Profile</b></h2>
				<form  action = "{{ route('ManageAccount.update', $row->Customer_ID) }}" method="post">
				@csrf
				
				<table>
				
					<!-- Customer Name --> 
					<tr>
						<td>Name (as per IC): </td>
						<td><input type="text" name="Customer_Name"  id="Customer_Name" value="{{ $row->Customer_Name}}" required></td>
					</tr>
					<!-- Customer Identification Card number -->
					<tr>
						<td>Identification Card (IC) Number: </td>
						<td><input type="text" name="Customer_IC" id="Customer_IC" value="{{ $row->Customer_IC}}" readonly="true"></td>
					</tr>
					<!-- Reminder for customer -->
					<tr>
						<td></td>
						<td style="color:red;font-size: 10px">Contact us, if need to update your IC. </td>
						
					</tr>
					<!-- Customer Email -->
					<tr>
						<td>Email: </td>
						<td><input type="text" name="Customer_Email" id="Customer_Email" value="{{ $row->Customer_Email}}" required></td>
					</tr>
					<!-- Customer Address -->
					<tr> 
						<td>Address: </td>
						<td><textarea type="text"  row="5" cols="52" name="Customer_Address" id="Customer_Address"  required>{{ $row->Customer_Address}}</textarea></td>
					</tr>
					<!-- Customer Phone number -->
					<tr> 
						<td>Phone Number: </td>
						<td><input type="text" name="Customer_Phone"  id="Customer_Phone" value="{{ $row->Customer_Phone}}" required></td>
					</tr> 
					<!-- Customer Password --> 
					<tr>
						<td>Password: </td>
						<td><input type="password" name="Customer_Password"  id="Customer_Password" required></td>
					</tr>
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">SAVE</button></td>
						<td></td>
						<td><button type="button" style="background-color: black; border: none; color: white; padding: 5px 10px" onclick="location.href='{{ route('ManageAccount.selectProfile', $row->Customer_ID) }}'">CANCEL</button></td>
					</tr>
					
				</table>
				
                </form>
                @endforeach
			</div>
		</div>
	</div>
</body>
</html>
@endsection
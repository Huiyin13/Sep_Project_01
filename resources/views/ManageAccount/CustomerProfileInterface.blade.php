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
				<form action="{{ route('ManageAccount.editProfile', $row->Customer_ID)}}" method="get">
				@csrf
				<table>
				
					<!-- Customer Name --> 
					<tr>
						<td>Name (as per IC): </td>
						<td>{{ $row->Customer_Name }}</td>
					</tr>
					<!-- Customer Identification Card number -->
					<tr>
						<td>Identification Card (IC) Number: </td>
						<td>{{ $row->Customer_IC }}</td>
					</tr>
					<!-- Reminder for customer -->
					<tr>
						<td style="color:red;font-size: 10px">Contact us, if need to update your IC. </td>
						
					</tr>
					<!-- Customer Email -->
					<tr>
						<td>Email: </td>
						<td>{{ $row->Customer_Email }}</td>
					</tr>
					<!-- Customer Address -->
					<tr> 
						<td>Address: </td>
						<td>{{ $row->Customer_Address }}</td>
					</tr>
					<!-- Customer Phone number -->
					<tr> 
						<td>Phone Number: </td>
						<td>{{ $row->Customer_Phone }}</td>
					</tr>
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">EDIT INFO</button> </td>
						<td></td>
						<td><button type="button" onclick="location.href='{{ route('ManageAccount.changePassword',  $row->Customer_ID) }}'" style="background-color: black; border: none; color: white; padding: 5px 10px">CHANGE PASSWORD</button></td>
					</tr>
					@endforeach
				</table>
				
                </form>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
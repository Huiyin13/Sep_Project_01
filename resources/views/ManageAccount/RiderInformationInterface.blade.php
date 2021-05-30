@extends('layouts.staffapp')

@section('content')
<!DOCTYPE html> 
<html>
<head>
	<title>Rider Details</title>
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
				<h2><b>Rider Details</b></h2>
				<form action="{{ route('ManageAccount.updateICR', $row->Rider_ID)}}" method="get">
				@csrf
				<table>
				
					<!-- Rider Name --> 
					<tr>
						<td>Name (as per IC): </td>
						<td>{{ $row->Rider_Name }}</td>
					</tr>
					<!-- Rider Identification Card number -->
					<tr>
						<td>Identification Card (IC) Number: </td>
						<td>{{ $row->Rider_IC }}</td>
					</tr>
					
					<!-- Rider Email -->
					<tr>
						<td>Email: </td>
						<td>{{ $row->Rider_Email }}</td>
					</tr>
					<!-- Rider Address -->
					<tr> 
						<td>Address: </td>
						<td>{{ $row->Rider_Address }}</td>
					</tr>
					<!-- Rider Phone number -->
					<tr> 
						<td>Phone Number: </td>
						<td>{{ $row->Rider_Phone }}</td>
					</tr>
                    @if($row->Rider_Status == "BANNED"|| $row->Rider_Status == "REJECTED")
					<tr> 
						<td>Status: </td>
						<td>{{ $row->Rider_Status }}</td>
					</tr>
                    <tr> 
						<td>Reason: </td>
						<td>{{ $row->Reason }}</td>
					</tr>
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">EDIT INFO</button> </td>
					</tr>
                    @else
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">EDIT INFO</button> </td>
						<td></td>
						<td><button type="button" onclick="location.href='{{ route('ManageAccount.banUserR',  $row->Rider_ID) }}'" style="background-color: black; border: none; color: white; padding: 5px 10px">BAN USER</button></td>
					</tr>
					@endif
					@endforeach
				</table>
				
                </form>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
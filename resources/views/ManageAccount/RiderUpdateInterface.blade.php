
<!DOCTYPE html> 
<html>
<head>
	<title>Rider Profile</title>
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
				<form  action = "{{ route('ManageAccount.updateR', $row->Rider_ID) }}" method="post">
				@csrf
				<table>
				
					<!-- Rider Name --> 
					<tr>
						<td>Name (as per IC): </td>
						<td><input type="text" name="Rider_Name"  id="Rider_Name" value="{{ $row->Rider_Name}}" required></td>
					</tr>
					<!-- Rider Identification Card number -->
					<tr>
						<td>Identification Card (IC) Number: </td>
						<td><input type="text" name="Rider_IC" id="Rider_IC" value="{{ $row->Rider_IC}}" readonly="true"></td>
					</tr>
					<!-- Reminder for Rider -->
					<tr>
						<td></td>
						<td style="color:red;font-size: 10px">Contact us, if need to update your IC. </td>
						
					</tr>
					<!-- Rider Email -->
					<tr>
						<td>Email: </td>
						<td><input type="text" name="Rider_Email" id="Rider_Email" value="{{ $row->Rider_Email}}" required></td>
					</tr>
					<!-- Rider Address -->
					<tr> 
						<td>Address: </td>
						<td><textarea type="text"  row="5" cols="52" name="Rider_Address" id="Rider_Address"  required>{{ $row->Rider_Address}}</textarea></td>
					</tr>
					<!-- Rider Phone number -->
					<tr> 
						<td>Phone Number: </td>
						<td><input type="text" name="Rider_Phone"  id="Rider_Phone" value="{{ $row->Rider_Phone}}" required></td>
					</tr> 
					<!-- Customer Password --> 
					<tr>
						<td>Password: </td>
						<td><input type="password" name="Rider_Password"  id="Rider_Password" required></td>
					</tr>
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">UPDATE</button></td>
						<td></td>
						<td><button type="button" style="background-color: black; border: none; color: white; padding: 5px 10px" onclick="location.href='{{ route('ManageAccount.selectProfileR', $row->Rider_ID) }}'">CANCEL</button></td>
					</tr>
					
				</table>
				
                </form>
                @endforeach
			</div>
		</div>
	</div>
</body>
</html>

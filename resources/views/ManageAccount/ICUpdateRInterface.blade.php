
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
				<form  action = "{{ route('ManageAccount.updateICRR', $row->Rider_ID) }}" method="post">
				@csrf
				<table>
				
					<!-- Rider Name --> 
					<tr>
						<td>Name (as per IC): </td>
						<td><input type="text" name="Rider_Name"  id="Rider_Name" value="{{ $row->Rider_Name}}"  readonly="true"></td>
					</tr>
					<!-- Rider Identification Card number -->
					<tr>
						<td>Identification Card (IC) Number: </td>
						<td><input type="text" name="Rider_IC" id="Rider_IC" value="{{ $row->Rider_IC}}" maxlength = "12" required></td>
					</tr>
					<!-- Rider Email -->
					<tr>
						<td>Email: </td>
						<td><input type="text" name="Rider_Email" id="Riderr_Email" value="{{ $row->Rider_Email}}"  readonly="true"></td>
					</tr>
					<!-- Rider Address -->
					<tr> 
						<td>Address: </td>
						<td><input type="text" name="Rider_Address" id="Rider_Address" value="{{ $row->Rider_Address}}"  readonly="true"></td>
					</tr>
					<!-- Rider Phone number -->
					<tr> 
						<td>Phone Number: </td>
						<td><input type="text" name="Rider_Phone"  id="Rider_Phone" value="{{ $row->Rider_Phone}}"  readonly="true"></td>
					</tr> 
					<!-- Submit button -->
					<tr>
						<td></td>
						<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">SAVE</button></td>
						<td></td>
						<td><button type="button" style="background-color: black; border: none; color: white; padding: 5px 10px" onclick="location.href='{{ route('ManageAccount.viewProfileR', $row->Rider_ID) }}'">CANCEL</button></td>
					</tr>
					
				</table>
				
                </form>
                @endforeach
			</div>
		</div>
	</div>
</body>
</html>

@extends('layouts.app')

@section('content')
<!DOCTYPE html> 
<html>
<head>
	<title>Rider Registration Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
	<div class="container customer-register">
		<div class="row">
			<div class="col-sm col-sm-offset">
				<!-- Display error message -->
				@if(session()->has('message'))
    				<div class="alert alert-warning">
        				{{ session()->get('message') }}
    				</div>
				@endif
				<h2><b>Rider Registration</b></h2>
                <form action='{{ url("register/$url") }}' method="post" enctype="multipart/form-data">
				@csrf
					<table>
						<tr>
							<!-- Rider Name and input field -->
							<td>Name (as per IC): </td>
							<td><input type="text" name="Rider_Name" placeholder="Full Name as per IC" size="50" required></td>
							<!-- Rider upload Identification Card and input field -->
							<td>IC: </td>
							<td><input type="file" name="Rider_IC_Photo" onchange="previewICPhoto(this)" required/></td>
						</tr>
						<tr>
							<!-- Rider IC Number and input field -->
							<td>Identification Card (IC) Number: </td>
							<td><input type="text" name="Rider_IC" placeholder="e.g. 123456789012" maxlength="12" size="50" required></td>
							<!-- Rider preview uploaded IC -->
							<td colspan="2" rowspan="3" align="center"><img id="previewIC" alt="Front IC Preview" style="max-width:130px;margin-top:20px" /></td>
						</tr>
						<tr>
							<!-- Reminder for rider -->
							<td style="color:red;font-size: 10px">Please ensure that you enter the correct IC number. </td>
							<td style="color:red;font-size: 10px">Once registered, you cannot edit your IC number. </td>
						</tr>
						<tr>
							<!-- Rider email and input field -->
							<td>Email: </td>
							<td><input type="email" name="Rider_Email" placeholder="e.g. example@example.com" size="50" required></td>
						</tr>
						<tr> 
							<!-- Rider address and input field -->
							<td>Address: </td>
							<td><textarea name="Rider_Address" row="5" cols="52" placeholder="House Number, Building Name, Street Name, Postcode, Area, State" required></textarea></td>
							<!-- Rider driving licence label -->
							<td colspan="2">Driving Licence: </td>
						</tr>
						<tr> 
							<!-- Rider phone number and input field -->
							<td>Phone Number: </td>
							<td><input type="text" name="Rider_Phone" placeholder="e.g. 0123456789"  maxlength="12" size="50" required></td>
							<!-- Rider upload licence and input field -->
							<td colspan="2" align="center"><input type="file" name="Rider_Licence" onchange="previewLicencePhoto(this)" required/></td>
						</tr>
						<tr>
							<!-- Rider password and input field -->
							<td>Password: </td>
							<td><input type="password" name="Rider_Password" placeholder="Minimum 8 characters" size="50" required></td>
							<!-- Rider preview uploaded licence -->
							<td colspan="3" rowspan="2" align="center"><img id="previewLicence" alt="Licence Preview" style="max-width:130px;margin-top:20px" /></td>
						</tr>
						<tr> 
							<!-- Rider confirm password and input field -->
							<td>Confirm Password: </td>
							<td><input type="password" name="Rider_Password_confirmation" placeholder="Please re-enter the password above correctly" size="50" required></td>
						</tr>
						<tr>
							<td></td>
							<!-- Submit button -->
							<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">REGISTER</button></td>
						</tr>
					</table>
                </form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script>
        // Preview Rider IC Photo script 
		function previewICPhoto(input){
			var file = $("input[type=file]").get(0).files[0];
			if(file){
				var reader = new FileReader();
				reader.onload = function(){
					$('#previewIC').attr("src",reader.result);
				}
				reader.readAsDataURL(file);
			}
		}
        // Preview Rider Licence Photo script 
        function previewLicencePhoto(input){
			var file = $("input[type=file]").get(1).files[0];
			if(file){
				var reader = new FileReader();
				reader.onload = function(){
					$('#previewLicence').attr("src",reader.result);
				}
				reader.readAsDataURL(file);
			}
		}
	</script>
</body>
</html>
@endsection
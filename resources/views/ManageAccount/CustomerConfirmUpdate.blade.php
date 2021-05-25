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
				@method('PATCH')
					<!-- Customer Password --> 
					<tr>
						<td>Password </td>
						<td><input type="text" name="Customer_Pass"  id="Customer_Pass" required></td>
					</tr>
					<tr>
					<td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">OK</button>
					
							<button type="submit" onclick="location.href='{{ route('ManageAccount.selectProfile', $row->Customer_ID) }}'" style="background-color: red; border: none; color: white; padding: 5px 10px">CANCEL</button></td>
					
					
					</tr>
				</table>
				
                </form>
                @endforeach
			</div>
		</div>
	</div>
</body>
</html>

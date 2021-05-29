
<!DOCTYPE html> 
<html>
<head>
	<title>Reject Registration</title>
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
				<h2><b>Reject Registration</b></h2>
                @foreach($data as $row)
				<form action="{{ route('ManageAccount.rejectR', $row->Rider_ID) }}" method="get">
				@csrf
                
				<table>
                        <tr>
                            <td>Reject Reason: </td>
                            <td><textarea name="Reason" id="Reason" rows="4" cols="50" required></textarea></td>
                        </tr>
                        
                        <!-- Submit button -->
                        <tr>
                            <td></td>
                            <td><button type="submit" style="background-color: black; border: none; color: white; padding: 5px 10px">REJECT</button></td>
                            <td></td>
                            <td><button type="button" onclick="location.href='{{ route('ManageAccount.selectProfileRR', $row->Rider_ID) }}'" style="background-color: red; border: none; color: white; padding: 5px 10px">CANCEL</button></td>
                        </tr>
                    @endforeach
				</table>
				
                </form>
			</div>
		</div>
	</div>
</body>
</html>

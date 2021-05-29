
<!DOCTYPE html> 
<html>
<head>
	<title>Rider List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<style>
		table, td{
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="container customer-register">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-8">
           
				<h2><b>Rider List</b></h2>
                
                </div>
		</div>
	</div>
				@csrf
                <center>
				<table style="width:60%" border = 1>
                    <thead>
                        <tr>
                            <th>No</th> 
                            <th>Rider Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->Rider_ID }}</td>
                            <td>{{ $row->Rider_Name }}</td>
                            <td>{{ $row->Rider_Status }}</td>
                            <td><button type="button"  style="background-color: black; border: none; color: white; padding: 5px 10px" onclick="location.href='{{ route('ManageAccount.selectProfileRR', $row->Rider_ID) }}'">VIEW</button>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </form>
                

</body>
</html>

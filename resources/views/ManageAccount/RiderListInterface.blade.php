
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
				<h2><b>Rider List</b></h2>
                <form action="{{ route('ManageAccount.searchR') }}" method="GET" role="search">          
                    <input type="text" class="form-control mr-2" name="search" placeholder="Search Customer Name" id="term">
                    <button class="btn btn-info" type="submit" title="Search projects">Search</button>
                </form>
                <br>
                <a href="{{ route('ManageAccount.indexR') }}" class=" mt-1">
                    <button class="btn btn-danger" type="button" title="Refresh page">Refresh</button>
                    <br>
                </a>
				@csrf
				<table style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th> 
                            <th>Rider Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->Rider_ID }}</td>
                            <td>{{ $row->Rider_Name }}</td>
                            <td><button type="button" onclick="location.href='{{ route('ManageAccount.editR', $row->Rider_ID) }}'">VIEW</button>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </form>
                @endforeach
			</div>
		</div>
	</div>
</body>
</html>

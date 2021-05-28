
<!DOCTYPE html> 
<html>
<head>
	<title>Customer List</title>
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
           
				<h2><b>Customer List</b></h2>
                <form action="{{ route('ManageAccount.search') }}" method="GET" role="search">          
                    <input type="text" class="form-control mr-2" name="search" placeholder="Search Customer Name" id="term"> <button  type="submit" title="Search projects">Search</button>
                </form>
                <br>
                <a href="{{ route('ManageAccount.selectUserType', 1) }}" class=" mt-1">
                    <button type="button" title="Refresh page">Refresh</button>
                    
                </a>
                </div>
		</div>
	</div>
				@csrf
                <center>
				<table style="width:60%" border = 1>
                    <thead>
                        <tr>
                            <th>No</th> 
                            <th>Customer Name</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->Customer_ID }}</td>
                            <td>{{ $row->Customer_Name }}</td>
                            <td>{{ $row->Customer_Status }}</td>
                            <td><button type="button"  style="background-color: black; border: none; color: white; padding: 5px 10px" onclick="location.href='{{ route('ManageAccount.viewProfile', $row->Customer_ID) }}'">VIEW</button>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </form>
                

</body>
</html>

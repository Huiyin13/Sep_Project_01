
<!DOCTYPE html> 
<html>
<head>
	<title>Rider Main Page</title>
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
			@foreach($data1 as $row)
				@if ($row->Rider_Status == "APPROVED")
                <h2><b>Goodday {{$row->Rider_Name}}</b></h2>
                @else if ($row->Rider_Status == "REJECTED")
                <h5><b>Sorry, {{$row->Rider_Name}}. Your registration is rejected. Please contact to our service center for more information. Here is the reason you are rejected.</b></h5>
                <p>{{$row->Reason}}</p>
                @else
                <h5><b> {{$row->Rider_Name}}, You are BANNED! Please contact to our service center for more information. Here is the reason you are banned.</b></h5>
                <p>{{$row->Reason}}</p>
                @endif
            @endforeach
			</div>
		</div>
	</div>
</body>
</html>

@extends('layouts.custapp')

@section('content')

<!DOCTYPE html> 
<html>
<head>
	<title>Customer Main Page</title>
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
			@if(session()->get('key')) 
			
				@if (session()->get('key2')   != "BANNED")
                <h2><b>Goodday {{ session()->get('key') }}</b></h2>
                @else
                <h5><b> {{ session()->get('key') }}, You are BANNED! Please contact to our service center for more information. Here is the reason you are banned.</b></h5>
                <p>{{ session()->get('key3') }}</p>
                @endif
				@endif
			</div>
		</div>
	</div>
</body>
</html>
@endsection

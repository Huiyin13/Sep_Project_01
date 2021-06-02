@extends('layouts.custapp')
@section('content')
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
    <title>Customer View Requested Repair</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>

<h2>Customer View Requested Repair List</h2>
<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif
<div class="container customer-register">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-8">
          <table style="width:300%">
            <thead>
            <tr>
            
              <th>Order ID</th> 
              <th>Date</th>
              <th>Estimated Cost</th>
              <th>Customer Confirmation Status</th>
              <th>Repair Status</th>
              <th style="width:70%">Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($data as $row)
                <tr>
                  
                  <td>{{ $row->OrderID }}</td>
                  <td>{{ $row->created_at }}</td>
                  <td>{{ $row->Estimated_Cost }}</td>
                  <td>{{ $row->Confirmation_Status }}</td>
                  <td>{{ $row->Order_Status }}</td>
                  
                  
                  <td><button type="button" onclick="location.href='{{ route('manageRepairStatus.custEdit', $row->OrderID) }}'">CONFIRM/CANCEL REPAIR</button></td>

                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $data->links() }}
          </table>
</div>
		</div>
	</div>
</body>
</html>
@endsection
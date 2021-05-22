<!DOCTYPE html>
<html>
<body>

<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

<button onclick="location.href='{{ route('manageRepairRequest.list',20001) }}'">
     View Requested Repair</button>
     
</body>
</html>
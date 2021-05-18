<!DOCTYPE html>
<html>
<body>

<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif
<button onclick="location.href='{{ route('manageRepairStatus.index') }}'">
     Staff View Requested Repair</button>
     <button onclick="location.href='{{ route('manageRepairStatus.update', 20001)}}'">
     Customer View Requested Repair</button>
</body>
</html>
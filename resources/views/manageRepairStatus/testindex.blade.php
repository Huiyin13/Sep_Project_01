<!DOCTYPE html>
<html>
<body>


<button onclick="location.href='{{ route('manageRepairStatus.index') }}'">
     Staff View Requested Repair</button>
     <button onclick="location.href='{{ route('manageRepairStatus.update', 20001)}}'">
     Customer View Requested Repair</button>
</body>
</html>
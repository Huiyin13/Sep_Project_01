<!DOCTYPE html>
<html>
<body>

<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

     <button onclick="location.href='{{ route('ManageAccount.selectProfile', 1)}}'">Customer </button>
     <button onclick="location.href='{{ route('ManageAccount.selectProfileR', 4)}}'">Rider </button>
</body>
</html>
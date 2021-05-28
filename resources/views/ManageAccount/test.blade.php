<!DOCTYPE html>
<html>
<body>

<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

     <button onclick="location.href='{{ route('ManageAccount.selectProfile', 2)}}'">Customer </button>
     <button onclick="location.href='{{ route('ManageAccount.selectProfileR', 4)}}'">Rider </button>
     <button onclick="location.href='{{ route('ManageAccount.index') }}'">CUSTOMER</button>
     
</body>
</html>
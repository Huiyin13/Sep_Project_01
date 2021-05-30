<!DOCTYPE html>
<html>
<body>

<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif

     <button onclick="location.href='{{ route('ManageAccount.selectProfile', 8)}}'">Customer </button>
     <button onclick="location.href='{{ route('ManageAccount.selectProfileR', 4)}}'">Rider </button>
     <button onclick="location.href='/ManageAccount/selectUserType'">CUSTOMER</button>
     <button onclick="location.href='/ManageAccount/selectUserTypeR'">RIDER</button>
     <button onclick="location.href='/ManageAccount/viewRegister'">Register</button>
     
</body>
</html>
<!DOCTYPE html>
<html>
<body>

<p>@if(session()->get('success'))
      {{ session()->get('success') }}  
<br></p>
@endif
<button onclick="location.href='{{ route('ManagePickUpDeliver.riderPk')}}'">
     Rider View PickUp List</button>
     <button onclick="location.href='{{ route('ManagePickUpDeliver.riderDv')}}'">
     Rider View Deliver</button>
     <button onclick="location.href='{{ route('ManagePickUpDeliver.cuslist', 20001)}}'">
     Customer View PickUp</button>
     <button onclick="location.href='{{ route('ManagePickUpDeliver.custDeliverView', 20001)}}'">
     Customer View Delivery</button>
     
</body>
</html>
<table>
  <thead>
  <tr>
  
    <th>Order ID</th> 
    <th>Customer Name</th>
    <th>Date</th>
    <th>Customer Confirmation Status</th>
    <th>Repair Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
        
        <td>{{ $row->Comp_Owner }}</td>
        <td>{{ $row->Comp_Model }}</td>
        <td>{{ $row->Warranty_Date }}</td>
        <td>{{ $row->Problems_Frequency }}</td>
        <td>{{ $row->Problems_Reported }}</td>

      </tr>
      @endforeach
    </tbody>
</table>
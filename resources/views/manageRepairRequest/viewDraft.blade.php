@extends('layouts.custapp')
@section('content')
<!DOCTYPE html>
<html>
<title>Customer View Request Detail Draft</title>
<h2>Customer View Request Detail Draft</h2>


<style>
  table,th,td{
    text-align:center;
    border: 1px solid black;
  }
  button{
    background-color: rgb(140, 140, 175);
     color: white;
    padding: 10px 10px;
    margin: 4px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    opacity: 0.9;
  }
  button:hover{
    opacity: 2;
  }
</style>

@if(session()->get('key'))
<table border = 0 align ="center">
            <tr>
            <td><button onclick="location.href='{{ route('manageRepairRequest.sort',session()->get('key1')) }}'">Sort</button></td>
            </tr>
            <p>@if(session()->get('msj'))
            {{ session()->get('msj') }}  
            <br></p>
            @endif
</table>
<table style="width:100%">
  <thead>
  <tr>
    <th>Computer Owner</th> 
    <th>Computer Model</th>
    <th>Warranty Ends Date</th>
    <th>Problem Frequency</th>
    <th>Problem Description</th>
    <th colspan="2">Action</th>
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
        <td><button onclick="location.href='{{ route('manageRepairRequest.edit', $row->OrderID) }}'">Edit</button></td>
        <td><button onclick="location.href='{{ route('manageRepairRequest.destroy', $row->OrderID) }}'">Delete</button></td>
      </tr>
      @endforeach
      @endif
    </tbody>
</table>
</html>
@endsection
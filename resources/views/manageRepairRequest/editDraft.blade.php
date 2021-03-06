@extends('layouts.custapp')
@section('content')
<!DOCTYPE html>
<h2>Customer Edit Request Draft</h2>
<title>Customer Edit Request Draft</title>
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

<body>

@if(session()->get('key'))

        <h2>Please fill in the table below:</h2>
        <br>
        <table border = 0 align ="center">
            <tr>
            <td><button onclick="location.href='{{ route('manageRepairRequest.list',session()->get('key1')) }}'"> back</button></td>
            </tr>
        </table>
        
    <form method="post" action = "{{ route('manageRepairRequest.update', $data->OrderID) }}" >
        @csrf 
        <table border = 0 align ="center">
        
            <tr>
            <input type="hidden" name="custID" value="{{ $data->Customer_ID}}">
            <input type="hidden" name="orderstatus" value="{{ $data->Order_Status}}">    
            <input type="hidden" name="reason" value="{{ $data->Reason}}">
            <input type="hidden" name="estimatedCost" value="{{ $data->Estimated_Cost}}">
            <input type="hidden" name="confirmationStatus" value="{{ $data->Confirmation_Status }}">
                <td>Computer Owner:</td>
                <td><input type="text" name="compOwner" value="{{ $data->Comp_Owner}}" required></td>
            </tr>
            <tr>
                <td>Computer Model:</td>
                <td><input type="text" name="compModel" value="{{ $data->Comp_Model}}" required></td>
            </tr>
            <tr>
                <td>Date of Computer Warranty End:</td>
                <td><input type="date" name="warrantyDate" value="{{ $data->Warranty_Date}}" required></td>
            </tr>
            <tr>
                <td>Frequency of the problem happened:</td>
                <td><input type="integer" name="problemsFrequency" value="{{ $data->Problems_Frequency}}" required></td>
            </tr>
            <tr>
                <td>Problem's detail:</td>
                <td><textarea  name="problemsReported" rows="4" columns="50" required>{{ $data->Problems_Reported}}</textarea></td>
            </tr>
            <tr>
                <td>Do you want to submit this form?</td>
                <td>
                <select name="sendStatus" value ="2" value="{{ $data->Send_Status}}" required>
                        <option>SAVE AS DRAFT</option>
                        <option>SUBMIT</option> 
                </td>
            </tr>
            <tr>
                <td><button>submit</button></td>
            </tr>
            
@endif
        </table>
    </form>
</body>
</html>
@endsection
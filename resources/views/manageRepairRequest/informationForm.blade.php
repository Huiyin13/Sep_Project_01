@extends('layouts.custapp')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <title>Information Form Interface</title>
        <style>
            h1{
                text-align : center;
            }
        </style>
    </head> 
    <body>
    <table border = 0 align ="center">
            <tr>
            <td><button onclick="location.href='{{ route('manageRepairRequest.list',session()->get('key1')) }}'">
            View Request Draft</button></td>
            </tr>
    </table>
    @if(session()->get('key'))
        <h1>Please fill in the table below:</h1>
        <br>
        <form action ="submit" method="post">
        @csrf 
        <table border = 0 align ="center">
            <tr>
            <input type="hidden" name="custID" value="{{ session()->get('key1')}}">
            <input type="hidden" name="confirmationStatus" value="PENDING">
            <input type="hidden" name="orderstatus" value="PENDING">
                <td>Computer Owner:</td>
                <td><input type="text" name="compOwner" placeholder="Name" required></td>
            </tr>
            <tr>
                <td>Computer Model:</td>
                <td><input type="text" name="compModel" placeholder="Model's name" required></td>
            </tr>
            <tr>
                <td>Date of Computer Warranty End:</td>
                <td><input type="date" name="warrantyDate" required></td>
            </tr>
            <tr>
                <td>Frequency of the problem happened:</td>
                <td><input type="integer" name="problemsFrequency" placeholder="0-10" required></td>
            </tr>
            <tr>
                <td>Problem's detail:</td>
                <td><input type="text" name="problemsReported" placeholder="Description" required></td>
            </tr>
            <tr>
                <td>Do you want to submit this form?</td>
                <td>
                <select name="sendStatus" value ="2" placeholder ="Status" required>
                        <option>SAVE AS DRAFT</option>
                        <option>SUBMIT</option> 
                </td>
            </tr>
            <tr>
            <td><button >Submit</button</td>
            </tr>
            
        </table>
        </form>
    </body>
    @endif
</html>
@endsection
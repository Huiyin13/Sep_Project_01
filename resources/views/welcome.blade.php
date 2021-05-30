@extends('layouts.app')

@section('content')
<?php	
	session_start();
	
?>
<!DOCTYPE html> 
<html>
<head>
	<title>DCRSMS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .trapezoid {
	        /* border-top: 50px solid #555;
	        border-left: 25px solid transparent;
	        border-right: 25px solid transparent; */
	        height: 125px;
	        width: 125px;
        }
    </style>
</head>

<body>
    <center>
        <table style="text-align: center">
            <tr>
                <td><img src="/images/1.png" alt="Image 1" style="width:250px; height:250px"/></td>
                <td><img src="/images/2.png" alt="Image 2" style="width:250px; height:250px"/></td>
                <td><img src="/images/3.png" alt="Image 3" style="width:250px; height:250px"/></td>
                <td><img src="/images/4.png" alt="Image 4" style="width:250px; height:250px"/></td>
            </tr>
            <tr>
                <td>UPGARDE YOUR DEVICES</td>
                <td>SERVICES FOR PC</td>
                <td>SERVICES FOR LAPTOP</td>
                <td>REPAIR PRINTER</td>
            </tr>
        </table>
        <div class="trapezoid" style="background-color: #b3ffcc; width: 500px;">
            <a href="login">LOGIN</a> to send us a request. Does not have an account?   
            <br>
            <a href="register">SIGN UP</a> here
            <br>
            <p style="font-family:'Courier New'">Quality Repair, Fair Pricing.</p> 
        </div>
    </center>
</body>
</html>
@endsection
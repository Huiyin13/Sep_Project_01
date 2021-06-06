@extends('layouts.custapp')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Payment Successful</title>
    
    <style>
        .topmargin {
            margin-top: 5%;
        }
        .noborder {
            border: 10px;
        }

        .solid {
            border-style: solid;
            border-color: black;

        }

        th {
            width: 200px;
            padding: 20px;
            height: 35px;
            font-size: 20px;
            text-align: inherit;
        }

        td {
            width: 250px;
            padding: 20px;
            height: 35px;
            font-size: 20px;
        }
        
        .center {
            margin: auto;
            width: 60%;
            
            padding: 10px;
        }
    </style>
</head>

<body>

    <center>
    <div class="container topmargin">
        
        <br>       
            @foreach($info as $row)
            <table class="solid">
                <tr class="solid">
                    <td colspan="2">
                         <center><div style="font-size:large;"><h2>Payment Successful</h2></div></center>
                    </td>
                </tr>
                
                <tr>
                    <th>Order ID</th>
                    <td><input type="text" name="OrderID" value="{{$row->Customer_ID}}" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td><input type="text" name="total" value="{{$row->Payment_Amount}}" class="noborder" readonly></td>
                </tr>

                <tr>
                    <th>Payment Method</th>
                    <td><input type="text" name="paymentType" value="{{$row->Payment_Type}}" class="noborder" readonly></td>
                </tr>

                <tr>
                    <td colspan="2">
                    <center>
                    <a href="{{ route('manageRepairStatus.custViewAll', $row->Customer_ID)}}"><button class="btn btn-warning">Dismiss</button></a>                   
                    </center>
                    </td>
                </tr>
                
            </table>
            @endforeach
            
            
    </div>
</center>
</body>
</html>
@endsection
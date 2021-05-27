<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AZsNRTgEFaaoseMgYqd3BMUsEb9OTeFkkTX8ZmNYC5652wjkbSFfbUUwVN-KkLckK6GZMAuXoHImnfnR&currency=MYR&disable-funding=credit,card">
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.                                     
    </script>
    <title>Payment Method</title>
    
    <style>

        .topmargin {
            margin-top: 5%;
        }
        th {
            width: 275px;
            padding: 20px;
            height: 75px;
            font-size: 17px;
        }

        td {
            width: 350px;
            padding: 15px;
            height: 75px;
            font-size: 17px;
        }
        .noborder {
            border: 10px;

        }
        .solid {
            border-style: solid;
            border-color: black;

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
        <u style="font-size:large;"><h2>Payment Details</h2></u>
        <br>
            <table class="solid">
            @foreach ($info as $row)
            
                <tr class="solid">
                    <th class="solid">Customer Name :</th>
                    <td><input type="text" value="{{$row->Customer_Name}}" name="customerName" class="noborder" readonly size="30"></td>
                </tr>
                <tr class="solid">
                    <th class="solid">Customer Address :</th>
                    <td><input type="text" value="{{$row->Customer_Address}}" name="customerAddress" class="noborder" readonly size="30"></td>
                </tr>
                <tr class="solid">
                    <th class="solid">Total Price :</th>
                    <td><input type="text" value="{{$row->Estimated_Cost}}" name="estimatedCost" class="noborder" readonly></td>
                </tr>
            
                <tr>
                    <th rowspan="2" class="solid">Select Payment Method :</th>
                    <td>
                    
                    <form action="{{ route('ManagePayment.PaymentCOD')}}" method="post">
                        @csrf
                        <input type="hidden" name="customerID" value="{{$row->Customer_ID}}">
                        <input type="hidden" name="orderID" value="{{$row->OrderID}}">
                        <input type="hidden" name="customerName" value="{{$row->Customer_Name}}">
                        <input type="hidden" name="customerAddress" value="{{$row->Customer_Address}}">
                        <input type="hidden" name="paymentType" value="COD">
                        <input type="hidden" name="estimatedCost" value="{{$row->Estimated_Cost}}">
                        <button type="submit" class="btn btn-success" style="width: 100%; height: 10%">Cash On Delivery</button>
                    </form>
                    </td>
                </tr>

                <tr>
                    
                    <td>
                        <div id="paypal-button-container"></div>
                        <script>
                            paypal.Buttons({
                                createOrder: function(data, actions) {
                                // This function sets up the details of the transaction, including the amount and line item details.
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                currency_code: 'MYR',
                                                value: '{{$row->Estimated_Cost}}',
                                            },
                                            shipping: {
                                                name: {
                                                    full_name: '{{$row->Customer_Name}}'
                                                },
                                            address: {
                                                address_line_1: '{{$row->Customer_Address}}',
                                                address_line_2: 'unknown',
                                                admin_area_2: 'unknown',
                                                admin_area_1: 'unknown',
                                                postal_code: 'unknown',
                                                country_code: 'MY'
                                            }
                                            }
                                            
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    // This function captures the funds from the transaction.
                                    return actions.order.capture().then(function(details) {
                                        // This function shows a transaction success message to your buyer.
                                        alert('Transaction Successful!');
                                        window.location.href = "/PaymentStatusInterface/{{$row->Customer_ID}}/{{$row->OrderID}}/{{$row->Estimated_Cost}}/{{$row->Customer_Name}}/{{$row->Customer_Address}}";
                                    });
                                }
                            }).render('#paypal-button-container');
                            //This function displays Smart Payment Buttons on your web page.
                        </script>
                    </td>  
                   </tr>             
            </table>
            @endforeach
            
            
    </div>
</center>
</body>
</html>

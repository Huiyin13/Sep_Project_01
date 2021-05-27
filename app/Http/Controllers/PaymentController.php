<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use APP\Models\manageRepairStatusModel;
use App\Models\PaymentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentDetails(Request $req){
        $customerID = $req -> customerID;
        $orderID = $req->OrderID;
        $info = DB::select("select customers.Customer_ID, customers.Customer_Name, customers.Customer_Address, requestdetails.Estimated_Cost, requestdetails.OrderID
                            from customers join requestdetails on customers.Customer_ID = requestdetails.Customer_ID
                            where customers.Customer_ID = '$customerID' AND requestdetails.OrderID = '$orderID'");

        return view('ManagePayment.PaymentMethodInterface', compact('info'));
    
    }

    public function paymentCOD(Request $req){
        

        $orderID = $req->orderID;

        $payment = new PaymentModel;
        $payment -> Customer_ID = $req -> customerID;
        $payment -> Customer_Name = $req -> customerName;
        $payment -> Customer_Address = $req -> customerAddress;
        $payment -> OrderID = $orderID;
        $payment -> Payment_Type = $req->paymentType;
        $payment -> Payment_Amount = $req -> estimatedCost;
        $payment -> save();

        $updatePayment = DB::select("update requestdetails set Confirmation_Status = 1 where OrderID = '$orderID'");

        $info = DB::select("select * from payments where OrderID = '$orderID'");

        return view('ManagePayment.PaymentStatusInterface', compact('info'));
    }

    public function paymentPayPal($customerID, $orderID, $total, $customerName, $customerAddress){
        

        $payment = new PaymentModel;
        
        $payment -> Customer_ID = $customerID;
        $payment -> Customer_Name = $customerName;
        $payment -> Customer_Address = $customerAddress;
        $payment -> OrderID = $orderID;
        $payment -> Payment_Type = "PayPal";
        $payment -> Payment_Amount = $total;
        $payment -> save();

        $updatePayment = DB::select("update requestdetails set Confirmation_Status = 1 where OrderID = '$orderID'");

        $info = DB::select("select * from payments where OrderID = '$orderID'");

        return view('ManagePayment.PaymentStatusInterface', compact('info'));
    }

}

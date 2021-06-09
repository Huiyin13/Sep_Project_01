<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\manageRepairStatusModel;
use App\Models\PickUpDeliveryModel;

class PickUpDeliveryController extends Controller
{
    //customer view the pick up list
    public function custView($id)
    {
        $data = manageRepairStatusModel::where('Customer_ID', $id)->get();
        return view('ManagePickUpDeliver.CusDeliveryList', compact("data"));
    }
    //customer view delivery list which the delivery status already delivery to customer
    public function custDeliverView($id)
    {
        $data = PickUpDeliveryModel::where('Customer_ID', $id)->where('Status',"SuccessDeliver")->get();
        return view('ManagePickUpDeliver.CusDeliverList', compact("data"));
    }
    //customer view pickup detail when the customer choose the pick up 
    public function cusViewDetail ($id){
        $data = manageRepairStatusModel::findOrFail($id);
        return view('ManagePickUpDeliver.DeliveryDetail', compact("data"));
    }
    //customer view deliver detail which customer is choose
    public function cusDeliverDetail ($id){
        
        $data = PickUpDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.CusDeliverDetail', compact("data"));
    }

    //rider view pick up list which pick up list that already add with the customer
    public function riderViewPickList(){
        $data = PickUpDeliveryModel::where('Status', "Pending")->get();
        return view('ManagePickUpDeliver.PickUpList',['data'=>$data]);
    }

    //rider view pick up detail which choose by the rider 
    public function riderViewPickDetail($id){
        $data = PickUpDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.PickUpDetail', compact("data"));
    }

    // rider view delivery list which item already pick up successfully by the rider.
    public function riderViewDeliver(){
        $data = PickUpDeliveryModel::where('Status', "SuccessPick")->get();
        return view('ManagePickUpDeliver.DeliverList',['data'=>$data]);
    }

    //rider view delivery information of the order_ID, customer pickup address
    public function riderViewDeliverDetail($id){
        $data = PickUpDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.DeliverDetail', compact("data"));
    }

    //customer add pick up to database after order status is pending
    public function cusAddPickUp(Request $req){

        $data = new PickUpDeliveryModel;
        $data->Customer_ID = $req->Customer_ID;
        $data->OrderID = $req->OrderID;
        $data->PickUp_Date = $req->PickUp_Date;
        $data->PickUp_Time = $req->PickUp_Time;
        $data->PickUp_Add = $req->PickUp_Add;
        $data->Status = $req->Status;
        $data->save();
        $message = "Update is successful";
            echo "<script type='text/javascript'>alert('$message');</script>";

        return view('ManageAccount.CustomerMainPage');
    }

    //rider update pick up status after rider pick up the item from the customer 
    public function update(Request $req, $id){
            $validatedData = $req->validate([
                'Status' => 'required|max:255'
            ]);
            PickUpDeliveryModel::where('PickUpDeliver_ID', $id)->update($validatedData);
            $message = "Update status success";
            echo "<script type ='text/javascript'>alert('$message');</script>";
            $data = PickUpDeliveryModel::where('Status', "Pending")->get();
            return view('ManagePickUpDeliver.PickUpList',['data'=>$data]);
        
        
    }

    //rider update the delivery information after deliver the item to customer
    public function riderUpdateDeliver(Request $req, $id){
        $validatedData = $req->validate([
            'Status' => 'required|max:255',
            'Deliver_Add'  => 'required',
            'Deliver_Time' => 'required',
            'Deliver_Date' => 'required',
        ]);
        PickUpDeliveryModel::where('PickUpDeliver_ID', $id)->update($validatedData);
        $message = "Update status success";
        echo "<script type ='text/javascript'>alert('$message');</script>";
        $data = PickUpDeliveryModel::where('Status', "SuccessPick")->get();
        return view('ManagePickUpDeliver.PickUpList',['data'=>$data]);
    }

   /* public function riderEditTime(Request $req, $id){
        $validatedData = $req->validate([
            'Deliver_Time' => 'required|max:255',
        ]);
        PickUpDeliveryModel::where('PickUpDeliver_ID', $id)->update($validatedData);
    }

    public function riderEditDate(Request $req, $id){
        $validatedData = $req->validate([
            'Deliver_Date' => 'required|max:255',
        ]);
        PickUpDeliveryModel::where('PickUpDeliver_ID', $id)->update($validatedData);
    }*/


}

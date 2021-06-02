<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\manageRepairStatusModel;
use App\Models\PickUpDeliveryModel;

class PickUpDeliveryController extends Controller
{
    //customer view pick up list
    public function custView($id)
    {
        $data = manageRepairStatusModel::where('Customer_ID', $id)->get();
        return view('ManagePickUpDeliver.CusDeliveryList', compact("data"));
    }
    //customer view delivery list
    public function custDeliverView($id)
    {
        $data = PickUpDeliveryModel::where('Customer_ID', $id)->where('Status',"SuccessDeliver")->get();
        return view('ManagePickUpDeliver.CusDeliverList', compact("data"));
    }
    //customer view pickup detail
    public function cusViewDetail ($id){
        $data = manageRepairStatusModel::findOrFail($id);
        return view('ManagePickUpDeliver.DeliveryDetail', compact("data"));
    }
    //customer view deliver detail
    public function cusDeliverDetail ($id){
        
        $data = PickUpDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.CusDeliverDetail', compact("data"));
    }

    public function riderViewPickList(){
        $data = PickUpDeliveryModel::where('Status', "Pending")->get();
        return view('ManagePickUpDeliver.PickUpList',['data'=>$data]);
    }

    public function riderViewPickDetail($id){
        $data = PickUpDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.PickUpDetail', compact("data"));
    }

    public function riderViewDeliver(){
        $data = PickUpDeliveryModel::where('Status', "SuccessPick")->get();
        return view('ManagePickUpDeliver.DeliverList',['data'=>$data]);
    }

    public function riderViewDeliverDetail($id){
        $data = PickUpDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.DeliverDetail', compact("data"));
    }

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

        return view('ManagePickUpDeliver.CusDeliveryList');
    }

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\manageRepairStatusModel;
use App\Models\PickUpDeliveryModel;

class PickUpDeliveryController extends Controller
{
    
    public function riderViewPickList(){
        $data = manageRepairStatusModel::where('Order_Status', "Pending")->get();
        //$data = DB::table('requestdetails')->where('Order_Status','Pending')->get();
        return view('ManagePickUpDeliver.PickUpList',['data'=>$data]);
    }

    public function riderViewDeliver(){
        $data = manageRepairStatusModel::where('Order_Status', "Complete")->get();
        return view('ManagePickUpDeliver.DeliverList',['data'=>$data]);
    }

    public function custView($id)
    {
        $data = manageRepairStatusModel::where('Customer_ID', $id)->where('Order_Status', "Pending")->get();
        return view('ManagePickUpDeliver.CusDeliveryList', compact("data"));
    }

    public function cusViewDetail($id){
        $data = manageRepairStatusModel::findOrFail($id);
        return view('ManagePickUpDeliver.DeliveryDetail', compact("data"));
    }

    public function riderViewDetail(){
        $data = manageRepairRequestModel::findOrFail($id);
        return view('ManagePickUpDeliver.riderDetail', compact("data"));
    }

    public function riderViewPickDetail(){
        
    }
    /*public function cusAddPickUp(Request $req){
        $req->validate([
            'Customer_ID' => $data['Customer_ID'],
            'OrderID' => $data['OrderID'],
            'PickUp_Date' => $data['PickUp_Date'],
            'PickUp_Time' => $data['PickUp_Time'],
            'PickUp_Add' => $data['PickUp_Add'],
            'Status' => $data['Status'],
        ]);
        PickUpDeliveryModel::create($req->all());

        return redirect('/ManagePickUpDeliver.cuslist')->with('success', 'Repair Status is successfully updated');
    }*/

    public function cusAddPickUp(Request $req){

        $data = new PickUpDeliveryModel;
        $data->Customer_ID = $req->Customer_ID;
        $data->OrderID = $req->OrderID;
        $data->PickUp_Date = $req->PickUp_Date;
        $date->PickUp_Time = $req->PickUp_Time;
        $date->PickUp_Add = $req->PickUp_Add;
        $data->Status = $req->Status;
        $data->save();
        return view('ManagePickUpDeliver.testuse', compact("data"));
    }

    public function riderUpdatePickup(Request $req){
        
    }

    public function riderUpdateDeliver(){
        $data = PickUPDeliveryModel::findOrFail($id);
        return view('ManagePickUpDeliver.DeliverList', compact("data"));
    }

    public function riderEditTime(){
        $data = PickUPDeliveryModel::findOrFail($id);
    }

    public function riderEditDate(){
        $data = PickUPDeliveryModel::findOrFail($id);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manageRepairRequestModel;

class manageRepairRequestController extends Controller
{
    function requestdetail(Request $req){
        //print_r($detail->input());
        $detail = new manageRepairRequestModel;
        $detail->Customer_ID= $req->custID;
        $detail->Order_Status= $req->compOwner;
        $detail->Comp_Owner= $req->compOwner;
        $detail->Comp_Model = $req->compModel;
        $detail->Warranty_Date = $req->warrantyDate;
        $detail->Problems_Frequency = $req->problemsFrequency;
        $detail->Problems_Reported = $req->problemsReported;
        $detail->Reason = $req->reason;
        $detail->Estimated_Cost = $req->estimatedCost;
        $detail->Confirmation_Status = $req->confirmationStatus;
        $detail->Send_Status = $req->sendStatus;
        $detail->save();
    }

    //VIEW
    /*function list(){
        $data = manageRepairRequestModel::all();
        return view('manageRepairRequest.viewDraft',compact("data"));
    }*/

    //VIEW draft
    public function list($id)
    {
        $data = manageRepairRequestModel::where('Customer_ID', $id)->get();
        return view('manageRepairRequest.viewDraft', compact("data"));
    }
    //EDIT for drafting
    /*function editData($id){
        $data = manageRepairRequestModel::findOrFail($id);
        return view('manageRepairRequest.editDraft', compact("data"));
    }*/
}

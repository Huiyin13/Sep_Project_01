<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manageRepairRequestModel;

class manageRepairRequestController extends Controller
{
    function requestdetail(Request $req){
        //print_r($detail->input());
        $detail = new manageRepairRequestModel;
        $detail->Comp_Owner= $req->compOwner;
        $detail->Comp_Model = $req->compModel;
        $detail->Warranty_Date = $req->warrantyDate;
        $detail->Problems_Frequency = $req->problemsFrequency;
        $detail->Problems_Reported = $req->problemsReported;
        $detail->save();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manageRepairRequestModel;

class manageRepairRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    //VIEW draft
    public function list($id)
    {
        $data = manageRepairRequestModel::where('Customer_ID', $id)->get();
        return view('manageRepairRequest.viewDraft', compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = manageRepairRequestModel::findOrFail($id);
        return view('manageRepairRequest.editDraft', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $data = manageRepairRequestModel::findOrFail($id);    
        $data->Customer_ID= $req->custID;
            $data->Order_Status= $req->compOwner;
            $data->Comp_Owner= $req->compOwner;
            $data->Comp_Model = $req->compModel;
            $data->Warranty_Date = $req->warrantyDate;
            $data->Problems_Frequency = $req->problemsFrequency;
            $data->Problems_Reported = $req->problemsReported;
            $data->Reason = $req->reason;
            $data->Estimated_Cost = $req->estimatedCost;
            $data->Confirmation_Status = $req->confirmationStatus;
            $data->Send_Status = $req->sendStatus;
            $data->save();
        return redirect('request');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = manageRepairRequestModel::findOrFail($id); 
        $data->delete();
        return redirect('request');
    }
}

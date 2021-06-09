<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manageRepairStatusModel;
use Illuminate\Support\Facades\DB;

class manageRepairStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Using Resource Controller, Default Function Name Provided by Laravel
     //Function: displayAllCustOrderList() in SDD
     //To display all customer submitted repair request
    public function index()
    {
            $data = DB::table('requestdetails')
            ->join('customers', 'requestdetails.Customer_ID', '=', 'customers.Customer_ID')
            ->where('requestdetails.Send_Status', "SUBMIT")
            ->paginate(3);
        //$data = manageRepairStatusModel::where('Send_Status', "SUBMIT")->get();
        return view('manageRepairStatus.staffViewRequestedRepairList', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
    }

     //Function: searchOrder in SDD
     //To let staff search the customer order by using orderID
    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = DB::table('requestdetails')
            ->join('customers', 'requestdetails.Customer_ID', '=', 'customers.Customer_ID')
            ->where('requestdetails.OrderID', 'LIKE', '%' . $search. '%')
            ->paginate(3);
        //$data = manageRepairStatusModel::where('OrderID', 'like', '%' . $search. '%')->paginate(5);
        return view('manageRepairStatus.staffViewRequestedRepairList', compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //To display the update status form
    public function edit($id)
    {
        //
        $data = DB::table('requestdetails')
            ->join('customers', 'requestdetails.Customer_ID', '=', 'customers.Customer_ID')
            ->where('OrderID', $id)
            ->first();
        //$data = manageRepairStatusModel::findOrFail($id);
        return view('manageRepairStatus.staffUpdateRepairStatus', compact("data"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //Function: updateOrderStatus() in SDD
     //To allow staff update the repair status
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'Order_Status' => 'required|max:255',
            'Estimated_Cost' => 'required',
            'Reason' => 'required',
        ]);
        manageRepairStatusModel::where('OrderID', $id)->update($validatedData);
        return redirect('/manageRepairStatus')->with('success', 'Repair Status is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //Function: deleteOrder() in SDD
     //To delete repair request.
    public function destroy($id)
    {
        //
        $data = manageRepairStatusModel::find($id);
        $data->delete();
        return redirect('/manageRepairStatus')->with('success', 'Repair Record is Deleted');
    }

     //Function: displayOwnOrderList() in SDD
     //To display the current logged in customer submitted repair request
    public function custViewAll($id)
    {
        $data = manageRepairStatusModel::where('Customer_ID', $id)->where('Send_Status', "SUBMIT")->paginate(3);
        return view('manageRepairStatus.customerViewRequestedRepairList', compact("data"));
    }

    //Display confirmation form for customer
    public function custEdit($id)
    {
        //
        $data = manageRepairStatusModel::findOrFail($id);
        return view('manageRepairStatus.customerConfirmRepair', compact("data"));
    }

     //Function: updateConfirmationStatus() in SDD
     //To allow customer to confirm to continue repair
    public function custConfirm($id, $idtwo)
    {
        //
        manageRepairStatusModel::where('OrderID', $id)->update(array('Confirmation_Status' => 'CONFIRMED'));
        $data = manageRepairStatusModel::where('Customer_ID', $idtwo)->paginate(3);
        return view('manageRepairStatus.customerViewRequestedRepairList', compact("data"));
    }

    //Function: updateConfirmationStatus() in SDD
     //To allow customer to confirm to cancel repair
    public function custCancel($id, $idtwo)
    {
        //
        manageRepairStatusModel::where('OrderID', $id)->update(array('Confirmation_Status' => 'CANCELLED'));
        $data = manageRepairStatusModel::where('Customer_ID', $idtwo)->paginate(3);
        return view('manageRepairStatus.customerViewRequestedRepairList', compact("data"));
    }
}
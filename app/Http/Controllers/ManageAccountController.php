<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\staff;
use App\Models\customer;
use App\Models\rider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManageAccountController extends Controller
{
    public function selectProfile($id)
    {
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.CustomerProfileInterface', compact("data"));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.CustomerUpdateInterface', compact("data"));
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        $validatedPass = $request->Customer_Password;
        foreach($data as $data1){
            $data2 = $data1->Customer_Password;
        }
        if ( $validatedPass == $data2) {
            
            $validatedData = $request->validate([
                'Customer_Name' => 'required|max:255',
                'Customer_Phone' => 'required|max:255',
                'Customer_Email' => 'required|max:255',
                'Customer_Address' => 'required|max:255',

            ]);
            customer::where('Customer_ID', $id)->update($validatedData);
            $message = "Profile is successful updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.test');
        } 
        else {
            $data = customer::where('Customer_ID', $id)->get();
             $message = "Password INCORRECT please try again";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.CustomerUpdateInterface', compact("data"));
        }
    }

    
}

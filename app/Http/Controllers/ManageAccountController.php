<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\staff;
use App\Models\customer;
use App\Models\rider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ManageAccountController extends Controller
{
    //Customer
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
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            
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

 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword($id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.ChangePasswordInterface', compact("data"));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePass(Request $request, $id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        $validatedPass = $request->Customer_Passwordo;
        foreach($data as $data1){
            $data2 = $data1->Customer_Password;
        }
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            
            $validatedData = Hash::make($request->Customer_Password);
            
            DB::select("UPDATE customers set Customer_Password = '$validatedData' where Customer_ID = ?",[$id]);
            $data = customer::where('Customer_ID', $id)->get();
            $message = "Password is successful updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.CustomerProfileInterface', compact("data"));
        } 
        else {
            $data = customer::where('Customer_ID', $id)->get();
             $message = "Password INCORRECT please try again";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.ChangePasswordInterface', compact("data"));
        }
    }

    //Rider
    public function selectProfileR($id)
    {
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RiderProfileInterface', compact("data"));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfileR($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RiderUpdateInterface', compact("data"));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $validatedPass = $request->Rider_Password;
        foreach($data as $data1){
            $data2 = $data1->Rider_Password;
        }
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            
            $validatedData = $request->validate([
                'Rider_Name' => 'required|max:255',
                'Rider_Phone' => 'required|max:255',
                'Rider_Email' => 'required|max:255',
                'Rider_Address' => 'required|max:255',

            ]);
            rider::where('Rider_ID', $id)->update($validatedData);
            $message = "Profile is successful updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.test');
        } 
        else {
            $data = rider::where('Rider_ID', $id)->get();
             $message = "Password INCORRECT please try again";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RiderUpdateInterface', compact("data"));
        }
    }

 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePasswordR($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.ChangePasswordRInterface', compact("data"));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $validatedPass = $request->Rider_Passwordo;
        foreach($data as $data1){
            $data2 = $data1->Rider_Password;
        }
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            
            $validatedData = Hash::make($request->Rider_Password);
            
            DB::select("UPDATE riders set Rider_Password = '$validatedData' where Rider_ID = ?",[$id]);

            $data = rider::where('Rider_ID', $id)->get();
            $message = "Password is successful updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RiderProfileInterface', compact("data"));
        } 
        else {
            $data = rider::where('Rider_ID', $id)->get();
             $message = "Password INCORRECT please try again";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.ChangePasswordRInterface', compact("data"));
        }
    }

}


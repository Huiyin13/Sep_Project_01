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
            $message = "Profile is successful updated.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.CustomerProfileInterface', compact("data"));
        } 
        else {
            $data = customer::where('Customer_ID', $id)->get();
             $message = "Password incorrect please try again.";
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
        $length = strlen($request->Customer_Password);
        foreach($data as $data1){
            $data2 = $data1->Customer_Password;
        }
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            if($length>=8){
                $validatedData = Hash::make($request->Customer_Password);
            
                DB::select("UPDATE customers set Customer_Password = '$validatedData' where Customer_ID = ?",[$id]);
                $data = customer::where('Customer_ID', $id)->get();
                $message = "Password is successful updated.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return view('ManageAccount.CustomerProfileInterface', compact("data"));
            }
            else {
                $data = customer::where('Customer_ID', $id)->get();
                $message = "Minimum password length of eight (8) is required. ";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return view('ManageAccount.ChangePasswordInterface', compact("data"));
            }
           
        } 
        else {
            $data = customer::where('Customer_ID', $id)->get();
             $message = "Old password incorrect please try again.";
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
            $message = "Profile is successful updated.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RiderProfileInterface', compact("data"));
        } 
        else {
            $data = rider::where('Rider_ID', $id)->get();
             $message = "Password incorrect please try again.";
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
        $length = strlen($request->Rider_Password);
        foreach($data as $data1){
            $data2 = $data1->Rider_Password;
        }
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            if($length>=8){
                $validatedData = Hash::make($request->Rider_Password);
            
                DB::select("UPDATE riders set Rider_Password = '$validatedData' where Rider_ID = ?",[$id]);
    
                $data = rider::where('Rider_ID', $id)->get();
                $message = "Password is successful updated.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return view('ManageAccount.RiderProfileInterface', compact("data"));
            }
            else {
                $data = rider::where('Rider_ID', $id)->get();
                $message = "Minimum password length of eight (8) is required. ";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return view('ManageAccount.ChangePasswordRInterface', compact("data"));
            }
           
        } 
        else {
            $data = rider::where('Rider_ID', $id)->get();
             $message = "Old password incorrect please try again";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.ChangePasswordRInterface', compact("data"));
        }
    }
    
    //Staff-->Customer
    public function selectUserType()
    {
        
        $data = customer::all();
        return view('ManageAccount.CustomerListInterface', compact("data"));
    }
    
    public function search(Request $request)
    {
        $name = $request->search;
        $data = customer::where('Customer_Name', 'LIKE', '%'. $name .'%')->get();
        return view('ManageAccount.CustomerListInterface', compact("data"));
    }

    public function viewProfile($id)
    {
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.CustomerInformationInterface', compact("data"));
    }

    public function updateIC($id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.ICUpdateInterface', compact("data"));
    }

    public function updateICC(Request $request, $id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        $ic = $request->Customer_IC;
        $checkIC = is_numeric($ic);
        if ( $checkIC) {
            
            $validatedData = $request->validate([
                'Customer_IC' => 'required|int',

            ]);
            customer::where('Customer_ID', $id)->update($validatedData);
            $message = "Identification Card (IC) Number is successful updated.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.CustomerInformationInterface', compact("data"));
        } 
        else {
            $data = customer::where('Customer_ID', $id)->get();
             $message = "Identification Card (IC) Number only allow numerical input. ";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.CustomerUpdateInterface', compact("data"));
        }
    }

    public function banUser($id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.BanInformationInterface', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ban(Request $request, $id)
    {
        //
        
        $data = customer::where('Customer_ID', $id)->get();
        $data2 = staff::all();
        $reason = $request->Ban_Reason;
        $validatedPass = $request->Staff_Password;
        foreach($data2 as $data1){
            $data3 = $data1->Staff_Password;
        }
        $verify = password_verify($validatedPass,$data3);
        if ( $verify) {
        //if($validatedPass == $data1){
            
            
            DB::select("UPDATE customers set Ban_Reason = '$reason' , Customer_Status = 'BANNED' where Customer_ID = ?",[$id]);
            $data = customer::where('Customer_ID', $id)->get();
            $message = "User is banned.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.CustomerInformationInterface', compact("data"));
        } 
        else {
            $data = customer::where('Customer_ID', $id)->get();
             $message = "Password incorrect please try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.BanInformationInterface', compact("data"));
        }
    }

    //Staff-->Rider
    public function selectUserTypeR()
    {
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'APPROVED' OR Rider_Status = 'BANNED' OR Rider_Status = 'REJECTED' ");
        return view('ManageAccount.RiderListInterface', compact("data"));
    }
    
    public function searchR(Request $request)
    {
        $name = $request->search;
        $data = rider::where('Rider_Name', 'LIKE', '%'. $name .'%')->get();
        return view('ManageAccount.RiderListInterface', compact("data"));
    }

    public function viewProfileR($id)
    {
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RiderInformationInterface', compact("data"));
    }

    public function updateICR($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.ICUpdateRInterface', compact("data"));
    }

    public function updateICRR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $ic = $request->Rider_IC;
        $checkIC = is_numeric($ic);
        if ( $checkIC) {
            
            $validatedData = $request->validate([
                'Rider_IC' => 'required|int',

            ]);
            rider::where('Rider_ID', $id)->update($validatedData);
            $message = "Identification Card (IC) Number is successful updated.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RiderInformationInterface', compact("data"));
        } 
        else {
            $data = rider::where('Rider_ID', $id)->get();
             $message = "Identification Card (IC) Number only allow numerical input.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RiderInformationInterface', compact("data"));
        }
    }

    public function banUserR($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.BanInformationRInterface', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $data2 = staff::all();
        $reason = $request->Reason;
        $validatedPass = $request->Staff_Password;
        foreach($data2 as $data1){
            $data3 = $data1->Staff_Password;
        }
        $verify = password_verify($validatedPass,$data3);
        if ( $verify) {
            DB::select("UPDATE riders set Reason = '$reason' , Rider_Status = 'BANNED' where Rider_ID = ?",[$id]);
            $data = rider::where('Rider_ID', $id)->get();
            $message = "User is banned.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RiderInformationInterface', compact("data"));
        } 
        else {
            $data = rider::where('Rider_ID', $id)->get();
             $message = "Password incorrect please try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.BanInformationRInterface', compact("data"));
        }
    }

    //Staff-->Rider Registration
    public function viewRegister()
    {
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'PENDING'");
        return view('ManageAccount.RegistrationListInterface', compact("data"));
    }

    public function selectProfileRR($id)
    {
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RegisterInformationInterface', compact("data"));
    }

    public function approve($id)
    {
        //
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'PENDING'");
        rider::where('Rider_ID', $id)->update(array('Rider_Status' => 'APPROVED'));
        $message = "Rider registration approved.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return view('ManageAccount.RegistrationListInterface', compact("data"));
    }

    public function reject($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RejectRegistrationInterface', compact("data"));
    }

    public function rejectR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $reason = $request->Reason;
        DB::select("UPDATE riders set Reason = '$reason' , Rider_Status = 'REJECTED' where Rider_ID = ?",[$id]);
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'PENDING'");
        $message = "Rider registration rejected.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('ManageAccount.RegistrationListInterface', compact("data"));
        
        
    }
}


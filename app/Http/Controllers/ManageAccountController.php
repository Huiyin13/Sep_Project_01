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
    //TAN HUI YIN CB18136
    //Customer
    //Customer can view profile
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
    
    //Customer can go to edit profile page
    public function editProfile($id)
    {
        //Select specific customer profile
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

    //Customer can update profile
    public function update(Request $request, $id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        $validatedPass = $request->Customer_Password;
        foreach($data as $data1){
            $data2 = $data1->Customer_Password;
        }
        //Verified the password
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

    //Customer can go to change the password page
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

    //Customer can change the password
    public function changePass(Request $request, $id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        $validatedPass = $request->Customer_Passwordo;
        $length = strlen($request->Customer_Password);
        foreach($data as $data1){
            $data2 = $data1->Customer_Password;
        }
        //Verify the password
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            if($length>=8){
                //Encrypt the password
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
    //Rider can view the profile
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

    //Rider can go to edit profile page
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
    //

    //Rider can update the profile
    public function updateR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $validatedPass = $request->Rider_Password;
        foreach($data as $data1){
            $data2 = $data1->Rider_Password;
        }
        //Verify the password
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

    //Rider can go to the change password interface
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

    //Rider can change the password
    public function changePassR(Request $request, $id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        $validatedPass = $request->Rider_Passwordo;
        $length = strlen($request->Rider_Password);
        foreach($data as $data1){
            $data2 = $data1->Rider_Password;
        }
        //Verify the password
        $verify = password_verify($validatedPass,$data2);
        if ( $verify) {
            if($length>=8){
                //Encrypt the password
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
    //Display the customer list
    public function selectUserType()
    {
        
        $data = customer::all();
        return view('ManageAccount.CustomerListInterface', compact("data"));
    }

    //Staff can search the customer by using customer name
    public function search(Request $request)
    {
        $name = $request->search;
        $data = customer::where('Customer_Name', 'LIKE', '%'. $name .'%')->get();
        return view('ManageAccount.CustomerListInterface', compact("data"));
    }

    //Staff can select a customer to view the customer profile
    public function viewProfile($id)
    {
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.CustomerInformationInterface', compact("data"));
    }

    //Staff go to update customer IC number page
    public function updateIC($id)
    {
        //
        $data = customer::where('Customer_ID', $id)->get();
        return view('ManageAccount.ICUpdateInterface', compact("data"));
    }

    //Staff update customer IC number 
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
            return view('ManageAccount.CustomerInformationInterface', compact("data"));
        }
    }

    //Staff go to ban customer page
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

     //Staff ban the customer
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
    //Display the rider list
    public function selectUserTypeR()
    {
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'APPROVED' OR Rider_Status = 'BANNED' OR Rider_Status = 'REJECTED' ");
        return view('ManageAccount.RiderListInterface', compact("data"));
    }
    
    //Staff can search the rider by using rider name    
    public function searchR(Request $request)
    {
        $name = $request->search;
        $data = rider::where('Rider_Name', 'LIKE', '%'. $name .'%')->where('Rider_Status', "BANNED")->orWhere('Rider_Status', "APPROVED")->orWhere('Rider_Status', "REJECTED")->get();
        return view('ManageAccount.RiderListInterface', compact("data"));
    }
    
    //Staff can select a rider to view rider profile
    public function viewProfileR($id)
    {
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RiderInformationInterface', compact("data"));
    }

    //Staff go to the update rider IC page
    public function updateICR($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.ICUpdateRInterface', compact("data"));
    }

    //Staff update the rider IC number
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

    //Staff go to ban rider page
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

     //Staff can ban the rider
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
    //Display the rider registration list
    public function viewRegister()
    {
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'PENDING'");
        return view('ManageAccount.RegistrationListInterface', compact("data"));
    }

    //Staff select a rider profile to view in the registration list
    public function selectProfileRR($id)
    {
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RegisterInformationInterface', compact("data"));
    }

    //Staff can approve the rider registration
    public function approve($id)
    {
        //
        $data = DB::select("SELECT * FROM riders WHERE Rider_Status = 'PENDING'");
        rider::where('Rider_ID', $id)->update(array('Rider_Status' => 'APPROVED'));
        $message = "Rider registration approved.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return view('ManageAccount.RegistrationListInterface', compact("data"));
    }

    //Staff go to the reject rider registration page
    public function reject($id)
    {
        //
        $data = rider::where('Rider_ID', $id)->get();
        return view('ManageAccount.RejectRegistrationInterface', compact("data"));
    }

    //Staff can reject the rider registration
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


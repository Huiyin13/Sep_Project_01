<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Newly added controller 
// use App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\customer;
use App\Models\rider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ManageRegistrationController extends Controller
{
    // Default
    use RegistersUsers;

    /** Default
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /** Default and newly added middleware for customer and rider 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:customer');
        $this->middleware('guest:rider');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCustomerRegisterForm()
    {
        return view('ManageRegistration/CustRegistration', ['url' => 'customer']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRiderRegisterForm()
    {
        return view('ManageRegistration/RiderRegistration', ['url' => 'rider']);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function custreg(Request $request)
    {
        $data = new customer;
        $validatedPass = $request->Customer_Password;
        $data2 = $request->Customer_Password_confirmation;
        
        if ($validatedPass == $data2) {
            $var = new customer; 
            $var->Customer_Name = $request->Customer_Name;
            $var->Customer_IC = $request->Customer_IC;
            $var->Customer_Email = $request->Customer_Email;
            $var->Customer_Address = $request->Customer_Address;
            $var->Customer_Phone = $request->Customer_Phone;
            $var->Customer_Password = Hash::make($request->Customer_Password);
            $var->save();
            return redirect()->intended('auth/CustLogin');  
        } 
        return redirect()->back()->with('message', 'The password confirmation does not match.');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function riderreg(Request $request)
    {
        $data = new rider;
        $validatedPass = $request->Rider_Password;
        $data2 = $request->Rider_Password_confirmation;
        
        if ($validatedPass == $data2) {
            $Rider_Name = $request->Rider_Name;
            $Rider_IC = $request->Rider_IC;
            $Rider_Email = $request->Rider_Email;
            $Rider_Phone = $request->Rider_Phone;
            $Rider_Address = $request->Rider_Address;
            $Rider_IC_Photo = $request->file('Rider_IC_Photo');
    	    $imageIC = time().'.'.$Rider_IC_Photo->getClientOriginalExtension();
    	    $Rider_IC_Photo->move(public_path('images/IC'),$imageIC);
            $Rider_Licence = $request->file('Rider_Licence');
    	    $imageLicence = time().'.'.$Rider_Licence->getClientOriginalExtension();
    	    $Rider_Licence->move(public_path('images/Licence'),$imageLicence);
            $Rider_Password = $request->Rider_Password;

            $var = new rider; 
            $var->Rider_Name = $Rider_Name;
            $var->Rider_IC = $Rider_IC;
            $var->Rider_Email = $Rider_Email;
            $var->Rider_Phone = $Rider_Phone;
            $var->Rider_Address = $Rider_Address;
            $var->Rider_IC_Photo = $imageIC;
            $var->Rider_Licence = $imageLicence;
            $var->Rider_Password = Hash::make($Rider_Password);
            $var->save();
            return redirect()->intended('auth/RiderLogin');  
        } 
        return redirect()->back()->with('message', 'The password confirmation does not match.');
    }
}

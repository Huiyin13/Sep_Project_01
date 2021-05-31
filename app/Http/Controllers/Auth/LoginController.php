<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// Added
use Auth; 
use Illuminate\Http\Request; 
use App\Models\customer; 
use App\Models\rider; 
use App\Models\staff; 

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:customer')->except('logout');
        $this->middleware('guest:rider')->except('logout');
        $this->middleware('guest:staff')->except('logout');
    }

    public function showCustomerLoginForm()
    {
        return view('auth.CustLogin', ['url' => 'customer']);
    }

    public function customerLogin(Request $request)
    {
        $id = $request->Customer_Email; 
        $data = customer::where('Customer_Email', $id)->get();
        $validatedEmail = $request->Customer_Email;
        $validatedPass = $request->Customer_Password;
        foreach($data as $data2){
            $data3 = $data2->Customer_Email; 
            $data4 = $data2->Customer_Password; 
            $data5 = $data2->Customer_Name; 
        }
        
        $verify = password_verify($validatedPass,$data4);
        if($validatedEmail == $data3 && $verify){
            $validatedData = $request->validate([
                'Customer_Email'   => 'required|email',
                'Customer_Password' => 'required|min:8'
            ]);
            session(['key' => $data5]);
            $value = session('key');
            return view('/ManageAccount/CustomerMainPage', compact(['data']));
        }
        return redirect()->back()->with('message', 'The email and password does not match.');
    }

    public function showRiderLoginForm()
    {
        return view('auth.RiderLogin', ['url' => 'rider']);
    }

    public function riderLogin(Request $request)
    {
        $id = $request->Rider_Email; 
        $data = rider::where('Rider_Email', $id)->get();
        $validatedEmail = $request->Rider_Email;
        $validatedPass = $request->Rider_Password;
        foreach($data as $data2){
            $data3 = $data2->Rider_Email; 
            $data4 = $data2->Rider_Password; 
            $data5 = $data2->Rider_Name; 
        }
        $verify = password_verify($validatedPass,$data4);
        if($validatedEmail == $data3 && $verify){
            $validatedData = $request->validate([
                'Rider_Email'   => 'required|email',
                'Rider_Password' => 'required|min:8'
            ]);
            session_start();
            session(['key' => $data5]);
            $value = session('key');
            return view('/ManageAccount/RiderMainPage', compact(['data']));
        }
        return redirect()->back()->with('message', 'The email and password does not match.');
    }

    public function showStaffLoginForm()
    {
        return view('auth.StaffLogin', ['url' => 'staff']);
    }

    public function staffLogin(Request $request)
    {
        $id = $request->Staff_Name; 
        $data = staff::all();
        $validatedName = $request->Staff_Name;
        $validatedPass = $request->Staff_Password;
        foreach($data as $data2){
            $data3 = $data2->Staff_Name; 
            $data4 = $data2->Staff_Password;
        }
        $verify = password_verify($validatedPass,$data4);

        if($validatedName == $data3 && $verify){
            $validatedData = $request->validate([
                'Staff_Name'   => 'required',
                'Staff_Password' => 'required|min:8'
            ]);
            session_start();
            session(['key' => $data3]);
            $value = session('key');
            
            return view('/ManageAccount/UserTypeInterface', compact(['data']));
        }
        return redirect()->back()->with('message', 'The email and password does not match.');
    }
}

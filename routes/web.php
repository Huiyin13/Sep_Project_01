<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// default
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//manage repair Request
Route::get('/infoForm', function () {//create request
    return view('manageRepairRequest.informationForm');
});
Route::post('submit','manageRepairRequestController@create');//create request

Route::get('request', function () {//main page
    return view('manageRepairRequest.requestMain');
});

Route::get('/manageRepairRequest/{id}/list', 'manageRepairRequestController@list')->name('manageRepairRequest.list');//viewDraft
Route::get('/manageRepairRequest/{id}/edit', 'manageRepairRequestController@edit')->name('manageRepairRequest.edit');//editDraft
Route::post('/manageRepairRequest/{id}/update', 'manageRepairRequestController@update')->name('manageRepairRequest.update');//updateDraft
Route::get('/manageRepairRequest/{id}/destroy', 'manageRepairRequestController@destroy')->name('manageRepairRequest.destroy');//deleteDraft
Route::get('/manageRepairRequest/{id}/sort', 'manageRepairRequestController@sort')->name('manageRepairRequest.sort');//sortDraft
Route::get('/manageRepairRequest/statuschart', 'manageRepairRequestController@index')->name('manageRepairRequest.index');//chart page
//Route::get('/statuschart', 'manageRepairRequestController@index');//chart page
Route::get('app2', function () {//echart page
    return view('layouts.app2');
});

//manage request Status
Route::get('testingindex', function () {
    return view('manageRepairStatus.testindex');
});

Route::get('/manageRepairStatus/search', 'manageRepairStatusController@search')->name('manageRepairStatus.search');
Route::get('/manageRepairStatus/{id}/custViewAll', 'manageRepairStatusController@custViewAll')->name('manageRepairStatus.custViewAll');
Route::get('/manageRepairStatus/{id}/custEdit', 'manageRepairStatusController@custEdit')->name('manageRepairStatus.custEdit');
Route::get('/manageRepairStatus/{id}/{idtwo}/custConfirm', 'manageRepairStatusController@custConfirm')->name('manageRepairStatus.custConfirm');
Route::get('/manageRepairStatus/{id}/{idtwo}/custCancel', 'manageRepairStatusController@custCancel')->name('manageRepairStatus.custCancel');
Route::resource('manageRepairStatus', 'manageRepairStatusController');

// Route for Manage Registration
Route::get('/ManageRegistration/CustRegistration', 'ManageRegistrationController@showCustomerRegisterForm');
Route::get('/ManageRegistration/RiderRegistration', 'ManageRegistrationController@showRiderRegisterForm');

Route::post('/register/customer', 'ManageRegistrationController@custreg');
Route::post('/register/rider', 'ManageRegistrationController@riderreg');

// Route for login 
// Customer 
Route::get('/auth/CustLogin', 'Auth\LoginController@showCustomerLoginForm');
Route::post('/login/customer', 'Auth\LoginController@customerLogin');
Route::get('customer', function () {
    return view('customer');
});

// Rider 
Route::get('/auth/RiderLogin', 'Auth\LoginController@showRiderLoginForm');
Route::post('/login/rider', 'Auth\LoginController@riderLogin');
Route::get('rider', function () {
    return view('rider');
});

// Staff 
Route::get('/auth/StaffLogin', 'Auth\LoginController@showStaffLoginForm');
Route::post('/login/staff', 'Auth\LoginController@staffLogin');
Route::get('staff', function () {
    return view('staff');
});

// Link to main page for each user 
// Customer 
Route::get('/ManageAccount/CustomerMainPage', function () {
    return view('/ManageAccount/CustomerMainPage');
});

// Rider
Route::get('/ManageAccount/RiderMainPage', function () {
    return view('/ManageAccount/RiderMainPage');
});

// Staff 
Route::get('/ManageAccount/UserTypeInterface', function () {
    return view('/ManageAccount/UserTypeInterface');
});

//Route For Manage Account
Route::get('test', function () {
    return view('ManageAccount.test');
});
//Customer
Route::get('/ManageAccount/{id}/selectProfile', 'ManageAccountController@selectProfile')->name('ManageAccount.selectProfile');//View Profile
Route::get('/ManageAccount/{id}/editProfile', 'ManageAccountController@editProfile')->name('ManageAccount.editProfile');//Edit Profile
Route::post('/ManageAccount/{id}/update', 'ManageAccountController@update')->name('ManageAccount.update');//Update Infomation
Route::get('/ManageAccount/{id}/changePassword', 'ManageAccountController@changePassword')->name('ManageAccount.changePassword');//Change Password
Route::get('/ManageAccount/{id}/changePass', 'ManageAccountController@changePass')->name('ManageAccount.changePass');//Update Password
//Rider
Route::get('/ManageAccount/{id}/selectProfileR', 'ManageAccountController@selectProfileR')->name('ManageAccount.selectProfileR');//View Profile
Route::get('/ManageAccount/{id}/editProfileR', 'ManageAccountController@editProfileR')->name('ManageAccount.editProfileR');//Edit Profile
Route::post('/ManageAccount/{id}/updateR', 'ManageAccountController@updateR')->name('ManageAccount.updateR');//Update Infomation
Route::get('/ManageAccount/{id}/changePasswordR', 'ManageAccountController@changePasswordR')->name('ManageAccount.changePasswordR');//Change Password
Route::get('/ManageAccount/{id}/changePassR', 'ManageAccountController@changePassR')->name('ManageAccount.changePassR');//Update Password
//Route::resource('ManageAccount', 'ManageAccountController');
//Staff
//-->Customer
Route::get('/ManageAccount/search','ManageAccountController@search');//Search 
//Route::get('/ManageAccount/search', 'ManageAccountController@search')->name('ManageAccount.search');//Search 
Route::get('/ManageAccount/selectUserType', 'ManageAccountController@selectUserType');//View List
Route::get('/ManageAccount/{id}/viewProfile', 'ManageAccountController@viewProfile')->name('ManageAccount.viewProfile');//View Profile
Route::get('/ManageAccount/{id}/updateIC', 'ManageAccountController@updateIC')->name('ManageAccount.updateIC');//Edit IC
Route::post('/ManageAccount/{id}/updateICC', 'ManageAccountController@updateICC')->name('ManageAccount.updateICC');//Update IC
Route::get('/ManageAccount/{id}/banUser', 'ManageAccountController@banUser')->name('ManageAccount.banUser');//Ban 
Route::put('/ManageAccount/{id}/ban', 'ManageAccountController@ban')->name('ManageAccount.ban');//Ban Update 
//Staff
//-->Rider
Route::get('/ManageAccount/searchR','ManageAccountController@searchR');//Search 
//Route::get('/ManageAccount/searchR', 'ManageAccountController@searchR')->name('ManageAccount.searchR');//Search 
Route::get('/ManageAccount/selectUserTypeR', 'ManageAccountController@selectUserTypeR');//View List
Route::get('/ManageAccount/{id}/viewProfileR', 'ManageAccountController@viewProfileR')->name('ManageAccount.viewProfileR');//View Profile
Route::get('/ManageAccount/{id}/updateICR', 'ManageAccountController@updateICR')->name('ManageAccount.updateICR');//Edit IC
Route::post('/ManageAccount/{id}/updateICRR', 'ManageAccountController@updateICRR')->name('ManageAccount.updateICRR');//Update IC
Route::get('/ManageAccount/{id}/banUserR', 'ManageAccountController@banUserR')->name('ManageAccount.banUserR');//Ban 
Route::put('/ManageAccount/{id}/banR', 'ManageAccountController@banR')->name('ManageAccount.banR');//Ban Update 
//Staff
//-->Register
Route::get('/ManageAccount/viewRegister', 'ManageAccountController@viewRegister');//View List
Route::get('/ManageAccount/{id}/selectProfileRR', 'ManageAccountController@selectProfileRR')->name('ManageAccount.selectProfileRR');//View Register Infomation
Route::get('/ManageAccount/{id}/approve', 'ManageAccountController@approve')->name('ManageAccount.approve');//Approve Registration
Route::get('/ManageAccount/{id}/reject', 'ManageAccountController@reject')->name('ManageAccount.reject');//Reject Registration
Route::get('/ManageAccount/{id}/rejectR', 'ManageAccountController@rejectR')->name('ManageAccount.rejectR');//Reject Registration

//Route for Manage PickUP and Delivery
Route::get('pickupdelivery',function(){
    return view('ManagePickUpDeliver.testuse');
});
Route::get('/riderViewPickList','PickUpDeliveryController@riderViewPickList')->name('ManagePickUpDeliver.riderPk');
Route::get('/ViewPick/{id}/View','PickUpDeliveryController@riderViewPickDetail')->name('ManagePickUpDeliver.riderDetail');
Route::post('/ViewPick/{id}/update','PickUpDeliveryController@update')->name('ManagePickUpDeliver.update');

Route::get('/riderViewDeliver','PickUpDeliveryController@riderViewDeliver')->name('ManagePickUpDeliver.riderDv');
Route::get('/riderViewDeliver/{id}/View','PickUpDeliveryController@riderViewDeliverDetail')->name('ManagePickUpDeliver.riderDeliver');
Route::post('/riderViewDeliver/{id}/riderUpdateDeliver','PickUpDeliveryController@riderUpdateDeliver')->name('ManagePickUpDeliver.riderUpdateDeliver');


Route::post('/riderViewDeliver/{id}/riderEditDate','PickUpDeliveryController@riderEditDate')->name('ManagePickUpDeliver.riderEditDate');
Route::post('/riderViewDeliver/{id}/riderEditTime','PickUpDeliveryController@riderEditTime')->name('ManagePickUpDeliver.riderEditTime');

Route::get('/cusViewDelivery/{id}','PickUpDeliveryController@custView')->name('ManagePickUpDeliver.cuslist');
Route::get('/custDeliverView/{id}','PickUpDeliveryController@custDeliverView')->name('ManagePickUpDeliver.custDeliverView');

//Customer View PickUp Detail
Route::get('/cusViewDelivery/{id}/cusViewDetail','PickUpDeliveryController@cusViewDetail')->name('ManagePickUpDeliver.cusViewDetail');
Route::get('/CusDetail/{id}/CusDeliverDetail','PickUpDeliveryController@CusDeliverDetail')->name('ManagePickUpDeliver.CusDeliverDetail');

Route::post('/CusViewDetail/{id}/add','PickUpDeliveryController@cusAddPickUp')->name('ManagePickUpDeliver.add');
Route::post('add','PickUpDeliveryController@cusAddPickUp');

//Route for Manage Payment
Route::get('button', function () {
    return view('ManagePayment.Button');
});
    Route::post('/ManagePayment/paymentDetails','PaymentController@paymentDetails')->name('ManagePayment.Payment1');

    Route::post('/ManagePayment/paymentCOD','PaymentController@paymentCOD')->name('ManagePayment.PaymentCOD');
    
    Route::get("/PaymentStatusInterface/{customerID}/{orderID}/{estimatedCost}/{customerName}/{customerAddress}", 'PaymentController@paymentPayPal');

    


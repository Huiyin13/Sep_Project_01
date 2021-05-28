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
Route::get('/statuschart', 'manageRepairRequestController@index');//chart page
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

//Route For Manage Account
//Customer
Route::get('/ManageAccount/{id}/selectProfile', 'ManageAccountController@selectProfile')->name('ManageAccount.selectProfile');
Route::get('/ManageAccount/{id}/editProfile', 'ManageAccountController@editProfile')->name('ManageAccount.editProfile');
Route::post('/ManageAccount/{id}/update', 'ManageAccountController@update')->name('ManageAccount.update');
Route::get('/ManageAccount/{id}/changePassword', 'ManageAccountController@changePassword')->name('ManageAccount.changePassword');
Route::get('/ManageAccount/{id}/changePass', 'ManageAccountController@changePass')->name('ManageAccount.changePass');
//Rider
Route::get('/ManageAccount/{id}/selectProfileR', 'ManageAccountController@selectProfileR')->name('ManageAccount.selectProfileR');
Route::get('/ManageAccount/{id}/editProfileR', 'ManageAccountController@editProfileR')->name('ManageAccount.editProfileR');
Route::post('/ManageAccount/{id}/updateR', 'ManageAccountController@updateR')->name('ManageAccount.updateR');
Route::get('/ManageAccount/{id}/changePasswordR', 'ManageAccountController@changePasswordR')->name('ManageAccount.changePasswordR');
Route::get('/ManageAccount/{id}/changePassR', 'ManageAccountController@changePassR')->name('ManageAccount.changePassR');
Route::resource('ManageAccount', 'ManageAccountController');
Route::get('test', function () {
    return view('ManageAccount.test');
});


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

    


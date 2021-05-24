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
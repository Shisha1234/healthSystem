<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin/user', 'UserController@index');
Route::put('regPat/{PatientId}', 'regPatientsController@change')->name('change');
Route::resource('regPat', 'regPatientsController',['names'=>[
    'create'=>'regCreate',
    'edit'=>'regEdit',
]]);
Route::get('check/summary', 'precheckController@summary')->name('summary');
Route::resource('check', 'precheckController');
Route::get('diagnosis/cleared', 'treatmentController@cleared')->name('cleared');
Route::resource('diagnosis', 'treatmentController');
Route::get('labResults/summary', 'labResultsController@summary')->name('summary');
Route::resource('labResults', 'labResultsController');
Route::resource('insure', 'insurancesController');
Route::resource('dawa', 'medController');
Route::get('drugs/payments/details', 'medicationController@details')->name('details');
Route::get('drugs/payments/payscript', 'medicationController@payscript')->name('payscript');
Route::put('drugs/payments/{paymentId}', 'medicationController@processpay')->name('drugs.payments.processpay');
Route::get('drugs/payments/{paymentId}/payment', 'medicationController@payment')->name('payment');
Route::resource('drugs', 'medicationController');
//Route::post('drugs/fetch', 'medicationController@fetch')->name('dynamicdependent.fetch');
//Route::post('drugs/{drug}/edit/fetch', 'medicationController@fetch')->name('dynamicdependent.fetch');
//Route::post('drugs/fetch', 'medicationController@fetch')->name('dynamicdependent.fetch');
Route::get('verify/{token}', 'VerifyController@verify')->name('verify');
Route::get('/regPat/create/action', 'regPatientsController@action')->name('regPat/create.action');
Route::group(['middleware' => ['isVerified']], function () {
    // …
});
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');
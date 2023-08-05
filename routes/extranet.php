<?php
/**
 * Created by PhpStorm.
 * User: Sir Kov
 * Date: 05/02/2019
 * Time: 09:07
 */

//User::Routes
Route::get('user/', 'UserController@index')->name('indexUser');
Route::get('user/create/', 'UserController@create')->name('createUser');
Route::post('user/store/', 'UserController@store')->name('storeUser');
Route::get('user/edit/{id}', 'UserController@edit')->name('editUser');
Route::put('user/update/{id}', 'UserController@update')->name('updateUser');
Route::any('user/delete/{id}', 'UserController@delete')->name('deleteUser');
Route::get('user/show/{id}', 'UserController@show')->name('showUser');
Route::post('user/toggleactive/', 'UserController@toggleActive')->name('toggleActiveUser');

//Reservation::Routes
//Route::resource('reservation', 'ReservationController');
Route::get('reservation/', 'ReservationController@index')->name('indexReservation');
Route::middleware('extranet.auth')->get('reservation/create/{customerId?}/{carId?}', 'ReservationController@create')->name('createReservation');
Route::post('reservation/store', 'ReservationController@store')->name('storeReservation');
Route::get('reservation/edit/{id}', 'ReservationController@edit')->name('editReservation');
Route::put('reservation/update/{id}', 'ReservationController@update')->name('updateReservation');
Route::any('reservation/delete/{id}', 'ReservationController@delete')->name('deleteReservation');
Route::get('reservation/show/{id}', 'ReservationController@show')->name('showReservation');

//Leasing::Routes
//Route::resource('leasing', 'LeasingController');
Route::get('leasing/', 'LeasingController@index')->name('indexLeasing');
Route::middleware('extranet.auth')->get('leasing/create/{customerId?}/{carId?}', 'LeasingController@create')->name('createLeasing');
Route::post('leasing/store', 'LeasingController@store')->name('storeLeasing');
Route::get('leasing/edit/{id}', 'LeasingController@edit')->name('editLeasing');
Route::put('leasing/update/{id}', 'LeasingController@update')->name('updateLeasing');
Route::any('leasing/delete/{id}', 'LeasingController@delete')->name('deleteLeasing');
Route::get('leasing/show/{id}', 'LeasingController@show')->name('showLeasing');

//Invoice::Routes
//Route::resource('invoice', 'InvoiceController');
Route::get('invoice/', 'InvoiceController@index')->name('indexInvoice');
Route::post('invoice/store', 'InvoiceController@store')->name('storeInvoice');
Route::get('invoice/create', 'InvoiceController@create')->name('createInvoice');
Route::get('invoice/edit', 'InvoiceController@edit')->name('editInvoice');
Route::any('invoice/preview/{id}/{mode}/{type}', 'InvoiceController@preview')->name('previewInvoice');
Route::any('invoice/getdatas/{id}/{mode}/{type}', 'InvoiceController@getJsonDatas')->name('getdatasInvoice');
Route::post('https://paygateglobal.com/api/v1/pay', 'InvoiceController@getResponse')->name('getResponse');
Route::any('invoice/download/{id}/{mode}/{type}', 'InvoiceController@download')->name('downloadInvoice');

//Customer::Routes
Route::get('customer/{type}', 'CustomerController@index')->name('indexCustomer');
Route::get('customer/create/{type}', 'CustomerController@create')->name('createCustomer');
Route::post('customer/store/{type}', 'CustomerController@store')->name('storeCustomer');
Route::get('customer/edit/{id}/{type}', 'CustomerController@edit')->name('editCustomer');
Route::put('customer/update/{id}/{type}', 'CustomerController@update')->name('updateCustomer');
Route::any('customer/delete/{id}/{type}', 'CustomerController@delete')->name('deleteCustomer');
Route::get('customer/show/{id}/{type}', 'CustomerController@show')->name('showCustomer');



<?php
/**
 * Created by PhpStorm.
 * User: Sir Kov
 * Date: 05/02/2019
 * Time: 09:07
 */


//Customer::Routes
Route::get('customer/{type}', 'CustomerController@index')->name('indexCustomer');
Route::get('customer/create/{type}', 'CustomerController@create')->name('createCustomer');
Route::post('customer/store/{type}', 'CustomerController@store')->name('storeCustomer');
Route::get('customer/edit/{id}/{type}', 'CustomerController@edit')->name('editCustomer');
Route::put('customer/update/{id}/{type}', 'CustomerController@update')->name('updateCustomer');
Route::any('customer/delete/{id}/{type}', 'CustomerController@delete')->name('deleteCustomer');
Route::get('customer/show/{id}/{type}', 'CustomerController@show')->name('showCustomer');

//Car::Routes
Route::resource('car', 'CarController');
Route::get('car/', 'CarController@index')->name('indexCar');
Route::get('car/create', 'CarController@create')->name('createCar');
Route::post('car/store', 'CarController@store')->name('storeCar');
Route::get('car/edit/{id}', 'CarController@edit')->name('editCar');
Route::put('car/update/{id}', 'CarController@update')->name('updateCar');
Route::any('car/delete/{id}', 'CarController@delete')->name('deleteCar');
Route::get('car/show/{id}', 'CarController@show')->name('showCar');
Route::post('car/toggleactive/', 'CarController@toggleActive')->name('toggleActiveCar');
Route::post('car/toggleavailable/', 'CarController@toggleAvailable')->name('toggleAvailableCar');

//Reservation::Routes
Route::resource('reservation', 'ReservationController');
Route::get('reservation/', 'ReservationController@index')->name('indexReservation');
Route::get('reservation/create/{id?}/{el?}', 'ReservationController@create')->name('createReservation');
Route::post('reservation/store', 'ReservationController@store')->name('storeReservation');
Route::get('reservation/edit/{id}', 'ReservationController@edit')->name('editReservation');
Route::put('reservation/update/{id}', 'ReservationController@update')->name('updateReservation');
Route::any('reservation/delete/{id}', 'ReservationController@delete')->name('deleteReservation');
Route::get('reservation/show/{id}', 'ReservationController@show')->name('showReservation');
Route::get('reservation/back/{id}', 'ReservationController@back')->name('backReservation');
Route::put('reservation/updatecar/{id}', 'ReservationController@updateCar')->name('updatecarReservation');
Route::any('reservation/bailcar/', 'ReservationController@bailCarAjax')->name('bailCarAjax');

//Leasing::Routes
Route::resource('leasing', 'LeasingController');
Route::get('leasing/', 'LeasingController@index')->name('indexLeasing');
Route::get('leasing/create/{id?}/{el?}', 'LeasingController@create')->name('createLeasing');
Route::post('leasing/store', 'LeasingController@store')->name('storeLeasing');
Route::get('leasing/edit/{id}', 'LeasingController@edit')->name('editLeasing');
Route::put('leasing/update/{id}', 'LeasingController@update')->name('updateLeasing');
Route::any('leasing/delete/{id}', 'LeasingController@delete')->name('deleteLeasing');
Route::get('leasing/show/{id}', 'LeasingController@show')->name('showLeasing');
Route::get('leasing/back/{id}', 'LeasingController@back')->name('backLeasing');
Route::put('leasing/updatecar/{id}', 'LeasingController@updateCar')->name('updatecarLeasing');

//Subcontracting::Routes
Route::resource('subcontracting', 'SubcontractingController');
Route::get('subcontracting/', 'SubcontractingController@index')->name('indexSubcontracting');
Route::get('subcontracting/create/{type}', 'SubcontractingController@create')->name('createSubcontracting');
Route::post('subcontracting/store', 'SubcontractingController@store')->name('storeSubcontracting');
Route::get('subcontracting/edit/{id}/{type}', 'SubcontractingController@edit')->name('editSubcontracting');
Route::put('subcontracting/update/{id}', 'SubcontractingController@update')->name('updateSubcontracting');
Route::any('subcontracting/delete/{id}', 'SubcontractingController@delete')->name('deleteSubcontracting');
Route::get('subcontracting/show/{id}/{type}', 'SubcontractingController@show')->name('showSubcontracting');

//Payment::Routes
Route::resource('payment', 'PaymentController');
Route::get('payment/', 'PaymentController@index')->name('indexPayment');
Route::get('payment/create', 'PaymentController@create')->name('createPayment');
Route::get('payment/edit', 'PaymentController@edit')->name('editPayment');

//Invoice::Routes
Route::resource('invoice', 'InvoiceController');
Route::get('invoice/', 'InvoiceController@index')->name('indexInvoice');
Route::post('invoice/store', 'InvoiceController@store')->name('storeInvoice');
Route::get('invoice/create', 'InvoiceController@create')->name('createInvoice');
Route::get('invoice/edit', 'InvoiceController@edit')->name('editInvoice');
Route::any('invoice/preview/{id}/{mode}/{type}', 'InvoiceController@preview')->name('previewInvoice');
Route::any('invoice/getdatas/{id}/{mode}/{type}', 'InvoiceController@getJsonDatas')->name('getdatasInvoice');
Route::post('https://paygateglobal.com/api/v1/pay', 'InvoiceController@getResponse')->name('getResponse');
Route::any('invoice/download/{id}/{mode}/{type}', 'InvoiceController@download')->name('downloadInvoice');
Route::any('invoice/supinvoice/{id}/{type}', 'InvoiceController@supInvoice')->name('supInvoice');

//Cartype::Routes
Route::resource('cartype', 'CartypeController');
Route::get('cartype/', 'CartypeController@index')->name('indexCartype');
Route::get('cartype/create', 'CartypeController@create')->name('createCartype');
Route::post('cartype/store', 'CartypeController@store')->name('storeCartype');
Route::get('cartype/edit/{id}', 'CartypeController@edit')->name('editCartype');
Route::put('cartype/update/{id}', 'CartypeController@update')->name('updateCartype');
Route::any('cartype/delete/{id}', 'CartypeController@delete')->name('deleteCartype');
Route::get('cartype/show/{id}', 'CartypeController@show')->name('showCartype');

//Carmodel::Routes
Route::resource('carmodel', 'CarmodelController');
Route::get('carmodel/', 'CarmodelController@index')->name('indexCarmodel');
Route::get('carmodel/create', 'CarmodelController@create')->name('createCarmodel');
Route::post('carmodel/store', 'CarmodelController@store')->name('storeCarmodel');
Route::get('carmodel/edit/{id}', 'CarmodelController@edit')->name('editCarmodel');
Route::put('carmodel/update/{id}', 'CarmodelController@update')->name('updateCarmodel');
Route::any('carmodel/delete/{id}', 'CarmodelController@delete')->name('deleteCarmodel');
Route::get('carmodel/show/{id}', 'CarmodelController@show')->name('showCarmodel');

//Carstate::Routes
Route::resource('carstate', 'CarstateController');
Route::get('carstate/', 'CarstateController@index')->name('indexCarstate');
Route::get('carstate/create', 'CarstateController@create')->name('createCarstate');
Route::post('carstate/store', 'CarstateController@store')->name('storeCarstate');
Route::get('carstate/edit/{id}', 'CarstateController@edit')->name('editCarstate');
Route::put('carstate/update/{id}', 'CarstateController@update')->name('updateCarstate');
Route::any('carstate/delete/{id}', 'CarstateController@delete')->name('deleteCarstate');
Route::get('carstate/show/{id}', 'CarstateController@show')->name('showCarstate');

//User::Routes
Route::get('user/', 'UserController@index')->name('indexUser');
Route::get('user/create/', 'UserController@create')->name('createUser');
Route::post('user/store/', 'UserController@store')->name('storeUser');
Route::get('user/edit/{id}', 'UserController@edit')->name('editUser');
Route::put('user/update/{id}', 'UserController@update')->name('updateUser');
Route::any('user/delete/{id}', 'UserController@delete')->name('deleteUser');
Route::get('user/show/{id}', 'UserController@show')->name('showUser');
Route::post('user/toggleactive/', 'UserController@toggleActive')->name('toggleActiveUser');

//Driver::Routes
Route::get('driver/', 'DriverController@index')->name('indexDriver');
Route::get('driver/create/', 'DriverController@create')->name('createDriver');
Route::post('driver/store/', 'DriverController@store')->name('storeDriver');
Route::get('driver/edit/{id}', 'DriverController@edit')->name('editDriver');
Route::put('driver/update/{id}', 'DriverController@update')->name('updateDriver');
Route::any('driver/delete/{id}', 'DriverController@delete')->name('deleteDriver');
Route::get('driver/show/{id}', 'DriverController@show')->name('showDriver');

//Rate::Routes
Route::get('rate/edit/', 'RateController@edit')->name('editRate');
Route::put('rate/update/', 'RateController@update')->name('updateRate');

//Category::Routes
Route::resource('category', 'CategoryController');
Route::get('category/', 'CategoryController@index')->name('indexCategory');
Route::get('category/create', 'CategoryController@create')->name('createCategory');
Route::post('category/store', 'CategoryController@store')->name('storeCategory');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('editCategory');
Route::put('category/update/{id}', 'CategoryController@update')->name('updateCategory');
Route::any('category/delete/{id}', 'CategoryController@delete')->name('deleteCategory');
Route::get('category/show/{id}', 'CategoryController@show')->name('showCategory');

//Mark::Routes
Route::resource('mark', 'MarkController');
Route::get('mark/', 'MarkController@index')->name('indexMark');
Route::get('mark/create', 'MarkController@create')->name('createMark');
Route::post('mark/store', 'MarkController@store')->name('storeMark');
Route::get('mark/edit/{id}', 'MarkController@edit')->name('editMark');
Route::put('mark/update/{id}', 'MarkController@update')->name('updateMark');
Route::any('mark/delete/{id}', 'MarkController@delete')->name('deleteMark');
Route::get('mark/show/{id}', 'MarkController@show')->name('showMark');







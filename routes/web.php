<?php

use Illuminate\Http\Request;
use App\Models\User;

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

Route::get('/intranet', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function(){
    return view('intranet.layouts.app');
})->middleware('admin');

Route::get('/', 'IndexController@index')->name('index');

//Paypal::Routes
Route::any('payment/paypal/{amount}', 'PaymentController@payWithpaypal')->name('paywithpaypal');

//Route::get('storage/{filename}', function ($filename)
//{
//    return Image::make(storage_path('public/' . $filename))->response();
//});

Route::any('/stripe', 'StripeController@stripe')->name('stripe');

Route::any('/showstripe/{amount}/{id}/{type}', 'StripeController@showStripe')->name('showStripe');

Route::get('/condition', function(){
    return view('condition');
})->name('condition');

Route::get('/conditionpage', function(){
    return view('condition-page');
})->name('conditionPage');

Route::get('mention', function(){
    return view('mention');
})->name('mention')->middleware('extranet.auth');

Route::any('searchcar', 'IndexController@searchCar')->name('searchCar');

Route::get('subscription/create/', 'IndexController@createSubscription')->name('createSubscription');

Route::any('/redirect/{id}', function($id){
    session_start();
    $_SESSION['page_redirect'] = route('extranet.createReservation', [0, $id]).'#reservation';
    return redirect($_SESSION['page_redirect']);
})->name('redirect');

Route::any('/checklogin/', function(Request $request){
    $user = ['email' => $request->get('email'), 'password' => $request->get('password')];

   if(\Illuminate\Support\Facades\Auth::attempt($user)){
       session_start();
       if($_SESSION['page_redirect'] != ''){
           $page = $_SESSION['page_redirect'];
           $_SESSION['page_redirect'] = '';
           return $page;
       }
       return 'true';
   }
   return 'false';
})->name('checkLogin');

Route::any('/checkemail/', function(Request $request){
    $verifEmail = User::where('email', $request->get('email'))->get();
    if(count($verifEmail)){
        return 'true';
    }
    return 'false';
})->name('checkEmail');

Route::any('/redirect/{id}', function($id){
    session_start();
    $_SESSION['page_redirect'] = route('extranet.createReservation', [0, $id]).'#reservation';
    return redirect($_SESSION['page_redirect']);
})->name('redirect');

Route::any('mail', function(){
    $reservation = \App\Models\Reservation::find(25);
    $data = $reservation;
    $rate = \App\Models\Rate::find(1);

    if($reservation->driver){
        $data['no_driver_amount'] = $rate->no_driver_rate;
    }else{
        $data['no_driver_amount'] = 0;
    }
//
//    if($this->isWeekend(date('d/m/Y'))){
//        $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
//    }else{
//        $data['reduction_amount'] = 0;
//    }

    $data['reduction_amount'] = 0;
    $data['tva_amount'] = (($data['amount'] + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
    $data['ttc'] = $data['amount'] + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];


    $data['bail'] = $data->car->bail;

    $data['total'] = $data['ttc'] + $data['bail'] + $rate->charge;

    $data['charge'] = $rate->charge;

    $data['mode'] = 'tmoney';

    $data['type'] = 'reservation';

    $data['data'] = $data;
    return view('mails.alert-invoice-user', $data);
});






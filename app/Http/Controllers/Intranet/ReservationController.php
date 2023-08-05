<?php

namespace App\Http\Controllers\Intranet;
use App\Mail\AlertReservationAdmin;
use App\Models\Car;
use App\Models\Carback;
use App\Models\Carstate;
use App\Models\Driver;
use App\Models\Invoice;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        $invoices = Invoice::all();
        return view('intranet.reservation.list', compact('reservations', 'invoices'));
    }

    public function show($id){
        $reservation = Reservation::find($id);
        return view('intranet.reservation.show', compact('reservation'));
    }

    public function create($id = null, $el = null){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $currentCustomer = null;
        $currentCar = null;
        if($el AND $el == 'customer') $currentCustomer = User::find($id);
        else $currentCar = Car::find($id);
        $rate = Rate::find(1);
        return view('intranet.reservation.create', compact('customers', 'cars', 'drivers', 'currentCustomer', 'currentCar', 'rate'));
    }

    public function store(Request $request){
        $data = $request->all();

        $car = Car::find($data['car_id']);

        $data['date_start'] = Carbon::parse($data['date_start']);
        $data['date_back'] = Carbon::parse($data['date_back']);

        if($data['date_start']->gt($data['date_back'])){
            return Redirect::back()->withErrors(['Veuillez renseigner une date de retour postérieure à la date de départ SVP', 'Veuillez renseigner une date de retour postérieure à la date de départ SVP']);
        }

        if(isset($data['express'])){
            if($data['express'] == 'lome_accra'){
                $car->amount = $car->lome_accra;
                $data['express'] = 'Lomé - Accra - Lomé';
            }else{
                $car->amount = $car->lome_cotonou;
                $data['express'] = 'Lomé - Cotonou - Lomé';
            }
        }

        if($data['date_start']->diffInDays($data['date_back']) == 0){
            $hours = $this->hours($data['date_start'], $data['date_back']);
            $data['amount'] = $car->amount_hour * $hours;
        }else{
            $days = $data['date_start']->diffInDays($data['date_back']);
            $data['amount'] = $car->amount * $days;
        }

        $last = Reservation::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;


        $insert = Reservation::create($data);
        if($insert) {
            Mail::to('reservations@easycarrental.fr')->send(new AlertReservationAdmin($insert));
            return Redirect::route('intranet.indexReservation')->with('success', 'Création effectuée avec succès.');
        }
        return;
    }

    public function edit($id){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $reservation = Reservation::find($id);
        return view('intranet.reservation.edit', compact('reservation', 'customers', 'cars', 'drivers'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        $car = Car::find($data['car_id']);

        $data['date_start'] = Carbon::parse($data['date_start']);
        $data['date_back'] = Carbon::parse($data['date_back']);
        if($data['date_start']->diffInDays($data['date_back']) == 0){
            $hours = $this->hours($data['date_start'], $data['date_back']);
            $data['amount'] = $car->amount_hour * $hours;
        }else{
            $days = $data['date_start']->diffInDays($data['date_back']);
            $data['amount'] = $car->amount * $days;
        }

        Reservation::find($id)->update($data);
        return Redirect::route('intranet.indexReservation')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Reservation::find($id)->delete();
        return Redirect::route('intranet.indexReservation')->with('success', 'Suppression effectuée avec succès');
    }

    public function back($id){
        $reservation = Reservation::find($id);
        $carstates = Carstate::all();
        $rate = Rate::find(1);
        $car = $reservation->car;
        $back = Carback::where('reservation_id', $id)->first();
        $type = 'reservation';
        $leasing = null;
        return view('intranet.reservation.back', compact('reservation', 'car', 'carstates', 'back', 'type', 'rate', 'leasing'));
    }

    public function updateCar($id, Request $request){
        $data = $request->all();
        $reservation = Reservation::find($id);
        $old = [];
        $old['reservation_id'] =  $id;
        $old['state'] =  $reservation->car->carstate->name;
        $old['damage'] =  $reservation->car->damage;
        $old['kilometrage'] =  $reservation->car->kilometrage;
        $old['gasoline'] =  $reservation->car->gasoline;

        $last = Carback::orderBy('created_at', 'desc')->first();
        if($last) $old['id'] = $last->id + 1;
        else $old['id'] = 1;

        Carback::create($old);
        Car::find($reservation->car->id)->update($data);
        return back();
    }

    public function bailCarAjax(Request $request){
        $car = Car::find($request->get('id'));
        return $car->bail;
    }
}
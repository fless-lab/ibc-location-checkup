<?php

namespace App\Http\Controllers\Extranet;
use App\Mail\AlertReservationAdmin;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class ReservationController extends Controller
{
    public function __construct(){

    }

    public function index($customerId){
        $reservations = Reservation::where('user_id', $customerId)->orderBy('created_at', 'desc')->get();
        return view('extranet.reservation.list', compact('reservations'));
    }

    public function show($id){
        $reservation = Reservation::find($id);
        return view('intranet.reservation.show', compact('reservation'));
    }

    public function create($customerId = null, $carId = null){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $currentCustomer = User::find(Auth::user()->id);
        $currentCar = Car::find($carId);
        $rate = Rate::find(1);
        return view('extranet.reservation.create', compact('customers', 'cars', 'drivers', 'currentCustomer', 'currentCar', 'rate'));
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
            if(!$this->verifHours($data['date_start'], $data['date_back']))
                return Redirect::back()->withErrors(['Vous ne pouvez pas reserver pour une durée moins d\'heure. Veuillez selectionner une durée supérieure ou égale à une heure SVP', 'Vous ne pouvez pas reserver pour une durée moins d\'heure. Veuillez selectionner une durée supérieure ou égale à une heure SVP']);
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
            return redirect('/#reservation');
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
            $days = $this->days($data['date_start'], $data['date_back']);
            $data['amount'] = $car->amount * $days;
        }
        Reservation::find($id)->update($data);
        return Redirect::route('intranet.indexReservation')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Reservation::find($id)->delete();
        return Redirect::route('intranet.indexReservation')->with('success', 'Suppression effectuée avec succès');
    }
}
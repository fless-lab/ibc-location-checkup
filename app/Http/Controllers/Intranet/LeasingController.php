<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Car;
use App\Models\Carback;
use App\Models\Carstate;
use App\Models\Driver;
use App\Models\Invoice;
use App\Models\Leasing;
use App\Models\Rate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class LeasingController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $leasings = Leasing::orderBy('created_at', 'desc')->get();
        $invoices = Invoice::all();
        return view('intranet.leasing.list', compact('leasings', 'invoices'));
    }

    public function show($id){
        $leasing = Leasing::find($id);
        return view('intranet.leasing.show', compact('leasing'));
    }

    public function create($id = null, $el = null){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $currentCustomer = null;
        $currentCar = null;
        if($el AND $el == 'customer') $currentCustomer = User::find($id);
        else $currentCar = Car::find($id);
        return view('intranet.leasing.create', compact('customers', 'cars', 'drivers', 'currentCustomer', 'currentCar'));
    }

    public function store(Request $request){
        $data = $request->all();
        $car = Car::find($data['car_id']);
        $days = $this->days(new Carbon(), $data['date_back']);
        $data['amount'] = $car->amount * $days;

        $last = Leasing::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = Leasing::create($data);
        if($insert) return Redirect::route('intranet.indexLeasing')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $leasing = Leasing::find($id);
        return view('intranet.leasing.edit', compact('leasing', 'customers', 'cars', 'drivers'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        $leasing = Leasing::find($id);
        $car = Car::find($data['car_id']);
        $days = $this->days($leasing->created_at, $data['date_back']);
        $data['amount'] = $car->amount * $days;
        $leasing->update($data);
        return Redirect::route('intranet.indexLeasing')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Leasing::find($id)->delete();
        return Redirect::route('intranet.indexLeasing')->with('success', 'Suppression effectuée avec succès');
    }

    public function back($id){
        $leasing = Leasing::find($id);
        $carstates = Carstate::all();
        $rate = Rate::find(1);
        $car = $leasing->car;
        $back = Carback::where('leasing_id', $id)->first();
        $type = 'leasing';
        $reservation = null;
        return view('intranet.reservation.back', compact('leasing', 'car', 'carstates', 'back', 'type', 'rate', 'reservation'));
    }

    public function updateCar($id, Request $request){
        $data = $request->all();
        $leasing = Leasing::find($id);
        $old = [];
        $old['leasing_id'] =  $id;
        $old['state'] =  $leasing->car->carstate->name;
        $old['damage'] =  $leasing->car->damage;
        $old['kilometrage'] =  $leasing->car->kilometrage;
        $old['gasoline'] =  $leasing->car->gasoline;

        $last = Carback::orderBy('created_at', 'desc')->first();
        if($last) $old['id'] = $last->id + 1;
        else $old['id'] = 1;

        Carback::create($old);
        Car::find($leasing->car->id)->update($data);
        return back();
    }
}
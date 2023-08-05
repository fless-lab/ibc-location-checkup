<?php

namespace App\Http\Controllers\Extranet;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Leasing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class LeasingController extends Controller
{
    public function __construct(){

    }

    public function index($customerId){
        $leasings = Leasing::where('user_id', $customerId)->orderBy('created_at', 'desc')->get();
        return view('extranet.leasing.list', compact('leasings'));
    }

    public function show($id){
        $leasing = Leasing::find($id);
        return view('extranet.leasing.show', compact('leasing'));
    }

    public function create($customerId = null, $carId = null){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $currentCustomer = User::find($customerId);
        $currentCar = Car::find($carId);
        return view('extranet.leasing.create', compact('customers', 'cars', 'drivers', 'currentCustomer', 'currentCar'));
    }

    public function store(Request $request){
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

        $last = Leasing::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = Leasing::create($data);
        if($insert) return redirect('/#leasing');
        return;
    }

    public function edit($id){
        $customers = User::where('type', '!=', null)->get();
        $cars = Car::all();
        $drivers = Driver::all();
        $leasing = Leasing::find($id);
        return view('extranet.leasing.edit', compact('leasing', 'customers', 'cars', 'drivers'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        $car = Car::find($data['car_id']);

        $data['date_back'] = Carbon::parse($data['date_back']);
        if($data['date_start']->diffInDays($data['date_back']) == 0){
            $hours = $this->hours(new Carbon(), $data['date_back']);
            $data['amount'] = $car->amount_hour * $hours;
        }else{
            $days = (new Carbon())->diffInDays($data['date_back']);
            $data['amount'] = $car->amount * $days;
        }

        Leasing::find($id)->update($data);
        return Redirect::route('extranet.indexLeasing')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Leasing::find($id)->delete();
        return Redirect::route('extranet.indexLeasing')->with('success', 'Suppression effectuée avec succès');
    }
}
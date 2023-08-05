<?php


namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Invoice;
use App\Models\Leasing;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $user = Auth::user();
        $cars = Car::whereActive(1)->orderBy('amount')->get();
        $invoices = Invoice::all();
        $leasings = null;
        $reservations = null;
        $minAmount = $this->minAmount();
        if($user){
            $leasings = Leasing::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            $reservations = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        }

        foreach($cars as $car){
            $car->setAvailable();
        }

        return view('extranet.index', compact('cars', 'leasings', 'reservations', 'user', 'invoices', 'minAmount'));
    }

    public function searchCar(Request $request){
        $cars = Car::whereAvailable(1)->whereActive(1)->get();
        return view('car', compact('cars'));
    }

    public function createSubscription(){
        return view('extranet.subscription.create');
    }
}
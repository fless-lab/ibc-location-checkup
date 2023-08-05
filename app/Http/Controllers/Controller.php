<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }

    public function paygate($data, $type){
        $paygateData = [];
        if($type == 'leasing'){
            $paygateData['auth_token'] = "a81d1e51-bf4c-4fa1-ad94-ef30eb442c58";
            $paygateData['phone_number'] = $data->user->telephone;
            $paygateData['amount'] = $data['total'];
            $paygateData['description'] = '';
            $paygateData['identifier'] = 'leasing-'.$data->id;
        }
        return $jsonData = json_encode($paygateData);
    }

    public function hours($dateFrom, $dateTo){
        $from = strtotime($dateFrom);
        $to = strtotime($dateTo);
        return intval((($to - $from) / 60) / 60);
    }

    public function verifHours($dateFrom, $dateTo){
        $duration = $dateTo->diffInSeconds($dateFrom);
        if($duration < 3600) return false;
        return true;
    }

    public function minAmount(){
        $cars = Car::all();
        $min = 0;
        $i = 0;
        foreach ($cars as $car){
            if($i == 0){
                $min = $car->amount;
            }
            if($car->amount < $min){
                $min = $car->amount;
            }
            $i++;
        }
        return $min;
    }
}

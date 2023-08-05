<?php

namespace App\Http\Controllers;

use App\Models\Carback;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Leasing;
use App\Models\Reservation;
use App\Models\Rate;
use PDF;

class PDFController extends Controller
{
    public function invoice($id, $mode, $type){
        $data = ($type == 'leasing') ? Leasing::find($id) : Reservation::find($id);
        $rate = Rate::find(1);

        if($data->driver){
            $data['no_driver_amount'] = $rate->no_driver_rate;
        }else{
            $data['no_driver_amount'] = 0;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;

        }
        $data['tva_amount'] = (($data['amount'] + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc'] = $data['amount'] + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];


        $data['bail'] = $data->car->bail;

        $data['total'] = $data['ttc'] + $data['bail'];

        $data['mode'] = $mode;

        $data['type'] = $type;

        $invoice = ($type == 'leasing') ? Invoice::where('leasing_id', $id)->where('mode', $mode)->first() : Invoice::where('reservation_id', $id)->where('mode', $mode)->first();

        $data['numfac'] = $invoice->numfac;

        return PDF::loadView('download-invoice', array('data' => $data));

    }

    public function supInvoice($id, $type){
        $invoice = ($type == 'leasing') ? Invoice::where('leasing_id', $id)->where('mode', 'sup')->first() :  Invoice::where('reservation_id', $id)->where('mode', 'sup')->first();
        $rate = Rate::find(1);
        if($invoice){

        }else{
            $insert = [];
            $insert['mode'] = "sup";
            $insert['amount'] = $rate->sup_amount;
            $insert['total_amount'] = $rate->sup_amount;
            if($type == 'leasing') $insert['leasing_id'] = $id;
            else $insert['reservation_id'] = $id;

            $last = Invoice::orderBy('created_at', 'desc')->first();
            if($last) $insert['id'] = $last->id + 1;
            else $insert['id'] = 1;

            $invoice = Invoice::create($insert);
        }

        $invoice['type'] = $type;
        $invoice['car'] = ($type == 'reservation') ? $invoice->reservation->car : $invoice->leasing->car;
        $invoice['back'] = ($type == 'reservation') ? Carback::where('reservation_id', $id)->first() : Carback::where('leasing_id', $id)->first();
        $invoice['rate'] = $rate;
        $invoice['reservation'] = $invoice->reservation;
        $invoice['leasing'] = $invoice->leasing;

//        dd($data);

        return PDF::loadView('sup-invoice', array('data' => $invoice));
    }
}

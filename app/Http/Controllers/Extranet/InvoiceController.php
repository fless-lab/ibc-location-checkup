<?php

namespace App\Http\Controllers\Extranet;
use App\Http\Controllers\PDFController;
use App\Mail\AlertInvoiceUser;
use App\Models\Car;
use App\Models\Invoice;
use App\Models\Leasing;
use App\Models\Rate;
use App\Models\Reservation;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class InvoiceController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $invoices = Invoice::orderBy('created_at', 'desc')->get();
//        return view('extranet.invoice.list', compact('invoices'));
    }

    public function show($id){
        $invoice = Invoice::find($id);
//        return view('extranet.invoice.show', compact('invoice'));
    }

    public function create(){
        return view('extranet.invoice.create');
    }

    public function store(Request $request){
        $data = $request->all();

        //Données pour storer une facture
        $insertDatas = $this->getJsonDatas($data['id'], $data['mode'], $data['type']);
        $invoice = [];
        $invoice['reservation_id'] = ( $data['type'] == 'reservation') ?  $data['id'] : null;
        $invoice['leasing_id'] = ( $data['type'] == 'leasing') ?  $data['id'] : null;
        $invoice['driver_amount'] = $insertDatas['no_driver_amount'];
        $invoice['reduction_amount'] = $insertDatas['reduction_amount'];
        $invoice['tva_amount'] = $insertDatas['tva_amount'];
        $invoice['ttc_amount'] = $insertDatas['ttc'];
        $invoice['bail_amount'] = $insertDatas['bail'];
        $invoice['amount'] = $insertDatas['amount'];
        $invoice['total_amount'] = $insertDatas['total'];
        $invoice['date_start'] = ( $data['type'] == 'leasing') ? $insertDatas['created_at'] : $insertDatas['date_start'];
        $invoice['date_back'] = $insertDatas['date_back'];
        $invoice['mode'] = $insertDatas['mode'];
        $invoice['receipt'] = isset($data['receipt']) ? $data['receipt'] : null;
        $invoice['numfac'] = 'FAC-000'.date('YmdHis');

        $last = Invoice::orderBy('created_at', 'desc')->first();
        if($last) $invoice['id'] = $last->id + 1;
        else $invoice['id'] = 1;

//        $car = ($data['type'] == 'reservation') ? Reservation::find($data['id'])->car : Leasing::find($data['id'])->car;
//        $car->available = 0;
//        $car->save();

        $insert = Invoice::create($invoice);
        $reservation = Reservation::find($data['id']);
        if($insert){
            Mail::to($insert->reservation->user)->send(new AlertInvoiceUser($reservation));
            Mail::to('factures@easycarrental.fr')->send(new AlertInvoiceUser($reservation));
        }
        return $insert;
    }

    public function edit($id){
        $invoice = Invoice::find($id);
        return view('extranet.invoice.edit', compact('invoice'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }

        Invoice::find($id)->update($data);

        return Redirect::route('extranet.indexInvoice')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Invoice::find($id)->delete();
        return Redirect::route('extranet.indexInvoice')->with('success', 'Suppression effectuée avec succès');
    }

    public function preview($id, $mode, $type){
        $data = ($type == 'leasing') ? Leasing::find($id) : Reservation::find($id);
        $rate = Rate::find(1);

        if($data->driver){
            $data['bail'] = 0;
            $days = $data['date_start']->diffInDays($data['date_back']);
            if($days < 1) $data['no_driver_amount'] = $rate->no_driver_rate;
            else $data['no_driver_amount'] = $rate->no_driver_rate * $days;
        }else{
            $data['no_driver_amount'] = 0;
            $data['bail'] = $data->car->bail;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;
        }
        $data['tva_amount'] = (($data['amount'] + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc'] = $data['amount'] + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];

        $data['total'] = $data['ttc'] + $data['bail'] + $rate->charge;

        $data['charge'] = $rate->charge;

        $data['mode'] = $mode;

        $data['type'] = $type;
//        $data['data'] = $this->paygate($data, $type);

        return view('preview-invoice', compact('data'));
    }
    
    public function getJsonDatas($id, $mode, $type){
        $data = ($type == 'leasing') ? Leasing::find($id) : Reservation::find($id);
        $rate = Rate::find(1);

        if($data->driver){
            $data['bail'] = 0;
            $days = $data['date_start']->diffInDays($data['date_back']);
            if($days < 1) $data['no_driver_amount'] = $rate->no_driver_rate;
            else $data['no_driver_amount'] = $rate->no_driver_rate * $days;
        }else{
            $data['no_driver_amount'] = 0;
            $data['bail'] = $data->car->bail;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($data['amount'] * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;

        }
        $data['tva_amount'] = (($data['amount'] + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc'] = $data['amount'] + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];


        $data['total'] = $data['ttc'] + $data['bail'] + $rate->charge;

        $data['charge'] = $rate->charge;

        $data['mode'] = $mode;

        $data['type'] = $type;
//        $data['data'] = $this->paygate($data, $type);

        return $data;
    }

    public function download($id, $mode, $type){
        $pdf = new PDFController();
        $download = $pdf->invoice($id, $mode, $type);
        $libelle = ($type == 'leasing') ? 'location' : 'reservation';
        return $download->download('Facture-'.$id.'_'.$libelle.'.pdf');
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Sir Kov
 * Date: 21/02/2019
 * Time: 13:01
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Extranet\InvoiceController;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;


class StripeController extends Controller
{
    public function showStripe($amount, $id, $type){
        return view('stripe.stripe', compact('amount', 'id', 'type'));
    }

    public function stripe(Request $request){
        $data = $request->all();
        Stripe::setApiKey(env('STRIPE_SECRET'));

        if($data['currency'] == 'usd' OR $data['currency'] == 'eur'){
            $data['amount'] =  $data['amount'] * 100;
        }

        $charge = Charge::create([
            'currency' => $data['currency'],
            'amount'   => $data['amount'],
            'source' => $data['stripeToken']
        ]);

        $saveInvoice = null;

        if($charge['status'] == 'succeeded'){
            $datas = [
                'id' => $data['id'],
                'type' => $data['type'],
                'mode' => 'stripe',
                'receipt' => $charge['receipt_url']
            ];
            $request->request->add(['receipt' => $charge['receipt_url']]);
            $invoice = new InvoiceController();
            $saveInvoice = $invoice->store($request);
             return view('stripe.success');
        }

        return "Paiement échoué";

    }

}
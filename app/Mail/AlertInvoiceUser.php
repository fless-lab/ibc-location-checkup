<?php

namespace App\Mail;

use App\Models\Invoice;
use App\Models\Rate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlertInvoiceUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Easycarrental - Facture';

        $data['reservation'] = $this->reservation;
        $data['invoice_download'] = Invoice::where('reservation_id', $this->reservation->id)->first();
        $rate = Rate::find(1);

        if($this->reservation->driver){
            $data['no_driver_amount'] = $rate->no_driver_rate;
        }else{
            $data['no_driver_amount'] = 0;
        }

        if($this->isWeekend(date('d/m/Y'))){
            $data['reduction_amount'] = ($this->reservation->amount * $rate->reduction_rate) / 100;
        }else{
            $data['reduction_amount'] = 0;
        }

        $data['reduction_amount'] = 0;
        $data['tva_amount'] = (($this->reservation->amount + $data['no_driver_amount'] - $data['reduction_amount']) * $rate->tva) / 100;
        $data['ttc'] = $this->reservation->amount + $data['no_driver_amount'] + $data['tva_amount'] - $data['reduction_amount'];


        $data['bail'] = $this->reservation->car->bail;

        $data['total'] = $data['ttc'] + $data['bail'] + $rate->charge;

        $data['charge'] = $rate->charge;

        $data['mode'] = 'tmoney';

        $data['type'] = 'reservation';

        $data['data'] = $data;


        return $this->from(strtolower('easycarrental').'@easycarrental.fr')
            ->subject($subject)
            ->view('mails.alert-invoice-user', $data);
    }

}

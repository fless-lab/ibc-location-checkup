<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['id',
        'payment_id', 'reservation_id', 'leasing_id', 'driver_amount', 'reduction_amount', 'tva_amount', 'amount',
        'ttc_amount', 'bail_amount', 'total_amount', 'date_start', 'date_back', 'mode', 'receipt', 'numfac'
    ];

    protected $dates = ['date_start', 'date_back'];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function leasing(){
        return $this->belongsTo(Leasing::class);
    }

}

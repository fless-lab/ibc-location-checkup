<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['id',
        'user_id', 'car_id', 'driver_id', 'date_start', 'date_back', 'discount', 'amount', 'express'
    ];

    protected $dates = ['date_start', 'date_back'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function busy(){
        $invoices = Invoice::all();
        foreach($invoices as $invoice){
            if($invoice->reservation_id == $this->id) return true;
        }
        return false;
    }
}

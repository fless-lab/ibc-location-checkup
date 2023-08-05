<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leasing extends Model
{
    protected $table = 'leasings';

    protected $fillable = ['id',
        'user_id', 'car_id', 'driver_id', 'date_back', 'amount',
        'bail'
    ];

    protected $dates = ['date_back'];

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
            if($invoice->leasing_id == $this->id) return true;
        }
        return false;
    }
}

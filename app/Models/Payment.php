<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'leasings';

    protected $fillable = ['id',
        'user_id', 'leasing_id', 'reservation_id', 'subcontracting_id'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function leasing(){
        $this->belongsTo(Leasing::class);
    }

    public function reservation(){
        $this->belongsTo(Reservation::class);
    }
}
